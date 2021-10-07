<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{

  public function loan()
  {
      return view('admin.application.loan.create');
  }
  public function leave()
  {
      return view('admin.application.leave.create');
  }

}
