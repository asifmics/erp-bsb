<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeReportController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function report()
    {
        return view('admin.hr.employee_report.index');
    }
    public function searchreport(Request $request)
    {

        $all =array_filter($request->except('_token'));
        $employees = Employee::where($all)->get();
        return view('admin.hr.employee_report.all',compact('employees'));
    }
    public function reportexport()
    {
        return view('admin.hr.employee_report.all',compact('employees'));
    }
    public function workreport()
    {
        return view('admin.hr.working_day_info.index');
    }
    public function worksearchreport(Request $request)
    {

        // $all =array_filter($request->except('_token'));
        // $employees = Employee::where($all)->get();
        return view('admin.hr.working_day_info.all');
    }
    public function workreportexport()
    {
        return view('admin.hr.working_day_info.all',compact('employees'));
    }
}
