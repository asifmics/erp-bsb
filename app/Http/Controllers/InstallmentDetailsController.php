<?php

namespace App\Http\Controllers;

use App\InstallmentDetails;
use App\LoanDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class InstallmentDetailsController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index() {
        $installment = InstallmentDetails::where('status',1)->get();
        return view('admin.loan_managment.installment_details.all', compact('installment'));
    }
    public function create() {
        return view('admin.loan_managment.installment_details.create');
    }
    /**
     * @param $slug
     */

     public function getajaxLoan(Request $request)
     {
        $id = $request->id;
        $loan = LoanDetails::where('employee_id',$id)->get();
        return response()->json($loan);

     }
    public function store( Request $request ) {

        $validatedData = $request->validate([
            'loan_id' => 'required',
        ]);
        $loan = LoanDetails::find($request->loan_id);
        if(empty($loan->paid_amount)){
            if($loan->loan_amount >= $request->installment_amount){
              $okk =  LoanDetails::find($request->loan_id)->update(['paid_amount' => $request->installment_amount, 'given_installment' =>$request->installment_amount]);

            }else{
                return redirect()->back()->with(['alert-type' => 'error','messege'=>'Installment Amount Cross Loan Amount']);
            }
        }else{
            $paid_total = $loan->paid_amount + $request->installment_amount;
            if($loan->loan_amount >= $paid_total){

                LoanDetails::find($request->loan_id)->update(['paid_amount' => $paid_total, 'given_installment' =>$request->installment_amount]);
            }else{
                return redirect()->back()->with(['alert-type' => 'error','messege'=>'Installment Amount Cross Loan Amount']);
            }
        }
        $date = Carbon::parse($request->payment_date)->format('Y-m-d');
        $installment = new InstallmentDetails;
        $installment->loan_id = $request->loan_id;
        $installment->installment_amount = $request->installment_amount;
        $installment->payment_date = $date;
        $installment->received_by = $request->received_by;
        $installment->save();
        return redirect()->route('all_installment')->with(['alert-type' => 'success','messege'=>'Installment Created Successfully']);

    }
    public function edit( $id ) {

        $installment = InstallmentDetails::find($id);
        return view('admin.loan_managment.installment_details.create', compact('installment'));
    }
    public function view( $id ) {
        $installment =InstallmentDetails::find($id);
        return view('adminloan_managment.installment_details.view', compact('installment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, InstallmentDetails $event ) {
        $validatedData = $request->validate([
            'loan_id' => 'required',
        ]);
        $loan = LoanDetails::find($request->loan_id);
        if(empty($loan->paid_amount)){
            if($loan->loan_amount >= $request->installment_amount){
              $okk =  LoanDetails::find($request->loan_id)->update(['paid_amount' => $request->installment_amount]);

            }else{
                return redirect()->back()->with(['alert-type' => 'error','messege'=>'Installment Amount Cross Loan Amount']);
            }
        }else{
            $inst = InstallmentDetails::find($request->id);

            if($inst->installment_amount < $request->installment_amount){
                $paid_total = $request->installment_amount - $inst->installment_amount;
                $total = $loan->paid_amount + $paid_total;

            }else{
                $paid_total =$inst->installment_amount - $request->installment_amount;
                $total = $loan->paid_amount - $paid_total;
            }

            if($loan->loan_amount >= $paid_total){
                LoanDetails::find($request->loan_id)->update(['paid_amount' => $total]);
            }else{
                return redirect()->back()->with(['alert-type' => 'error','messege'=>'Installment Amount Cross Loan Amount']);
            }
        }
        $date = Carbon::parse($request->payment_date)->format('Y-m-d');
        $installment = InstallmentDetails::find($request->id);
        $installment->loan_id = $request->loan_id;
        $installment->installment_amount = $request->installment_amount;
        $installment->payment_date = $date;
        $installment->received_by = $request->received_by;
        $installment->save();
        return redirect()->route('all_installment')->with(['alert-type' => 'success','messege'=>'Installment Update Successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, InstallmentDetails $installment ) {
        $installment = $installment->findOrFail($id);
        $installment->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, InstallmentDetails $installment )
    {
        $installment = $installment->findOrFail($request->modal_id);
        $installment->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, InstallmentDetails $installment )
    {
        $installment = $installment->findOrFail($request->modal_id);
        $installment->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
