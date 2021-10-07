<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\UniversityProgramCategory;
use Carbon\Carbon;
use Session;
use Image;

class UniversityProgramCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=UniversityProgramCategory::where('status',1)->orderBy('name','ASC')->get();
        return view('admin.university.category.all',compact('all'));
    }

    public function add(){
        return view('admin.university.category.add');
    }

    public function edit($slug){
        $data=UniversityProgramCategory::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.university.category.edit',compact('data'));
    }

    public function view($slug){
        $data=UniversityProgramCategory::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.university.category.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
          'name'=>'required|max:150|unique:university_program_categories,name',
      ],[
          'name.required'=>'Please enter university program category name!',
      ]);
      $slug=Str::slug($request['name'],'-');
      $insert=UniversityProgramCategory::insertGetId([
          'name'=>$request['name'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
          Session::flash('success','value');
          return redirect('dashboard/university/program/category');
      }else{
          Session::flash('error','value');
          return redirect('dashboard/university/program/category');
      }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required|max:150',
        ],[
            'name.required'=>'Please enter university program category name!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=UniversityProgramCategory::where('id',$id)->update([
            'name'=>$request['name'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/university/program/category/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/university/program/category/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=UniversityProgramCategory::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/university/program/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/university/program/category');
        }
    }
}
