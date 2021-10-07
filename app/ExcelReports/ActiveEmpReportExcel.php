<?php
/**
 * Created by IntelliJ IDEA.
 * User: Asif
 * Date: 1/15/2021
 * Time: 12:07 PM
 */

namespace App\ExcelReports;
use App\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ActiveEmpReportExcel implements FromView
{
    public function view(): View
    {
        return view('admin.hr.report.employee.excel.active-employee', [
            'employees' =>  Employee::where('emp_status', 1)->where('status', 1)->get()
        ]);
    }

}
