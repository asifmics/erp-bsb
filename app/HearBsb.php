<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HearBsb extends Model
{
    public function students()
    {
       return $this->hasMany(Student::class, 'hear_bsb_id');
    }
}
