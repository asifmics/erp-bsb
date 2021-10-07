<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentAcademic;
use App\StudentDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DatePeriod;
use Image;
use Illuminate\Validation\Rule;
class StudentController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function index() {
        $students = Student::where('status',1)->where('student_status','Student')->get();
        return view('admin.student.all',compact('students'));
    }
    public function create() {
        return view('admin.student.create');
    }
    /**
     * @param $slug
     */
    public function edit( $slug ) {
        $student = Student::whereSlug($slug)->firstOrFail();
        return view('admin.hr.student.create', compact('student'));
    }
    /**
     * @param $slug
     */
    public function view($slug) {
        $student = Student::whereSlug($slug)->firstOrFail();
        return view('admin.student.view',compact('student'));

    }
    public function printview($slug) {
        $student = Student::whereSlug($slug)->firstOrFail();
        return view('admin.student.view.printview',compact('student'));
    }
    /**
     * @param Request $request
     */
    public function store( Request $request ) {

        $validatedData = $request->validate([
            'id_no' => 'required|unique:students|max:255',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
        ]);
        // dd($request->all());
        $slug = strtolower('student-' . Str::random(8) . '-' . Str::random(8));
        $dob =date('Y-m-d', strtotime($request->dob));
        $student = new Student;
        $student->slug = $slug;
        $student->id_no = $request->id_no;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->national_id = $request->national_id;
        $student->passport_id = $request->passport_id;
        $student->blood_group = $request->blood_group;
        $student->father_name = $request->father_name;
        $student->father_profession = $request->father_profession;
        $student->mother_name = $request->mother_name;
        $student->mother_profession = $request->mother_profession;
        $student->dob = $dob;
        $student->religion = $request->religion;
        $student->nationality = $request->nationality;
        $student->gender = $request->gender;
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->student_status = 'Student';
        $student->created_at = Carbon::now()->toDateTimeString();
        $image = $request->photo;
         if ($image) {
            $image_name= 'student_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/student/'.$image_name);
            $student->image='uploads/student/'.$image_name;
            $student->save();
            $id = $student->id;
          }else {
            $student->save();
            $id = $student->id;

          }
          if($request->exam != null){
              $count= count($request->exam);
              for ($i=0; $i < $count; $i++) {
                $academic = new StudentAcademic;
                $academic->student_id =$id;
                $academic->exam =$request->exam[$i];
                $academic->institut =$request->institut[$i];
                $academic->department =$request->department[$i];
                $academic->board =$request->board[$i];
                $academic->grade =$request->grade[$i];
                $academic->pass_year =$request->pass_year[$i];
                $academic->save();
                // dd($academic);
              }
          }
          if($request->document_title != null){
                $count= count($request->document_title);
                for ($i=0; $i < $count; $i++) {
                $document = new StudentDocument;
                $document->student_id =$id;
                $document->document_title =$request->document_title[$i];
                $document->document_type =$request->document_type[$i];
                $doc_file =$request->document[$i];
                $image_name= 'document_'.time().'.'.$doc_file->getClientOriginalExtension();
                $doc_file->move('uploads/document/',$image_name);
                $document->document='uploads/document/'.$image_name;
                $document->save();
                // dd($document);
              }
          }
            return redirect()->route('all_student')->with('success', 'Successfully Saved!');
    }

    /**
     * @param Request $request
     */
    public function update( Request $request ) {

        $id =$request->id;

        $validatedData = $request->validate([
            'id_no' => ['required' , Rule::unique('students')->ignore($id),'max:100',],
            'name' => 'required',
            'slug' => 'required',
        ]);
        $dob =date('Y-m-d', strtotime($request->dob));
        $student = Student::whereSlug($request->slug)->firstOrFail();
        $student->id_no = $request->id_no;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->dob = $dob;
        $student->nationality = $request->nationality;
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->save();
          return redirect()->back()->with('success', 'Successfully Update Personal Information!');

    }
    public function passportupdate( Request $request ) {
        // return $request;
        $passport = Student::whereSlug($request->slug)->firstOrFail();
        $passport->passport_id = $request->passport_id;
        $passport->save();
        return redirect()->back()->with('success', 'Successfully Updated Passport!');

        }
    public function contactupdate( Request $request ) {

        $employee = Employee::whereSlug($request->slug)->firstOrFail();
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->whatsapp = $request->whatsapp;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->save();

           return redirect()->back()->with('success', 'Successfully Saved!');
    }

    public function providentfundupdate( Request $request ) {

        $provident = new ProvidentFund;
        $provident->employee_provident = $request->employee_provident;
        $provident->company_provident = $request->company_provident;
        $provident->employee_id = $request->id;
        $provident->save();
        $notification = array(
        'messege'   =>  'Provident fund Update successfully',
            'alert-type'=>  'success'
        );
           return redirect()->back()->with($notification);
    }

    public function softdelete(Request $request) {
        $empStatus = Student::findOrFail($request->modal_id);
        $empStatus->update(['status'=> 0 ,'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request) {
        $empStatus = Student::findOrFail($request->modal_id);
        $empStatus->update(['status'=> 1 ,'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }


}
