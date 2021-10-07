<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    protected $fillable =['status', 'approved'];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
