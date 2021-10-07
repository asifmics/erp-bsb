<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ExperienceController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $experience = Experience::where('status',1)->get();
        return view('admin.hr.experience.all', compact('experience'));
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
            'company_name' => 'required',
            'designation' => 'required',
            'date_to' => 'required',
            'date_from' => 'required',
        ]);

        $slug = strtolower('experience-' . Str::random(8) . '-' . Str::random(8));
        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->format('Y-m-d');
        $experience = new Experience;
        $experience->employee_id = $request->employee_id;
        $experience->company_name = $request->company_name;
        $experience->designation = $request->designation;
        $experience->description = $request->description;
        $experience->date_to = $end;
        $experience->date_from = $start;
        $experience->slug = $slug;
        $experience->save();
        return redirect()->back();
    }
    public function edit( $id ) {
        $exp = Experience::find($id);
        $employee = Employee::find($exp->employee_id);
        return view('admin.hr.employee.view', compact('exp', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Experience $experience ) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'company_name' => 'required',
            'designation' => 'required',
            'date_to' => 'required',
            'date_from' => 'required',
        ]);
        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->format('Y-m-d');
        $experience = Experience::find($request->id);
        $experience->employee_id = $request->employee_id;
        $experience->company_name = $request->company_name;
        $experience->designation = $request->designation;
        $experience->description = $request->description;
        $experience->date_to = $end;
        $experience->date_from = $start;
        $experience->save();
        $notification = array(
            'messege'   =>  'Experience Update successfully',
                'alert-type'=>  'success'
            );
            $emp_slug = Employee::find($request->employee_id);
            $emp_slug = $emp_slug ? $emp_slug->slug : 0;

            return redirect()->route('view_employee_experience', $emp_slug)->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, Experience $experience ) {
        $experience = $experience->findOrFail($id);
        $experience->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Experience $experience )
    {
        $experience = $experience->findOrFail($request->modal_id);
        $experience->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Experience $experience )
    {
        $experience = $experience->findOrFail($request->modal_id);
        $experience->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
