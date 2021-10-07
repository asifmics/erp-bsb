<?php

namespace App\Http\Controllers;

use App\Employee;
use App\LoanDetails;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class LoanReportController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function report()
    {
        return view('admin.loan_managment.loan_report.index');
    }
    public function searchreport(Request $request)
    {

        $start = Carbon::parse($request->start)->format('Y-m-d');
        $end = Carbon::parse($request->end)->format('Y-m-d');

        $date =array_filter($request->only('start','end'));
        $all =array_filter($request->except('_token','start','end'));

        if(empty($date)){
            $loans = DB::table('loan_details')
             ->join('employees','loan_details.employee_id','employees.id')
             ->select('loan_details.*','employees.*')
             ->where($all)->get();
        }else{
            $loans = DB::table('loan_details')
            ->join('employees','loan_details.employee_id','employees.id')
            ->select('loan_details.*','employees.*')
            ->where($all)->whereDate('loan_details.loan_taken_date', '>=',$start)->whereDate('loan_details.loan_taken_date', '<=',$end)->get();
        }
        return view('admin.loan_managment.loan_report.all',compact('loans'));
    }
    public function reportexport()
    {
        return view('admin.loan_managment.loan_report.all',compact('employees'));
    }
}
