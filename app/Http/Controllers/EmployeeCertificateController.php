<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use PDF;
class EmployeeCertificateController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function taxdwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.tax', $data );
        return $pdf->download('tax_certificate'.uniqid(5).'.pdf');
    }

    public function taxpdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.tax', $data);
        return $pdf->stream();
    }
    public function experiancedwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.experiance', $data);
        return $pdf->download('experiance_certificate'.uniqid(5).'.pdf');
    }

    public function experiancepdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.experiance', $data);
        return $pdf->stream();
    }
    public function salarydwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.salary', $data);
        return $pdf->download('salary_certificate'.uniqid(5).'.pdf');
    }

    public function salarypdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.salary', $data);
        return $pdf->stream();
    }
    public function payslipdwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.payslip', $data);
        return $pdf->download('payslip_certificate'.uniqid(5).'.pdf');
    }

    public function payslippdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.payslip', $data);
        return $pdf->stream();
    }
    public function attendancedwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.attendance', $data);
        return $pdf->download('Attendance_Report'.uniqid(5).'.pdf');
    }

    public function attendancepdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.attendance', $data);
        return $pdf->stream();
    }
    public function infodwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.information', $data)->setPaper('a4', 'landscape');
        return $pdf->download('Employee Information'.uniqid(5).'.pdf');
    }

    public function infopdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.information', $data);
        return $pdf->stream();
    }
    public function inclodwn($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.increment_letter', $data)->setPaper('a4', 'landscape');
        return $pdf->download('Increment Letter'.uniqid(5).'.pdf');
    }

    public function inclpdf($slug)
    {
        $data=['data'=>Employee::where('slug',$slug)->first()];
        $pdf = PDF::loadView('admin.hr.emp_certificate.increment_letter', $data);
        return $pdf->stream();
    }



}
