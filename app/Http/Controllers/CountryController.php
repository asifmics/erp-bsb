<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Country;
use Carbon\Carbon;
use Session;
use Image;

class CountryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Country::where('status',1)->orderBy('name','ASC')->get();
        return view('admin.country.all',compact('all'));
    }

    public function add(){
        return view('admin.country.add');
    }

    public function edit($slug){
        $data=Country::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.country.edit',compact('data'));
    }

    public function view($slug){
        $data=Country::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.country.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|max:100|unique:countries,name',
        ],[
            'name.required'=>'Please enter country name!',
        ]);
        $slug=Str::slug($request['name'],'-');
        $insert=Country::insertGetId([
            'name'=>$request['name'],
            'reg_fees'=>$request['reg_fees'],
            'slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='country_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(100,70)->save('uploads/country/'.$imageName);

          Country::where('id',$insert)->update([
              'flag'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/country');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/country');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required|max:100',
        ],[
            'name.required'=>'Please enter country name!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=Country::where('id',$id)->update([
            'name'=>$request['name'],
            'reg_fees'=>$request['reg_fees'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='country_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(100,70)->save('uploads/country/'.$imageName);

          Country::where('id',$id)->update([
              'flag'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/country/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/country/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Country::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/country');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/country');
        }
    }

}
