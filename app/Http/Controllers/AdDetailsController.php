<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\AdDetails;
use Image;
class AdDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index() {
        $ads = AdDetails::where('status',1)->get();
        return view('admin.ad_details.all', compact('ads'));
    }
    public function create() {
        return view('admin.ad_details.create');
    }
    /**
     * @param $slug
     */
    public function store( Request $request ) {

        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $slug = strtolower('ads_' . Str::random(8) . '-' . Str::random(8));
        $ads = new AdDetails;
        $ads->title = $request->title;
        $ads->description = $request->description;
        $ads->remarks = $request->remarks;
        $ads->cost = $request->cost;
        $ads->slug = $slug;
        $images = $request->image;
        if($images){

         foreach($images as $image){
            $image_name= 'Ads_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/ads/'.$image_name);
            $image_data[]='uploads/ads/'.$image_name;
         }
        }
        $imageN =implode(',',$image_data);
        $ads->image = $imageN;
        $ads->save();
        return redirect()->route('all_ads')->with(['alert-type' => 'success','messege'=>'Ads Created Successfully']);

    }
    public function edit( $id ) {

        $ads = AdDetails::find($id);
        return view('admin.ad_details.create', compact('ads'));
    }
    public function view( $id ) {
        $ads = AdDetails::find($id);
        return view('admin.ad_details.view', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, AdDetails $event ) {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $ads = AdDetails::find($request->id);
        $ads->title = $request->title;
        $ads->description = $request->description;
        $ads->remarks = $request->remarks;
        $ads->cost = $request->cost;
        $images = $request->image;
        if($images){
         foreach($images as $image){
            $image_name= 'Ads_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/ads/'.$image_name);
            $image_data[]='uploads/ads/'.$image_name;
         }
         $imageN =implode(',',$image_data);
         $ads->image = $imageN;
        }

        $ads->save();
        return redirect()->route('all_ads')->with(['alert-type' => 'success','messege'=>'Event Update Successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, AdDetails $ads ) {
        $ads = $ads->findOrFail($id);
        $ads->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, AdDetails $ads )
    {
        $ads = $ads->findOrFail($request->modal_id);
        $ads->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, AdDetails $ads )
    {
        $ads = $ads->findOrFail($request->modal_id);
        $ads->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
