<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMoneyReceiptDetails extends Model
{
    public function details()
    {
        return $this->belongsTo('App\StudentRequsitionDetails','requsition_details_id');
    }
}
