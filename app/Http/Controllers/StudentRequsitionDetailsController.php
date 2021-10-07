<?php

namespace App\Http\Controllers;

use App\StudentRequsitionDetails;
use Illuminate\Http\Request;

class StudentRequsitionDetailsController extends Controller
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
        $requsition = StudentRequsitionDetails::find($id);
        return view('admin.student.requsition.add', compact('requsition'));
    }

    public function view($slug){

    }
    public function store(Request $request)
    {
        if($request->requsition_id != null){
            $count = count($request->requsition_id);
            for ($i=0; $i < $count; $i++) {
                $check = StudentRequsitionDetails::where('requsition_id',$request->requsition_id[$i])->where('student_id',$request->student_id)->first();
                if($check == ''){
                    $rq = new StudentRequsitionDetails;
                    $rq->student_id =$request->student_id;
                    $rq->requsition_id =$request->requsition_id[$i];
                    $rq->payable_amount =$request->payable_amount[$i];
                    $rq->remark =$request->remark[$i];
                    $rq->save();
                }else{
                    $rqu = StudentRequsitionDetails::where('requsition_id',$request->requsition_id[$i])->where('student_id',$request->student_id)->first();
                    $rqu->student_id =$request->student_id;
                    $rqu->requsition_id =$request->requsition_id[$i];
                    $rqu->payable_amount =$request->payable_amount[$i];
                    $rqu->remark =$request->remark[$i];
                    $rqu->save();
                }
            }
        }
        $notification = array(
            'messege'   =>  'Account Payable successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
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
