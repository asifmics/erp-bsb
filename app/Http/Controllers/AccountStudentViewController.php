<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentAcademic;
use App\StudentInterestCountry;
use App\StudentMoneyReceipt;
use App\StudentMoneyReceiptDetails;
use App\StudentRequsitionDetails;
use Illuminate\Http\Request;
use PDF;
class AccountStudentViewController extends Controller
{
    public function create($slug)
    {
        $student = Student::where('status',1)->where('slug',$slug)->first();
        return view('admin.student.account_view',compact('student'));
    }
    public function update(Request $request)
    {
    //   dd($request->all());
    $student =Student::find($request->student_id);
    $student->name = $request->name;
    $student->email = $request->email;
    $student->phone = $request->phone;
    // $student->nid = $request->national_id;
    $student->nationality = $request->nationality;
    $student->dob = $request->dob;
    $student->gender = $request->gender;
    $student->religion = $request->religion;
    $student->father_name = $request->father_name;
    $student->father_profession = $request->father_profession;
    $student->mother_name = $request->mother_name;
    $student->mother_profession = $request->mother_profession;
    $student->save();
    if($request->exam[0] != null){
        $count= count($request->exam);
        for ($i=0; $i < $count; $i++) {
            if($request->aca_id[$i] == ''){
                $academic = new StudentAcademic();
                $academic->student_id =$request->student_id;
                $academic->exam =$request->exam[$i];
                $academic->institut =$request->institut[$i];
                $academic->department =$request->department[$i];
                $academic->board =$request->board[$i];
                $academic->grade =$request->grade[$i];
                $academic->pass_year =$request->pass_year[$i];
                $academic->save();
            }else{
                $academic = StudentAcademic::find($request->aca_id[$i]);
                $academic->student_id =$request->student_id;
                $academic->exam =$request->exam[$i];
                $academic->institut =$request->institut[$i];
                $academic->department =$request->department[$i];
                $academic->board =$request->board[$i];
                $academic->grade =$request->grade[$i];
                $academic->pass_year =$request->pass_year[$i];
                $academic->save();
            }

          // dd($academic);
        }
    }
    if($request->country_id[0] != null){
        $count= count($request->country_id);
        for ($i=0; $i < $count; $i++) {
            if($request->in_coun_id[$i] == ''){
                $incoun = new StudentInterestCountry;
                $incoun->student_id =$request->student_id;
                $incoun->country_id =$request->country_id[$i];
                $incoun->university_id =$request->university_id[$i];
                $incoun->university_program_category_id =$request->university_program_category_id[$i];
                $incoun->university_program_id =$request->university_program_id[$i];
                $incoun->adminssion_status =$request->status[$i] ?? 0;
                $incoun->save();
            }
            else{
                $incoun = StudentInterestCountry::find($request->in_coun_id[$i]);
                $incoun->student_id =$request->student_id;
                $incoun->country_id =$request->country_id[$i];
                $incoun->university_id =$request->university_id[$i];
                $incoun->university_program_category_id =$request->university_program_category_id[$i];
                $incoun->university_program_id =$request->university_program_id[$i];
                $incoun->adminssion_status =$request->status[$i] ?? 0;
                $incoun->save();
            }
                    // dd($academic);
        }
    }

    $student =Student::find($request->student_id);
    return redirect()->route('counsellor_requsition_details',$student->slug);
    }
    public function requsition($slug)
    {
        $student = Student::where('slug',$slug)->first();

        return view('admin.student.consellor_requsition',compact('student'));

    }
    public function payment($slug)
    {
        $student = Student::where('slug',$slug)->first();
        return view('admin.student.account_payment',compact('student'));
    }

    public function paymentstore(Request $request)
    {
        // dd($request->all());
        
        $mrc_id_0 = '';
        $mrc_id_4 = '';
        $mrc_id_5 = '';
        if(array_sum($request->received_0) >0){
        $money_receipt_0 = new StudentMoneyReceipt;
        $money_receipt_0->student_id = $request->student_id;
        $money_receipt_0->money_receipt = rand();
        $money_receipt_0->amount = array_sum($request->received_0);
        $money_receipt_0->date = date("Y-m-d");
        $money_receipt_0->save();
        $mrc_id_0 .= $money_receipt_0->id;
        if($request->requsition_0 != null){
            $count= count($request->requsition_0);
            for ($i=0; $i < $count; $i++) {
                if((int)$request->received_0[$i] > 0){
                    $streq = StudentRequsitionDetails::where('requsition_id',(int)$request->requsition_0[$i])->where('student_id',(int)$request->student_id)->first();
                    $rcv =(int)$request->received_0[$i];
                    $dis =(int)$request->discount_0[$i];
                    if($streq->paid != null){
                        $streq->paid = $streq->paid + $rcv;
                    }else{
                        $streq->paid =$rcv;
                    }
                    $streq->discount = $dis;
                    $streq->save();

                    $mrc_0 = new StudentMoneyReceiptDetails;
                    $mrc_0->money_receipt_id = $mrc_id_0;
                    $mrc_0->requsition_details_id = $request->requsition_0[$i];
                    $mrc_0->paid = $rcv;
                    $mrc_0->remark = $request->remark_0[$i];
                    $mrc_0->save();
                }
                    // dd($academic);
            }
        }
        }if(array_sum($request->received_4) >0){
            $money_receipt_4 = new StudentMoneyReceipt;
            $money_receipt_4->student_id = $request->student_id;
            $money_receipt_4->money_receipt = rand();
            $money_receipt_4->amount = array_sum($request->received_4);
            $money_receipt_4->date = date("Y-m-d");
            $money_receipt_4->save();
            $mrc_id_4 .= $money_receipt_4->id;
            if($request->requsition_4 != null){
                $count= count($request->requsition_4);
                for ($i=0; $i < $count; $i++) {
                    if((int)$request->received_4[$i] > 0){
                        $streq = StudentRequsitionDetails::where('requsition_id',(int)$request->requsition_4[$i])->where('student_id',(int)$request->student_id)->first();
                        $rcv =(int)$request->received_4[$i];
                        $dis =(int)$request->discount_4[$i];
                        if($streq->paid != null){
                            $streq->paid = $streq->paid + $rcv;
                        }else{
                            $streq->paid =$rcv;
                        }
                        $streq->discount = $dis;
                        $streq->save();

                        $mrc_4 = new StudentMoneyReceiptDetails;
                        $mrc_4->money_receipt_id = $mrc_id_4;
                        $mrc_4->requsition_details_id = $request->requsition_4[$i];
                        $mrc_4->paid = $rcv;
                        $mrc_4->remark = $request->remark_4[$i];
                        $mrc_4->save();
                    }
                }
            }
        }if(array_sum($request->received_5) >0){
            $money_receipt_5 = new StudentMoneyReceipt;
            $money_receipt_5->student_id = $request->student_id;
            $money_receipt_5->money_receipt = rand();
            $money_receipt_5->amount = array_sum($request->received_5);
            $money_receipt_5->date = date("Y-m-d");
            $money_receipt_5->save();
            $mrc_id_5 .= $money_receipt_5->id;
            if($request->requsition_5 != null){
                $count= count($request->requsition_5);
                for ($i=0; $i < $count; $i++) {
                    if((int)$request->received_5[$i] > 0){
                        $streq = StudentRequsitionDetails::where('requsition_id',(int)$request->requsition_5[$i])->where('student_id',(int)$request->student_id)->first();
                        $rcv =(int)$request->received_5[$i];
                        $dis =(int)$request->discount_5[$i];
                        if($streq->paid != null){
                            $streq->paid = $streq->paid + $rcv;
                        }else{
                            $streq->paid =$rcv;
                        }
                        $streq->discount = $dis;
                        $streq->save();

                        $mrc_5 = new StudentMoneyReceiptDetails;
                        $mrc_5->money_receipt_id = $mrc_id_5;
                        $mrc_5->requsition_details_id = $request->requsition_5[$i];
                        $mrc_5->paid = $rcv;
                        $mrc_5->remark = $request->remark_5[$i];
                        $mrc_5->save();
                    }
                }
            }
        }
        $st_id = $request->student_id;
        $pdf = PDF::loadView('admin.student.money_receipt.receipt', compact('mrc_id_0','mrc_id_4','mrc_id_5','st_id'));
        return $pdf->stream();
        // else{
        //     return redirect()->back()->with('error', 'Please input received amount');
        // }

    }

    public function refund($slug)
    {
        $student = Student::where('slug',$slug)->first();
        return view('admin.student.account_refund',compact('student'));
    }
    public function refundstore(Request $request)
    {
        dd($request->all());
    }

}
