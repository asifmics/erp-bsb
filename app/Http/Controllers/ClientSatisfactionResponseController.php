<?php

namespace App\Http\Controllers;

use App\ClientDetails;
use App\ClientSatisfactionResponse;
use Illuminate\Http\Request;

class ClientsatisfactionResponseController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        
        $client =ClientDetails::where('status',1)->get();
        return view('admin.client_satisfaction.survey.all',compact('client'));
    }

    public function view($id)
    {

        $client =ClientDetails::find($id);
        return view('admin.client_satisfaction.survey.view',compact('client'));
    }
}
