<?php
/**
 * Created by IntelliJ IDEA.
 * User: Asif
 * Date: 1/15/2021
 * Time: 12:07 PM
 */

namespace App\ExcelReports;
use App\InternationalAdmission;
use App\InternationalAgent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class InternationalAdmissionExcelReport implements FromView
{
    public function view(): View
    {
        return view('admin.client_satisfaction.international-admission.excel.admission-excel-view', [
            'admissions' => InternationalAdmission::all()
        ]);
    }

}
