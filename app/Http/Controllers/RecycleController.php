<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Department;
use App\Employee;
use App\EmpNature;
use App\EmpStatus;
use App\PayType;
use App\SalaryScale;
use App\Shift;
use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        return view('admin.recycle.all');
    }
    public function branch()
    {
        $branches = Branch::where('status', 0)->get();
        return view('admin.recycle.hr.branch',compact('branches'));
    }
    public function department()
    {
        $departments = Department::where('status', 0)->get();
        return view('admin.recycle.hr.department',compact('departments'));
    }
    public function employee()
    {
        $employees = Employee::where('status', 0)->get();
        return view('admin.recycle.hr.employee',compact('employees'));
    }
    public function nature()
    {
        $natures = EmpNature::where('status', 0)->get();
        return view('admin.recycle.hr.nature',compact('natures'));
    }
    public function paytype()
    {
        $paytypes = PayType::where('status', 0)->get();
        return view('admin.recycle.hr.paytype',compact('paytypes'));
    }
    public function salaryscale()
    {
        $salaryscales = SalaryScale::where('status', 0)->get();
        return view('admin.recycle.hr.salaryscale',compact('salaryscales'));
    }
    public function shift()
    {
        $shiptes = Shift::where('status', 0)->get();
        return view('admin.recycle.hr.shipt',compact('shiptes'));
    }
    public function status()
    {
        $status = EmpStatus::where('status', 0)->get();
        return view('admin.recycle.hr.status',compact('status'));
    }

}
