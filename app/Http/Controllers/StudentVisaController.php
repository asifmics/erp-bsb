<?php

namespace App\Http\Controllers;

use App\StudentVisa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Student;
class StudentVisaController extends Controller
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
            'issue_date' => 'required',
            'expire_date' => 'required',
            'dob' => 'required',
            'passport_number' => 'required',
            'duration' => 'required',
            'place' => 'required',
        ]);
        $issue_date = Carbon::parse($request->issue_date)->format('Y-m-d');
        $expire_date = Carbon::parse($request->expire_date)->format('Y-m-d');
        $dob = Carbon::parse($request->dob)->format('Y-m-d');
        $visa = new StudentVisa;
        $visa->student_id =$request->student_id;
        $visa->issue_date =$issue_date;
        $visa->place =$request->place;
        $visa->expire_date =$expire_date;
        $visa->dob =$dob;
        $visa->passport_number =$request->passport_number;
        $visa->duration =$request->duration;
        $visa->save();
        $notification = array(
            'messege'   =>  'Visa created successfully',
                'alert-type'=>  'success'
            );
        return redirect()->back()->with($notification);
    }
    public function edit( $id ) {
        $visa = StudentVisa::find($id);
        $student = Student::find($visa->student_id);
        return view('admin.student.view', compact('student','visa'));
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


        $issue_date = Carbon::parse($request->issue_date)->format('Y-m-d');
        $expire_date = Carbon::parse($request->expire_date)->format('Y-m-d');
        $dob = Carbon::parse($request->dob)->format('Y-m-d');
        $visa = StudentVisa::find($request->id);
        $visa->student_id =$request->student_id;
        $visa->issue_date =$issue_date;
        $visa->place =$request->place;
        $visa->expire_date =$expire_date;
        $visa->dob =$dob;
        $visa->passport_number =$request->passport_number;
        $visa->duration =$request->duration;
        $visa->save();
        $notification = array(
            'messege'   =>  'Visa Update successfully',
                'alert-type'=>  'success'
            );
            $student_slug = Student::find($request->student_id);
            $student_slug = $student_slug ? $student_slug->slug : 0;

            return redirect()->route('view_student_visa', $student_slug)->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, StudentVisa $visa ) {
        $visa = $visa->findOrFail($id);
        $visa->delete();
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
