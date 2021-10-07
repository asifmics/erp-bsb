<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    public function client()
    {
        return $this->hasMany('App\ClientSatisfactionResponse', 'client_details_id');
    }
}
