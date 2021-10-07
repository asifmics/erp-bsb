<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\UniversityProgram;
use Carbon\Carbon;
use Session;
use Image;

class UniversityProgramController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=UniversityProgram::where('status',1)->orderBy('name','ASC')->get();
        return view('admin.university.program.all',compact('all'));
    }

    public function add(){
        return view('admin.university.program.add');
    }

    public function edit($slug){
        $data=UniversityProgram::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.university.program.edit',compact('data'));
    }

    public function view($slug){
        $data=UniversityProgram::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.university.program.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
          'name'=>'required|max:190',
          'cate'=>'required',
      ],[
          'name.required'=>'Please enter university name!',
          'cate.required'=>'Please select program category!',
      ]);
      $slug='PC'.uniqid('20');
      $insert=UniversityProgram::insertGetId([
          'name'=>$request['name'],
          'category'=>$request['cate'],
          'duration'=>$request['duration'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
          Session::flash('success','value');
          return redirect('dashboard/university/program/add');
      }else{
          Session::flash('error','value');
          return redirect('dashboard/university/program/add');
      }
    }

    public function update(Request $request){
      $this->validate($request,[
          'name'=>'required|max:190',
          'cate'=>'required',
      ],[
          'name.required'=>'Please enter university name!',
          'cate.required'=>'Please select program category!',
      ]);
      $id=$request['id'];
      $slug=$request['slug'];
      $insert=UniversityProgram::where('id',$id)->update([
          'name'=>$request['name'],
          'category'=>$request['cate'],
          'duration'=>$request['duration'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
          Session::flash('success','value');
          return redirect('dashboard/university/program/view/'.$slug);
      }else{
          Session::flash('error','value');
          return redirect('dashboard/university/program/edit/'.$slug);
      }
    }
}
