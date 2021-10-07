<?php

namespace App\Http\Controllers;

use App\Employee;
use App\SalaryDetails;
use App\SalaryScale;
use App\SalaryString;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use Illuminate\Validation\Rule;
use App;
use App\Mail\EmployeeCredentialNotify;
use App\User;
use PDF;
use Mail;
use Illuminate\Support\Facades\Hash;
class EmployeeController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $employees = Employee::where('status',1)->get();
        return view('admin.hr.employee.all', compact('employees'));
    }

    public function add() {
        return view('admin.hr.employee.create');
    }

    /**
     * @param $slug
     */
    public function edit( $slug ) {
        $employee = Employee::whereSlug($slug)->firstOrFail();
        return view('admin.hr.employee.create', compact('employee'));
    }

    /**
     * @param $slug
     */
    public function view( $slug ) {
        $employee = Employee::whereSlug($slug)->with('salary_scale_details')->firstOrFail();
        return view('admin.hr.employee.view', compact('employee'));
    }
    public function printview( $slug ) {
        $employee = Employee::whereSlug($slug)->with('salary_scale_details')->firstOrFail();
        return view('admin.hr.employee.view.printview', compact('employee'));
    }

    /**
     * @param Request $request
     */
    public function insert( Request $request ) {

        $validatedData = $request->validate([
            'id_no' => 'required|unique:employees|max:255',
            'name' => 'required',
            'email' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'blood_group' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',

        ]);

        $slug = strtolower('emp-' . Str::random(8) . '-' . Str::random(8));
        $joining_date =date('Y-m-d', strtotime($request->joining_date));
        $date =date('Y-m-d', strtotime($request->maturity_age));
        $employee = new Employee;
        $employee->slug = $slug;
        $employee->id_no = $request->id_no;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->shift_id = $request->shift_id;
        $employee->designation_id = $request->designation_id;
        $employee->joining_date = $joining_date;
        $employee->maturity_age = $date;
        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->religion = $request->religion;
        $employee->dob = $request->dob;
        $employee->nationality = $request->nationality;
        $employee->blood_group = $request->blood_group;
        $employee->marital_status = $request->marital_status;
        $employee->emp_status = $request->emp_status;
        $employee->gender = $request->gender;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->created_at = Carbon::now()->toDateTimeString();
        $image = $request->pic;
         if ($image) {
            $image_name= 'Employee_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/employee/'.$image_name);
            $employee->image='uploads/employee/'.$image_name;

            $employee->save();
            return redirect()->route('all_employee')->with('success', 'Successfully Saved!');
          }else {
            $employee->save();

            return redirect()->route('all_employee')->with('success', 'Successfully Saved!');
          }
    }
    /**
     * @param Request $request
     */
    public function update( Request $request ) {
        $id =$request->id;

        $validatedData = $request->validate([
            'id_no' => ['required' , Rule::unique('employees')->ignore($id),'max:100',],
            'name' => 'required',
            'slug' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'nationality' => 'required',
            'blood_group' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
        ]);
        $date =date('Y-m-d', strtotime($request->maturity_age));
        $joining_date =date('Y-m-d', strtotime($request->joining_date));
        $employee = Employee::whereSlug($request->slug)->firstOrFail();
        $employee->id_no = $request->id_no;
        $employee->name = $request->name;
        $employee->shift_id = $request->shift_id;
        $employee->designation_id = $request->designation_id;
        $employee->joining_date = $joining_date;
        $employee->maturity_age = $date;
        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->religion = $request->religion;
        $employee->dob = $request->dob;
        $employee->emp_status = $request->emp_status;
        $employee->nationality = $request->nationality;
        $employee->blood_group = $request->blood_group;
        $employee->marital_status = $request->marital_status;
        $employee->emp_status = $request->emp_status;
        $employee->gender = $request->gender;
        $image = $request->pic;
        if ($image) {
           $image_name= 'Employee_'.time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save('uploads/employee/'.$image_name);
           $employee->image='uploads/employee/'.$image_name;
           if($request->old_image != ''){
           unlink($request->old_image);
           }
           $employee->save();

           return redirect()->back()->with('success', 'Successfully Saved!');
         }else {
           $employee->save();

           return redirect()->back()->with('success', 'Successfully Saved!');
         }
    }
    public function officialupdate( Request $request ) {
        // return $request;
        $employee = Employee::whereSlug($request->slug)->firstOrFail();
        $employee->salary_scale = $request->salary_scale;
        $employee->branch = $request->branch;

        $employee->department = $request->department;
        $employee->designation_id = $request->designation;
        $employee->save();

        if($request->salary_scale == 0){
            foreach($request->string as $id => $string){
                SalaryDetails::updateOrCreate(
                    ['employee_id' => $employee->id, 'string_id' => $id],
                    ['amount' => $string]
                );
            }
        }else{

            $strings = SalaryString::all();
            $salary_string_fixed = 0;
            foreach($strings as $string){
                if($string->type == "Fixed"){
                    $salary_string_fixed += $string->amount;
                }
            }

            function calculate($salary, $amount, $type, $salary_string_fixed){

                if($type == "Fixed"){
                    return $amount;
                }else{
                    return (($salary - $salary_string_fixed) * $amount) / 100;
                }
            }

            $salary = SalaryScale::find($request->salary_scale);

            foreach($strings as $string){
                SalaryDetails::updateOrCreate(
                    ['employee_id' => $employee->id, 'string_id' => $string->id],
                    ['amount' => calculate($salary->amount, $string->amount, $string->type, $salary_string_fixed)]
                );
            }
        }


           return redirect()->back()->with('success', 'Successfully Saved!');
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
    public function commissionupdate( Request $request ) {

        $employee = Employee::whereSlug($request->slug)->firstOrFail();
        $employee->commission_type = $request->commission_type;
        $employee->commission = $request->commission;
        $employee->save();

           return redirect()->back()->with('success', 'Successfully Update!');
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
        $empStatus = Employee::findOrFail($request->modal_id);
        $empStatus->update(['status'=> 0 ,'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request) {
        $empStatus = Employee::findOrFail($request->modal_id);
        $empStatus->update(['status'=> 1 ,'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
    public function allcounsellor()
    {
        $employees = Employee::where('designation_id', 2)->where('status',1)->get();
        return view('admin.hr.counsellor.all',compact('employees'));
    }
    public function allagent()
    {
        $employees = Employee::where('designation_id', 1)->where('status',1)->get();
        return view('admin.hr.agent.all',compact('employees'));
    }
    public function allreceptionist()
    {
        $employees = Employee::where('designation_id', 3)->where('status',1)->get();
        return view('admin.hr.receptionist.all',compact('employees'));
    }
    public function activeemployeelist()
    {
        $employees = Employee::where('status',1)->get();
        return view('admin.hr.employee.active_all',compact('employees'));
    }

    public function makeuser(Request $request)
    {

        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name =     $request->name;
        $user->image =    $request->image;
        $user->phone =    $request->phone;
        $user->email =    $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole($request->role);
        $user->save();
        $data = [];
        $data['name']     = $request->name;
        $data['image']    = $request->image;
        $data['phone']    = $request->phone;
        $data['email']    = $request->email;
        $data['password'] = $request->password;
        Mail::to($user->email)->send(new EmployeeCredentialNotify($data));
        $notification = array(
            'messege'   =>  'Credinatal created successfully',
                'alert-type'=>  'success'
            );
               return redirect()->back()->with($notification);
    }
}
