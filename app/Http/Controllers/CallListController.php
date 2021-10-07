<?php

namespace App\Http\Controllers;

use App\CallList;
use Illuminate\Http\Request;

class CallListController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $calllists = CallList::where('status',1)->get();
        return view('admin.hr.call_list.all', compact('calllists'));
    }

    public function create() {
        return view('admin.hr.call_list.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'number' => 'required',
        ]);

        $resolution = new CallList;
        $resolution->name =$request->name;
        $resolution->number =$request->number;
        $resolution->note =$request->note;
        $resolution->save();
        return redirect()->route('calllists');
    }
    public function edit( $id ) {
        $call = CallList::find($id);
        return view('admin.hr.call_list.create', compact('call'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request) {
        $validatedData = $request->validate([
            'number' => 'required',
        ]);
        $resolution = CallList::find($request->id);
        $resolution->name =$request->name;
        $resolution->number =$request->number;
        $resolution->note =$request->note;
        $resolution->save();
        return redirect()->route('calllists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Holiday $holiday ) {
        $holiday = $holiday->findOrFail($request->modal_id);
        $holiday->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, CallList $calllist )
    {
        $calllist = $calllist->findOrFail($request->modal_id);
        $calllist->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Holiday $holiday )
    {
        $holiday = $holiday->findOrFail($request->modal_id);
        $holiday->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
