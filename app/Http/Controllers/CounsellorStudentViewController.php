<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentAcademic;
use App\StudentInterestCountry;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class CounsellorStudentViewController extends Controller
{
    public function create($slug)
    {
        $student = Student::where('status',1)->where('slug',$slug)->first();
        return view('admin.student.consellor_view',compact('student'));
    }
    public function update(Request $request)
    {
    //   dd($request->all());
    $student =Student::find($request->student_id);
    $student->name = $request->name;
    $student->email = $request->email;
    $student->phone = $request->phone;
    // $student->nid = $request->national_id;
    $student->nationality = $request->nationality;
    $student->dob = $request->dob;
    $student->gender = $request->gender;
    $student->religion = $request->religion;
    $student->father_name = $request->father_name;
    $student->father_profession = $request->father_profession;
    $student->mother_name = $request->mother_name;
    $student->mother_profession = $request->mother_profession;
    $student->save();
    if($request->exam[0] != null){
        $count= count($request->exam);
        for ($i=0; $i < $count; $i++) {
            if($request->aca_id[$i] == ''){
                $academic = new StudentAcademic();
                $academic->student_id =$request->student_id;
                $academic->exam =$request->exam[$i];
                $academic->institut =$request->institut[$i];
                $academic->department =$request->department[$i];
                $academic->board =$request->board[$i];
                $academic->grade =$request->grade[$i];
                $academic->pass_year =$request->pass_year[$i];
                $academic->save();
            }else{
                $academic = StudentAcademic::find($request->aca_id[$i]);
                $academic->student_id =$request->student_id;
                $academic->exam =$request->exam[$i];
                $academic->institut =$request->institut[$i];
                $academic->department =$request->department[$i];
                $academic->board =$request->board[$i];
                $academic->grade =$request->grade[$i];
                $academic->pass_year =$request->pass_year[$i];
                $academic->save();
            }

          // dd($academic);
        }
    }
    if($request->country_id[0] != null){
        $count= count($request->country_id);
        for ($i=0; $i < $count; $i++) {
            if($request->in_coun_id[$i] == ''){
                $incoun = new StudentInterestCountry;
                $incoun->student_id =$request->student_id;
                $incoun->country_id =$request->country_id[$i];
                $incoun->university_id =$request->university_id[$i];
                $incoun->university_program_category_id =$request->university_program_category_id[$i];
                $incoun->university_program_id =$request->university_program_id[$i];
                $incoun->adminssion_status =$request->status[$i] ?? 0;
                $incoun->save();
            }
            else{
                $incoun = StudentInterestCountry::find($request->in_coun_id[$i]);
                $incoun->student_id =$request->student_id;
                $incoun->country_id =$request->country_id[$i];
                $incoun->university_id =$request->university_id[$i];
                $incoun->university_program_category_id =$request->university_program_category_id[$i];
                $incoun->university_program_id =$request->university_program_id[$i];
                $incoun->adminssion_status =$request->status[$i] ?? 0;
                $incoun->save();
            }
                    // dd($academic);
        }
    }

    $student =Student::find($request->student_id);
    return redirect()->route('counsellor_requsition_details',$student->slug);
    }
    public function requsition($slug)
    {
        $student = Student::where('slug',$slug)->first();

        return view('admin.student.consellor_requsition',compact('student'));

    }
}
