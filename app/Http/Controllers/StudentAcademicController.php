<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentAcademic;
use Illuminate\Http\Request;

class StudentAcademicController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'exam' => 'required',
            'institut' => 'required',
            'department' => 'required',
            'board' => 'required',
            'grade' => 'required',
            'pass_year' => 'required',
        ]);
        $academic = new StudentAcademic;
        $academic->student_id =$request->student_id;
        $academic->exam =$request->exam;
        $academic->institut =$request->institut;
        $academic->department =$request->department;
        $academic->board =$request->board;
        $academic->grade =$request->grade;
        $academic->pass_year =$request->pass_year;
        $academic->save();
        return redirect()->back();
    }
    public function edit( $id ) {
        $academic = StudentAcademic::find($id);
        $student = Student::find($academic->student_id);
        return view('admin.student.view', compact('student','academic'));
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
            'student_id' => 'required',
        ]);

        $academic = StudentAcademic::find($request->id);
        $academic->student_id =$request->student_id;
        $academic->exam =$request->exam;
        $academic->institut =$request->institut;
        $academic->department =$request->department;
        $academic->board =$request->board;
        $academic->grade =$request->grade;
        $academic->pass_year =$request->pass_year;
        $academic->save();
        $notification = array(
            'messege'   =>  'Academic Update successfully',
                'alert-type'=>  'success'
            );
            $student_slug = Student::find($request->student_id);
            $student_slug = $student_slug ? $student_slug->slug : 0;

            return redirect()->route('view_student_academic', $student_slug)->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, StudentAcademic $academic ) {
        $academic = $academic->findOrFail($id);
        $academic->delete();
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
