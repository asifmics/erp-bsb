<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryDetails extends Model
{
    protected $fillable = ['employee_id', 'string_id', 'amount'];

    public function string_details(){
        return $this->belongsTo('\App\SalaryString', 'string_id')->withDefault();
    }
}
