<?php

namespace App\Http\Controllers;

use App\Academic;
use App\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
class AcademicController extends Controller
{
    public function insert( Request $request ) {

        // return $request;

        $validatedData = $request->validate([

            'exam' => 'required',
            'grade' => 'required',
            'pass_year' => 'required',
            'institut' => 'required',
            'group' => 'required',
            'board' => 'required',


        ]);

        $slug = strtolower('acd-' . Str::random(8) . '-' . Str::random(8));

        $academic = new Academic;
        $academic->slug = $slug;
        $academic->employee_id = $request->emp_id;
        $academic->exam = $request->exam;
        $academic->grade = $request->grade;
        $academic->pass_year = $request->pass_year;
        $academic->institut = $request->institut;
        $academic->group = $request->group;
        $academic->board = $request->board;
        $academic->created_at = Carbon::now()->toDateTimeString();

        $academic->save();
        // dd($academic);
        $notification = array(
            'messege'   =>  'Academic create successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit( $id ) {
        $aca = Academic::find($id);
        $employee = Employee::whereId($aca->employee_id)->with('salary_scale_details')->firstOrFail();
        return view('admin.hr.employee.view', compact('aca', 'employee'));
    }

    public function update( Request $request ) {
        // dd($request->all());
        $id =$request->id;
        $validatedData = $request->validate([

            'exam' => 'required',
            'grade' => 'required',
            'pass_year' => 'required',
            'institut' => 'required',
            'group' => 'required',
            'board' => 'required',
        ]);

        $academic = Academic::find($id);
        $academic->employee_id = $request->emp_id;
        $academic->exam = $request->exam;
        $academic->grade = $request->grade;
        $academic->pass_year = $request->pass_year;
        $academic->institut = $request->institut;
        $academic->group = $request->group;
        $academic->board = $request->board;
        $academic->updated_at = Carbon::now()->toDateTimeString();

        $academic->save();
        $notification = array(
        'messege'   =>  'Academic Update successfully',
            'alert-type'=>  'success'
        );
        $emp_slug = Employee::find($request->emp_id);
        $emp_slug = $emp_slug ? $emp_slug->slug : 0;
        return redirect()->route('view_employee_academic', $emp_slug)->with($notification);
    }
    public function delete($id)
    {
        Academic::find($id)->delete();
        $notification = array(
        'messege'   =>  'Academic delete successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }
}
