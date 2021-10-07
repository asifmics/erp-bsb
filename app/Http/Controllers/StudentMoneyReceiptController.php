<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Journal;
use App\JournalDetail;
use App\StudentMoneyReceipt;
use App\StudentMoneyReceiptDetails;
use App\StudentRequsition;
use App\StudentRequsitionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use PhpParser\Node\Expr\Throw_;

class StudentMoneyReceiptController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = StudentRequsition::where('status',1)->get();
        return view('admin.student.requsition.all',compact('all'));

    }

    public function create(){
        return view('admin.student.requsition.add');
    }

    public function edit($id){
        $requsition = StudentRequsition::find($id);
        return view('admin.student.requsition.add', compact('requsition'));
    }

    public function view($slug){

    }
    public function store(Request $request){

        $amount = array_sum($request->payment);
        $stmr = new StudentMoneyReceipt;
        $stmr->student_id = $request->student_id;
        $stmr->money_receipt = rand();
        $stmr->date = date('Y-m-d');
        $stmr->amount = $amount;
        $stmr->save();
        $id = $stmr->id;
        if($request->requsition_id != null){
            DB::beginTransaction();
        try {
            $count= count($request->requsition_id);
            for ($i=0; $i < $count; $i++) {
                $check = StudentRequsitionDetails::where('requsition_id',$request->requsition_id[$i])->where('student_id',$request->student_id)->first();
                $due = $check->payable_amount - $check->paid;
                if($request->payment[$i] <= $due){
                    $mrd = new StudentMoneyReceiptDetails;
                    $mrd->money_receipt_id = $id;
                    $mrd->requsition_details_id = $request->requsition_id[$i];
                    $mrd->paid = $request->payment[$i];
                    $mrd->remark = $request->remark[$i];
                    $mrd->save();
                }else{
                    $mr_check = StudentMoneyReceipt::find($id);
                    $mrd_check= StudentMoneyReceiptDetails::where('money_receipt_id',$id)->delete();
                    $mr_check->delete();
                    $notification = array(
                        'messege'   =>  'Over the due amount',
                        'alert-type'=>  'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
                $student_mr = StudentMoneyReceiptDetails::where('money_receipt_id',$id)->get();
                if(!empty($student_mr)){
                    foreach($student_mr as $item){
                        $requsition = StudentRequsitionDetails::where('requsition_id',$item->requsition_details_id)->where('student_id',$request->student_id)->first();
                        $total_paid = $requsition->paid + $item->paid;
                        $requsition->paid =$total_paid;
                        $requsition->save();
                    }
                }

                /**
                 * Journal Entry
                 *
                 */
            $date = date('Y-m-d');
            $jurnal = new Journal;
            $jurnal->gl_date = $date;
            $jurnal->referance = $id;
            $jurnal->src_referance = 'Student Payment';
            $jurnal->memo = 'Amount paid by student';
            $jurnal->created_by = Auth::id();
            $jurnal->save();

            $total_amount = 0;
            $count= count($request->requsition_id);
            for ($i=0; $i < $count; $i++) {
                    $requsition_id = $request->requsition_id[$i];
                    $requsition = StudentRequsition::find($requsition_id);
                    $debit_gl = $requsition->gl_account_id;
                    $credit_gl = $requsition->credit_gl_account_id;
                    $iteam = new JournalDetail;
                    $iteam->journal_id = $jurnal->id;
                    $iteam->gl_id =  $debit_gl;
                    $iteam->txn_date = $date;
                    $iteam->memo = $request->remark[$i];
                    $iteam->amount = $request->payment[$i];
                    $iteam->save();

                    // Insert credit side
                    $iteam = new JournalDetail;
                    $iteam->journal_id = $jurnal->id;
                    $iteam->gl_id =  $credit_gl;
                    $iteam->txn_date = $date;
                    $iteam->memo = $request->remark[$i];
                    $iteam->amount = $request->payment[$i] * (-1);
                    $iteam->save();


            }

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            // something went wrong
        }

        }
        $notification = array(
            'messege'   =>  'Payment Successfully done',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }

    public function download($id)
    {
        $data=['data'=>StudentMoneyReceipt::find($id)];
        $pdf = PDF::loadView('admin.student.money_receipt.receipt', $data);
        return $pdf->download('Money Receipt'.uniqid(5).'.pdf');
    }
    public function pdf($id)
    {
        $data=['data'=>StudentMoneyReceipt::find($id)];
        // return view('admin.student.money_receipt.receipt', $data);
        $customPaper = array(0,0,2700,1800);
        $pdf = PDF::loadView('admin.student.money_receipt.receipt', $data);
        return $pdf->stream();
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'      => 'required',
        ]);
        $requsition = StudentRequsition::find($request->id);
        $requsition->name = $request->name;
        $requsition->parent_id = $request->parent_id;
        $requsition->save();
        $notification = array(
            'messege'   =>  'Requsition Updated successfully',
            'alert-type'=>  'success'
        );
        return redirect()->route('all_requsition')->with($notification);
    }

    public function softdelete(Request $request){

        $agent = StudentRequsition::find($request->modal_id);
        $agent->delete();
        $notification = array(
            'error'   =>  'Requsition Delete successfully',
            'alert-type'=>  'error'
        );
        return redirect()->route('all_requsition')->with($notification);

    }
}
