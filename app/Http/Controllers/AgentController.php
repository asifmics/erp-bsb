<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = Agent::where('status',1)->get();
        return view('admin.agent.all',compact('all'));

    }

    public function create(){
        return view('admin.agent.add');
    }

    public function edit($slug){
        $agent = Agent::find($slug);
        return view('admin.agent.add', compact('agent'));
    }

    public function view($slug){

    }

    public function store(Request $request){

        $this->validate($request, [
            'name'      => 'required',
            'phone'     =>'required',
        ]);
        $agent = new Agent;
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->save();
        $notification = array(
            'messege'   =>  'Agent create successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'      => 'required',
        ]);
        $agent = Agent::find($request->id);
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
