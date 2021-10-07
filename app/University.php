<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class University extends Model{

    protected $fillable  = ['name','country','rank','details','address','image','slug','status','created_by','updated_by'];

    public function setCreatedByAttribute()
    {
        dd($this->created_by);
        if($this->created_by == null){
            $this->attributes['created_by'] = 1;
        }else{
            //
        }
    }
    public function setUpdatedByAttribute()
    {
            $this->attributes['updated_by'] = '1';

    }
    public function countryName(){
        return $this->belongsTo('App\Country','country','id');
    }


}
