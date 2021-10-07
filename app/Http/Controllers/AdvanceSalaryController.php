<?php

namespace App\Http\Controllers;

use App\AdvanceSalary;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AdvanceSalaryController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $advancesalary = AdvanceSalary::where('status',1)->get();
        return view('admin.hr.experience.all', compact('advancesalary'));
    }

    public function create() {
        return view('admin.hr.experience.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'date' => 'required',
        ]);

        $slug = strtolower('advance-' . Str::random(8) . '-' . Str::random(8));
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $month = $request->month;
        $year = $request->year;
        $advance = new AdvanceSalary;
        $advance->employee_id = $request->employee_id;
        $advance->advance = $request->advance;
        // $advance->reason = $request->reason;
        $advance->date = $date;
        $advance->month = $month;
        $advance->year = $year;
        $advance->slug = $slug;
        $advance->save();
        return redirect()->back();
    }
    public function edit( $id ) {
        $advance = AdvanceSalary::find($id);
        $employee = Employee::find($advance->employee_id);
        return view('admin.hr.employee.view', compact('advance', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, AdvanceSalary $advance ) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'date' => 'required',
        ]);
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $month = $request->month;
        $year = $request->year;
        $advance = AdvanceSalary::find($request->id);
        $advance->employee_id = $request->employee_id;
        $advance->advance = $request->advance;
        // $advance->reason = $request->reason;
        $advance->date = $date;
        $advance->month = $month;
        $advance->year = $year;
        $advance->save();
        $notification = array(
            'messege'   =>  'Advance Salary Update successfully',
                'alert-type'=>  'success'
            );
            $emp_slug = Employee::find($request->employee_id);
            $emp_slug = $emp_slug ? $emp_slug->slug : 0;

            return redirect()->route('view_employee_advancesalary', $emp_slug)->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, AdvanceSalary $advancesalary ) {
        $advancesalary = $advancesalary->findOrFail($id);
        $advancesalary->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, AdvanceSalary $advance )
    {
        $advance = $advance->findOrFail($request->modal_id);
        $advance->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, AdvanceSalary $advance )
    {
        $advance = $advance->findOrFail($request->modal_id);
        $advance->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
