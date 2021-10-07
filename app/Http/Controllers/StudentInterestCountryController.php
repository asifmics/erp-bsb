<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentInterestCountry;
use Illuminate\Http\Request;

class StudentInterestCountryController extends Controller
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
            'country_id' => 'required',
            'university_id' => 'required',
            'university_program_category_id' => 'required',
            'university_program_id' => 'required',
            'addmission_fees' => 'required'
        ]);

        $countryinterest = new StudentInterestCountry;
        $countryinterest->student_id =$request->student_id;
        $countryinterest->country_id =$request->country_id;
        $countryinterest->university_id =$request->university_id;
        $countryinterest->university_program_category_id =$request->university_program_category_id;
        $countryinterest->university_program_id =$request->university_program_id;
        $countryinterest->addmission_fees =$request->addmission_fees;
        $countryinterest->tution_fees =$request->tution_fees;
        $countryinterest->total_course_fees =$request->total_course_fees;
        $countryinterest->save();
        $notification = array(
            'messege'   =>  'Country interest created successfully',
                'alert-type'=>  'success'
            );
        return redirect()->back()->with($notification);
    }
    public function edit( $id ) {
        $interest = StudentInterestCountry::find($id);
        $student = Student::find($interest->student_id);
        return view('admin.student.view', compact('student','interest'));
    }

    public function accept($id)
    {
        $interest = StudentInterestCountry::find($id);
        $interest->adminssion_status = 1;
        $interest->save();
        $notification = array(
            'messege'   =>  'Country interest created successfully',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        $interest = StudentInterestCountry::find($id);
        $interest->adminssion_status = 0;
        $interest->save();
        $notification = array(
            'messege'   =>  'Country interest created successfully',
                'alert-type'=>  'success'
            );
            return redirect()->back()->with($notification);
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

        $countryinterest = StudentInterestCountry::find($request->id);
        $countryinterest->student_id =$request->student_id;
        $countryinterest->country_id =$request->country_id;
        $countryinterest->university_id =$request->university_id;
        $countryinterest->university_program_category_id =$request->university_program_category_id;
        $countryinterest->university_program_id =$request->university_program_id;
        $countryinterest->addmission_fees =$request->addmission_fees;
        $countryinterest->tution_fees =$request->tution_fees;
        $countryinterest->total_course_fees =$request->total_course_fees;
        $countryinterest->save();
        $notification = array(
            'messege'   =>  'Country Interest Update successfully',
                'alert-type'=>  'success'
            );

            return redirect()->back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, StudentInterestCountry $visa ) {
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
