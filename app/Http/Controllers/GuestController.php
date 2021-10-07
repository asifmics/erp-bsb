<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    }

    public function add(){
        return view('admin.guest.main.add');
    }

    public function edit($slug){

    }

    public function view($slug){

    }

    public function insert(Request $request){

    }

    public function update(Request $request){

    }

    public function softdelete(){

    }
}
