<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{

    protected $fillable =['employee_id','branch_id','date','in_time','out_time','attendanc','leave','type','status'];

    public function employee(){
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
