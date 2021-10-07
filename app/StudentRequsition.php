<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRequsition extends Model
{

    public function mainrequsition()
    {
       return $this->belongsTo('App\StudentRequsition','parent_id','id');
    }
    public function details()
    {
        return $this->hasOne('App\StudentRequsitionDetails','requsition_id');
    }

    public function glaccount()
    {
       return $this->belongsTo('App\GlAccount','gl_account_id');
    }

    public function creditglaccount()
    {
       return $this->belongsTo('App\GlAccount','credit_gl_account_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
