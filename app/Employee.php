<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function salary_scale_details(){
        return $this->belongsTo('App\SalaryScale', 'salary_scale')->withDefault();
    }
    public function shift(){
        return $this->belongsTo('App\Shift', 'shift_id');
    }
    public function designation(){
        return $this->belongsTo('App\Designation', 'designation_id');
    }
    public function branch_details(){
        return $this->belongsTo('App\Branch', 'branch')->withDefault();
    }
    public function provident(){
        return $this->hasOne('App\ProvidentFund', 'employee_id');
    }
    public function academics(){
        return $this->hasMany('App\Academic', 'employee_id');
    }
    public function loans(){
        return $this->hasMany('App\LoanDetails', 'employee_id');
    }
    public function trainings(){
        return $this->hasMany('App\Training', 'employee_id');
    }
    public function experience(){
        return $this->hasMany('App\Experience', 'employee_id');
    }
    public function advance_salary(){
        return $this->hasMany('App\AdvanceSalary', 'employee_id');
    }
    public function salary_details(){
        return $this->hasMany('App\SalaryDetails', 'employee_id');
    }
    public function department_details(){
        return $this->belongsTo('App\Department', 'department')->withDefault();
    }
    public function employee_status(){
        return $this->belongsTo('App\EmpStatus', 'emp_status');
    }
    public function designation_details(){
        return $this->belongsTo('App\Designation', 'designation_id')->withDefault();
    }
    public function attendances(){
        return $this->hasMany('App\EmployeeAttendance', 'employee_id');
    }
    public function cunsel()
    {
       return $this->hasOne('App\CounsellorGenerate', 'counsellor_id');
    }
    protected $fillable =['status'];
    
}
