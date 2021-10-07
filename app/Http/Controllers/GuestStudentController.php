<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Student;
use App\StudentAcademic;
use App\StudentExperiance;
use App\University;
use App\UniversityProgram;
use App\UniversityProgramCategory;
use App\UniversityWiseProgram;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class GuestStudentController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function create()
    {
       return view('admin.student.guest.create');
    }

    public function index()
    {
        $guests =Student::where('status',1)->where('student_status','Guest')->get();
        return view('admin.student.guest.all', compact('guests'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'visitor_id' => 'required',
            'contracked_by' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
        ]);
        $dob =date('Y-m-d', strtotime($request->dob));
        $date =date('Y-m-d', strtotime($request->guest_date));
        $slug = strtolower('student-' . Str::random(8) . '-' . Str::random(8));
        $guest = new Student;
        $guest->visitor_id = $request->visitor_id;
        $guest->name = $request->name;
        $guest->guest_date = $date;
        $guest->dob = $dob;
        $guest->to = $request->to;
        $guest->slug = $slug;
        $guest->room = $request->room;
        $guest->purpose_study = $request->purpose_study;
        $guest->purpose_ielts = $request->purpose_ielts;
        $guest->purpose_visit = $request->purpose_visit;
        $guest->purpose_others = $request->purpose_others;
        $guest->nationality = $request->nationality;
        $guest->subject = $request->subject;
        $guest->marital_status = $request->marital_status;
        $guest->hear_fair = $request->hear_fair;
        $guest->hear_seminar = $request->hear_seminar;
        $guest->hear_staff = $request->hear_staff;
        $guest->hear_ads = $request->hear_ads;
        $guest->hear_relative = $request->hear_relative;
        $guest->hear_newspaper = $request->hear_newspaper;
        $guest->hear_facebook = $request->hear_facebook;
        $guest->hear_agent = $request->hear_agent;
        $guest->hear_leaflet = $request->hear_leaflet;
        $guest->hear_webpage = $request->hear_webpage;
        $guest->hear_spot = $request->hear_spot;
        $guest->hear_tv = $request->hear_tv;
        $guest->hear_others = $request->hear_others;
        if($request->ref_check == 1){
            $agent = new Agent;
            $agent->name =$request->agent_name;
            $agent->email =$request->agent_email;
            $agent->phone =$request->agent_phone;
            $agent->save();
            $guest->ref_by = $agent->id;
        }else{
            $guest->ref_by = $request->ref_by;
        }
        $guest->reception = $request->reception;
        $guest->counsellor = $request->counsellor;
        $guest->student_status = 'Guest';
        $image = $request->image;
         if ($image) {
            $image_name= 'guest_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/student/'.$image_name);
            $guest->image='uploads/student/'.$image_name;
            $guest->save();
            $id = $guest->id;
          }else {
            $guest->save();
            $id = $guest->id;
          }
        //   if($request->exam != null){
        //     $count= count($request->exam);
        //     for ($i=0; $i < $count; $i++) {
        //       $academic = new StudentAcademic;
        //       $academic->student_id =$id;
        //       $academic->exam =$request->exam[$i];
        //       $academic->institut =$request->institut[$i];
        //       $academic->department =$request->department[$i];
        //       $academic->board =$request->board[$i];
        //       $academic->grade =$request->grade[$i];
        //       $academic->pass_year =$request->pass_year[$i];
        //       $academic->save();
        //       // dd($academic);
        //     }
        // }
        // if($request->company != null){
        //       $count= count($request->company);
        //       for ($i=0; $i < $count; $i++) {
        //       $experiance = new StudentExperiance;
        //       $experiance->student_id =$id;
        //       $experiance->company =$request->company[$i];
        //       $experiance->duration =$request->duration[$i];
        //       $experiance->designation =$request->designation[$i];
        //       $experiance->save();
        //       // dd($document);
        //     }
        // }
        return redirect()->route('all_guest_student')->with('success', 'Successfully Saved!');
    }
    public function admissioncreate()
    {
        return view('admin.student.admission.create');
    }
    public function admissionstore(Request $request)
    {
        $date =date('Y-m-d', strtotime($request->admission_date));
        $app_deadline =date('Y-m-d', strtotime($request->application_deadline));
        $admission = Student::find($request->id);
        $admission->visitor_id = $request->visitor_id;
        $admission->id_no = rand(1000, 100000000);
        $admission->admission_date = $date;
        $admission->apply_for = $request->apply_for;
        $admission->name = $request->name;
        $admission->nationality = $request->nationality;
        $admission->location = $request->nationality;
        $admission->university = $request->university;
        $admission->course_cat = $request->course_category;
        $admission->course = $request->course;
        $admission->reg_fees = $request->reg_fees;
        $admission->tution_fees = $request->tution_fees;
        $admission->total_course_fees = $request->total_course_fees;
        $admission->mode_of_payment = $request->mode_of_payment;
        $admission->living_cost = $request->living_cost;
        $admission->job_permission = $request->job_permission;
        $admission->application_deadline = $app_deadline;
        $admission->commencement_date = $request->commencement_date;
        $admission->visa_fees = $request->visa_fees;
        $admission->ambassy_address = $request->ambassy_address;
        $admission->air_tiket = $request->air_tiket;
        $admission->comments = $request->comments;
        $admission->counsellor = $request->counsellor;
        $admission->student_status = 'Student';
        $admission->save();
        return redirect()->route('view_student',$request->slug)->with('success', 'Successfully Saved!');
    }
    public function getuniversity($id)
    {
        $university = University::where('country',$id)->where('status',1)->get();
        return response()->json($university);
    }
    public function getcoursecategory($id)
    {
        $courses = UniversityWiseProgram::where('university',$id)->where('status',1)->select('category')->groupBy('category')->get();

        $html ='<option value="">Select</option>';
        if (!empty($courses)){
            foreach ($courses as $course){
                $html .='<option value="'.$course->category.'">'.$course->CategoryName->name.'</option>';
            }
        }
        return response()->json($html);
    }
    public function getcourse(Request $request)
    {
        $university = $request->university;
        $cat = $request->cat_id;
        $courses = UniversityWiseProgram::where('university',$university)->where('category',$cat)->where('status',1)->select('program')->groupBy('program')->get();
        $html ='<option value="">Select</option>';
        if (!empty($courses)){
            foreach ($courses as $course){
                $html .='<option value="'.$course->program.'">'.$course->programName->name.'</option>';
            }
        }
        return response()->json($html);
    }
    public function getcategorycourse(Request $request)
    {
        $university = $request->university;
        $cat_id = $request->cat_id;

        $courses = UniversityProgram::where('category',$cat_id)->where('status',1)->get();
        $html ='<option value="">Select</option>';
        if (!empty($courses)){
            foreach ($courses as $course){
                $html .='<option value="'.$course->id.'">'.$course->name.'</option>';
            }
        }
        return response()->json($html);
    }

    public function getcoursefees(Request $request)
    {
        $university = $request->university;
        $category = $request->category;
        $course = $request->course;
        $courses = UniversityWiseProgram::where('university',$university)->where('category',$category)->where('program',$course)->where('status',1)->first();
        $data = [];
        $data['tution_fees'] =$courses->tution_fees;
        $data['total_tution_fees'] =$courses->total_tution_fees;
            return response()->json($data);
    }
}
