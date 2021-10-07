<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $fillable =['status'];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
