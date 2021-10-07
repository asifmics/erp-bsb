<?php

namespace App\Http\Controllers;

use App\CounsellorGenerate;
use App\Employee;
use Illuminate\Http\Request;

class CounsellorGenerateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = CounsellorGenerate::where('status',1)->get();
        return view('admin.hr.counsellor.all',compact('all'));

    }

    public function create(){
        return view('admin.hr.counsellor.add');
    }

    public function edit($slug){
        $counsellor = Employee::find($slug);
        return view('admin.hr.counsellor.add', compact('counsellor'));
    }

    public function view($slug){

    }

    public function store(Request $request){

        $this->validate($request, [
            'counsellor_id'      => 'required|unique:counsellor_generates'
        ],[
            'counsellor_id.unique' => 'Already exist this counsellor',
        ]);
        $counsellor = new CounsellorGenerate;
        $counsellor->parent_id = $request->parent_id;
        $counsellor->counsellor_id = $request->counsellor_id;
        $counsellor->save();
        $notification = array(
            'messege'   =>  'Counsellor create successfully',
            'alert-type'=>  'success'
        );
        
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'      => 'required',
        ]);
        $agent = Employee::find($request->id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->save();
        $notification = array(
            'messege'   =>  'Agent Updated successfully',
            'alert-type'=>  'success'
        );
        return redirect()->route('all_agent')->with($notification);
    }

    public function softdelete(Request $request){

        $agent = Agent::find($request->modal_id);
        $agent->delete();
        $notification = array(
            'error'   =>  'Agent Delete successfully',
            'alert-type'=>  'error'
        );
        return redirect()->route('all_agent')->with($notification);

    }
}
