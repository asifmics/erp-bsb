<?php

namespace App\Http\Controllers;

use App\StudentRequsition;
use Illuminate\Http\Request;

class StudentRequsitionController extends Controller
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

        $this->validate($request, [
            'name'      => 'required|unique:student_requsitions'
        ],[
            'name.unique' => 'Already exist this requsition',
        ]);
        $requsition = new StudentRequsition;
        $requsition->country_id = $request->country_id;
         
        $requsition->name = $request->name;
        $requsition->payable_amount = $request->payable_amount;
        $requsition->save();
        $notification = array(
            'messege'   =>  'Student create successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'      => 'required',
        ]);
        $requsition = StudentRequsition::find($request->id);
        $requsition->country_id = $request->country_id;
        $requsition->parent_id = $request->parent_id;
        $requsition->name = $request->name;
        $requsition->payable_amount = $request->payable_amount;
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
