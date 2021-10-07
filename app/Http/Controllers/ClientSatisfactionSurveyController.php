<?php

namespace App\Http\Controllers;

use App\ClientDetails;
use App\ClientSatisfactionResponse;
use App\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ClientSatisfactionSurveyController extends Controller
{

    public function create()
    {
        return view('admin.client_satisfaction.survey.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:client_details',
        ],[
            'email.unique'=> 'This email already complete survey',
        ]);
       $client = new ClientDetails;
       $client->name =$request->name;
       $client->email =$request->email;
       $client->phone =$request->phone;
       $client->save();
       $q_id =$request->question_id;
       foreach($q_id as $key => $id){
        $question = new ClientSatisfactionResponse;
        $question->client_details_id = $client->id;
        $question->question = $id;
        $question->answer = $request->answer[$key];
        $question->save();
       }
       return redirect()->back();
    }

    public function complaincreate()
    {
        return view('admin.complain.create');
    }
    public function complainstore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'details' =>'required',
        ]);
        $slug = strtolower('complain-' . Str::random(8) . '-' . Str::random(8));
       $complain = new Complain;
       $complain->name =$request->name;
       $complain->email =$request->email;
       $complain->subject =$request->subject;
       $complain->details =$request->details;
       $complain->slug =$slug;
       $complain->save();

       return redirect()->back();
    }
}
