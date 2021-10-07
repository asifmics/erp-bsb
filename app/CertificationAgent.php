<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificationAgent extends Model
{
    protected $fillable = [
        'name', 'slug', 'status'
    ];
}
