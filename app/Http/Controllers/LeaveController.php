<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class LeaveController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $leave = Leave::where('status',1)->get();
        return view('admin.hr.leave.all', compact('leave'));
    }

    public function create() {
        return view('admin.hr.leave.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'type' => 'required',
            'leave_day' => 'required',
        ]);

        $slug = strtolower('leave-' . Str::random(8) . '-' . Str::random(8));

        $leave = new leave;
        $leave->type = $request->type;
        $leave->slug = $slug;
        $leave->leave_day = $request->leave_day;
        $leave->save();
        return redirect()->route('all_leave');
    }
    public function edit( $id ) {
        $leave = Leave::find($id);
        return view('admin.hr.leave.create', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Leave $leave ) {
        $validatedData = $request->validate([
            'type' => 'required',
            'leave_day' => 'required',
        ]);


        $leave = Leave::find($request->id);
        $leave->type = $request->type;
        $leave->leave_day = $request->leave_day;
        $leave->save();
        return redirect()->route('all_leave');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Leave $leave ) {
        $leave = $leave->findOrFail($request->modal_id);
        $leave->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Leave $leave )
    {
        $leave = $leave->findOrFail($request->modal_id);
        $leave->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Leave $leave )
    {
        $leave = $leave->findOrFail($request->modal_id);
        $leave->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
