<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRequsitionDetails extends Model
{
    public function item()
    {
      return $this->hasOne('App\StudentRequsition','id','requsition_id');
    }
}
