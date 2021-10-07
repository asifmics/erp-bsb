<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientSatisfactionResponse extends Model
{
    public function question()
    {
        return $this->belongsTo('App\ClientSatisfactionQuestion', 'question_id');
    }
}
