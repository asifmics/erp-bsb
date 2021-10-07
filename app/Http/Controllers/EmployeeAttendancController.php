<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeAttendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EmployeeAttendancController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        return view('admin.hr.attendanc.index');

    }
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'branch_id' => 'required',
        ]);
        $employees = Employee::where('status',1)->where('branch', $request->branch_id)->get();
        $branch_id = $request->branch_id;
        $attendanc_date =date('Y-m-d', strtotime($request->attendanc_date));
        return view('admin.hr.attendanc.create',compact('employees','attendanc_date','branch_id'));
    }
    public function store(Request $request)
    {
        // dd($request->date);
        $employees = Employee::where('status',1)->where('branch', $request->branch_id)->get();
        $branch_id =$request->branch_id;
        $attendanc_date =$request->date;
        foreach($request->employee_id as $key => $employee ){
          $attendance =  EmployeeAttendance::where('employee_id',$employee)->where('branch_id',$request->branch_id)->where('date',$request->date)->first();
            if($attendance){
                $attendance->update(['in_time' =>$request->in_time[$key],'out_time'=> $request->out_time[$key]]);
            }else{
                EmployeeAttendance::create(['date'=>$request->date,'branch_id'=>$request->branch_id ,'employee_id'=>$employee, 'in_time' =>$request->in_time[$key],'out_time'=> $request->out_time[$key], 'attendanc' =>'Present']);
            }
        }
        return view('admin.hr.attendanc.create',compact('employees','attendanc_date','branch_id'));

    }

    public function absent($id)
    {
        $attendance = EmployeeAttendance::find($id);
        if($attendance->attendanc == 'Present'){
            $employees = Employee::where('status',1)->where('branch', $attendance->branch_id)->get();
            $attendance->update(['in_time' =>null,'out_time'=> null, 'attendanc' =>'Absent']);
        }elseif($attendance->attendanc == 'Absent'){
            $employees = Employee::where('status',1)->where('branch', $attendance->branch_id)->get();
            $attendance->update(['in_time' =>$attendance->employee->shift->start,'out_time'=> $attendance->employee->shift->end, 'attendanc' =>'Present']);
        }

        $attendanc_date =$attendance->date;
        $branch_id =$attendance->branch_id;
        return view('admin.hr.attendanc.create',compact('employees','attendanc_date','branch_id'));
    }

    public function dayWishAttendanc(Request $request)
    {
        return view('admin.hr.attendanc.daywishattendanc');

    }
    public function dayWishAttendancview(Request $request)
    {

        $validatedData = $request->validate([
            'branch_id' => 'required',
        ]);
        $employees = Employee::where('status',1)->where('branch', $request->branch_id)->get();
        $attendanc_date =date('Y-m-d', strtotime($request->attendanc_date));
        return view('admin.hr.attendanc.dayWishView',compact('employees','attendanc_date'));
    }
    public function employeeWishAttendanc()
    {
      return view('admin.hr.attendanc.employeeAttendanc');
    }
    public function getajaxEmployee(Request $request)
    {
     $id =$request->id;
    $employees = Employee::where('branch', $id)->get();

    return response()->json($employees);
    }
    public function employeeWishAttendancview(Request $request)
    {

    $from =date('Y-m-d', strtotime($request->date_from));
    $to = date('Y-m-d', strtotime($request->date_to));
    $branch_id =$request->branch_id;
    $employee_id =$request->employee_id;
    $employees =EmployeeAttendance::where('employee_id', $employee_id)->where('branch_id',$branch_id)->where('date','>=', $from)->where('date', '<=', $to)->get();
    return view('admin.hr.attendanc.employeeAttendancView',compact('employees'));
    }
}
