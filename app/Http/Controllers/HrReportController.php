<?php

namespace App\Http\Controllers;

use App\Employee;
use App\ExcelReports\ActiveEmpDetailsReportExcel;
use App\ExcelReports\ActiveEmpReportExcel;
use App\ExcelReports\BankTransferReportExcel;
use App\ExcelReports\BonusTransferReportExcel;
use App\ExcelReports\CashSalaryReportExcel;
use App\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class HrReportController extends Controller
{
    public function activeEmployees()
    {
        $employees = Employee::where('emp_status', 1)->where('status', 1)->get();
        return view('admin.hr.report.employee.active_all', compact('employees'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function activeEmpPdf()
    {
        $employees = Employee::where('emp_status', 1)->where('status', 1)->get();
        $pdf = PDF::loadview('admin.hr.report.employee.pdf.active-employees', compact('employees'))->setPaper('a4');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");

    }

    public function activeEmpExcel()
    {
        return Excel::download(new ActiveEmpReportExcel(), md5(rand().time()).'.xlsx','Xlsx');
    }

    public function activeEmployeesDetails()
    {
        $employees = Employee::where('emp_status', 1)->where('status', 1)->with('salary_scale_details', 'branch_details')->get();
        return view('admin.hr.report.employee.active_all_details', compact('employees'));
    }

    public function activeDetailsEmpExcel()
    {
        return Excel::download(new ActiveEmpDetailsReportExcel(), md5(rand().time()).'.xlsx','Xlsx');
    }

    public function activeEmpDetailsPdf()
    {
        $employees = Employee::where('emp_status', 1)->where('status', 1)->get();
        $pdf = PDF::loadview('admin.hr.report.employee.pdf.active-employees-details', compact('employees'))->setPaper('legal', 'landscape');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");

    }

    //employee working day report
    public function workingDay(Request $request)
    {
        return view('admin.hr.report.working-day.workday_filter');
    }

    public function workingDayPdf($slug)
    {
        $pdf = PDF::loadview('admin.hr.report.working-day.workday_pdf',compact('slug'))->setPaper('a4');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");
    }

    //bank Transfer sheet report
    public function bankTransfer()
    {
        $employees = Employee::where('account_no', '!=', Null)->where('status', 1)->get();
        $pdf = PDF::loadview('admin.hr.report.bank.transfer-sheet', compact('employees'))->setPaper('a4');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");
    }

    public function bankTransferExcel()
    {
        return Excel::download(new BankTransferReportExcel(), md5(rand().time()).'.xlsx','Xlsx');

    }

    public function cashSalaryPdf()
    {
        $employees = Employee::where('account_no',Null)->where('status',1)->get();
        $pdf = PDF::loadview('admin.hr.report.bank.cash-salary', compact('employees'))->setPaper('a4');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");
    }
    public function cashSalaryExcel()
    {
        return Excel::download(new CashSalaryReportExcel(), md5(rand().time()).'.xlsx','Xlsx');

    }

    public function bonusTransferPdf()
    {
        $employees = Employee::where('account_no', '!=', Null)->where('status', 1)->get();
        $pdf = PDF::loadview('admin.hr.report.bank.bonus-transfer-sheet', compact('employees'))->setPaper('a4');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");
    }

    public function bonusTransferExcel()
    {
        return Excel::download(new BonusTransferReportExcel(), md5(rand().time()).'.xlsx','Xlsx');

    }
}
