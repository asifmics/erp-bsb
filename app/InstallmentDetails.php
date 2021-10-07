<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstallmentDetails extends Model
{
    protected $fillable =['status'];

    public function loan()
    {
       return $this->belongsTo('App\LoanDetails', 'loan_id');
    }
}
