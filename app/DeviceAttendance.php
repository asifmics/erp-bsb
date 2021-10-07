<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceAttendance extends Model
{
    protected $fillable = ['device_name','employeeId','date','inOut','active','slug'];
}
