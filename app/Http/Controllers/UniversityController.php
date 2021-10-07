<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\University;
use App\UniversityWiseProgram;
use Carbon\Carbon;
use Session;
use Image;

class UniversityController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=University::where('status',1)->orderBy('name','ASC')->get();
        return view('admin.university.main.all',compact('all'));
    }

    public function add(){
        return view('admin.university.main.add');
    }

    public function edit($slug){
        $data=University::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.university.main.edit',compact('data'));
    }

    public function view($slug){
        $data=University::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.university.main.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
          'name'=>'required|max:190',
          'country'=>'required',
      ],[
          'name.required'=>'Please enter university name!',
          'country.required'=>'Please select country!',
      ]);
      $slug='U'.uniqid('20');
      $insert=University::insertGetId([
          'name'=>$request['name'],
          'country'=>$request['country'],
          'rank'=>$request['rank'],
          'details'=>$request['details'],
          'address'=>$request['address'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName='university_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(100,70)->save('uploads/university/'.$imageName);

        University::where('id',$insert)->update([
            'image'=>$imageName
        ]);
      }

      if($insert){
          Session::flash('success','value');
          return redirect('dashboard/university/add');
      }else{
          Session::flash('error','value');
          return redirect('dashboard/university/add');
      }
    }

    public function update(Request $request){
      $this->validate($request,[
          'name'=>'required|max:190',
          'country'=>'required',
      ],[
          'name.required'=>'Please enter university name!',
          'country.required'=>'Please select country!',
      ]);
      $id=$request['id'];
      $slug=$request['slug'];
      $update=University::where('id',$id)->update([
          'name'=>$request['name'],
          'country'=>$request['country'],
          'rank'=>$request['rank'],
          'details'=>$request['details'],
          'address'=>$request['address'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName='university_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(150,100)->save('uploads/university/'.$imageName);

        University::where('id',$id)->update([
            'image'=>$imageName
        ]);
      }

      if($update){
          Session::flash('success','value');
          return redirect('dashboard/university/view/'.$slug);
      }else{
          Session::flash('error','value');
          return redirect('dashboard/university/edit/'.$slug);
      }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=University::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/university');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/university');
        }
    }

    public function uniprogram(Request $request){
        $this->validate($request,[
            'cate' => 'required',
            'program' => 'required',
            'duration' =>'required'
        ],[

        ]);

        $id=$request['id'];
        $slug=$request['slug'];

        $insert=UniversityWiseProgram::insert([
            'university'=>$id,
            'category'=>$request['cate'],
            'program'=>$request['program'],
            'duration'=>$request['duration'],
            'tution_fees'=>$request['tution_fees'],
            'total_tution_fees'=>$request['total_tution_fees'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success');
            return redirect('dashboard/university/view/'.$slug);
        }
    }
}
