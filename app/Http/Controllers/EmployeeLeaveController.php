<?php

namespace App\Http\Controllers;

use App\EmployeeLeave;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
class EmployeeLeaveController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $emp_leave = EmployeeLeave::where('status',1)->get();
        return view('admin.hr.emp_leave.all', compact('emp_leave'));
    }

    public function create() {
        return view('admin.hr.emp_leave.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'leave_id' => 'required',
            'date_to' => 'required',
            'date_from' => 'required',
        ]);

        $slug = strtolower('emp-leave-' . Str::random(8) . '-' . Str::random(8));
        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->format('Y-m-d');

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $end);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $start);
        $diff_in_days = $to->diffInDays($from);
        $emp_leave = new Employeeleave;
        $emp_leave->employee_id = $request->employee_id;
        $emp_leave->leave_id = $request->leave_id;
        $emp_leave->date_to = $request->date_to;
        $emp_leave->date_from = $request->date_from;
        $emp_leave->slug = $slug;
        $emp_leave->total_day = $diff_in_days;
        $emp_leave->reason = $request->reason;
        $emp_leave->save();
        return redirect()->route('all_emp_leave');
    }
    public function edit( $id ) {
        $emp_leave = EmployeeLeave::find($id);
        return view('admin.hr.emp_leave.create', compact('emp_leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, EmployeeLeave $emp_leave ) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'leave_id' => 'required',
            'date_to' => 'required',
            'date_from' => 'required',
        ]);

        $emp_leave = EmployeeLeave::find($request->id);
        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->format('Y-m-d');

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $end);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $start);
        $diff_in_days = $to->diffInDays($from);
        $emp_leave->employee_id = $request->employee_id;
        $emp_leave->leave_id = $request->leave_id;
        $emp_leave->date_to = $request->date_to;
        $emp_leave->date_from = $request->date_from;
        $emp_leave->total_day = $diff_in_days;
        $emp_leave->reason = $request->reason;
        $emp_leave->save();
        return redirect()->route('all_emp_leave');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, EmployeeLeave $emp_leave ) {
        $emp_leave = $emp_leave->findOrFail($request->modal_id);
        $emp_leave->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, EmployeeLeave $emp_leave )
    {
        $emp_leave = $emp_leave->findOrFail($request->modal_id);
        $emp_leave->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, EmployeeLeave $emp_leave )
    {
        $emp_leave = $emp_leave->findOrFail($request->modal_id);
        $emp_leave->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }

    public function approved(Request $request, EmployeeLeave $emp_leave)
    {

        $emp_leave = $emp_leave->findOrFail($request->modal_id);
       $emp_leave->update(['approved' => 'Yes', 'updated_at'=> Carbon::now()->toDateTimeString()]);

        return redirect()->back()->with('success', 'Employee leave approved Successfully');
    }
    public function unapproved(Request $request,  EmployeeLeave $emp_leave)
    {
        // dd($request->all());

        $emp_leave = $emp_leave->findOrFail($request->modal_id);
        $emp_leave->update(['approved' => 'No', 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Employee leave unapproved Successfully');
    }
}
