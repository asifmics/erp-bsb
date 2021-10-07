<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMoneyReceipt extends Model
{
    public function items()
    {
        return $this->hasMany('App\StudentMoneyReceiptDetails','money_receipt_id');
    }
  public function student()
  {
      return $this->belongsTo('App\Student');
  }
}
