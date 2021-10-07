<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model
{
    protected $fillable = ['status','paid_amount'];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function installments()
    {
        return $this->hasMany('App\InstallmentDetails', 'loan_id');
    }
}
