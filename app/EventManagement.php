<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventManagement extends Model
{
    protected $fillable =['title','cost','description','image','slug','remarks','date_to','date_from','status'];

    public function getImageNameAttribute()
    {
$image = $this->image;
    return explode(',', $image);
    }
}
