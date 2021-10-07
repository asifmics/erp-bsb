<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country', 'nationality');
    }
    public function documents()
    {
        return $this->hasMany('App\StudentDocument', 'student_id');
    }
    public function academics()
    {
        return $this->hasMany('App\StudentAcademic', 'student_id');
    }
    public function visas()
    {
        return $this->hasMany('App\StudentVisa', 'student_id');
    }
    public function logs()
    {
        return $this->hasMany('App\StudentLog', 'student_id');
    }
    public function file_status()
    {
        return $this->belongsTo('App\StudentStatus','file_transfer_status');
    }
    public function requsition()
    {
        return $this->hasMany('App\StudentRequsitionDetails','student_id');
    }
    public function interestcountry()
    {
        return $this->hasMany('App\StudentInterestCountry','student_id');
    }
    public function monyreceipt()
    {
        return $this->hasMany('App\StudentMoneyReceipt','student_id');
    }
    public function counsellorganerate()
    {
        return $this->belongsTo('App\Employee','counsellor')->withDefault();
    }
    public function agent()
    {
       return $this->belongsTo('App\Agent', 'ref_by');
    }






}
