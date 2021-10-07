<?php

namespace App\Http\Controllers;

use App\Complain;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ComplainController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {

        $complain =Complain::where('status',1)->get();
        return view('admin.complain.all',compact('complain'));
    }

    public function view($id)
    {
        $complain =Complain::find($id);
        return view('admin.complain.view',compact('complain'));
    }
    public function solve($id)
    {
        Complain::find($id)->update(['c_status' => 'Solve','updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with(['alert-type' => 'success', 'messege' =>'Successfully solve complain']);
    }
    public function pending($id)
    {
        Complain::find($id)->update(['c_status' => 'Pending','updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with(['alert-type' => 'warning', 'messege' =>'Successfully Pending complain']);
    }
}
