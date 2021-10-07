<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    protected $table = "deposits";

    public function bank_account(){
        return $this->belongsTo('App\BankAccount', 'bank_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'created_by')->withDefault();
    }
    public function updator(){
        return $this->belongsTo('App\User', 'updated_by')->withDefault();
    }

    public function details(){
        return $this->hasMany('App\DepositDetail', 'deposit_id');
    }
}
