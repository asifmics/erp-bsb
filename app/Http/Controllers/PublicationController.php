<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Image;
use Str;
use Carbon\Carbon;
class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index() {
        $publications = Publication::where('status',1)->get();
        return view('admin.publication.all', compact('publications'));
    }
    public function create() {
        return view('admin.publication.create');
    }
    /**
     * @param $slug
     */
    public function store(Request $request ) {

    // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $slug = strtolower('ads_' . Str::random(8) . '-' . Str::random(8));
        $ads = new Publication();
        $ads->title = $request->title;
        // $ads->description = $request->description;
        $ads->remarks = $request->remarks;
        $ads->cost = $request->cost;
        $ads->qty = $request->qty;
        $ads->slug = $slug;
        $images = $request->image;
        if($images){

         foreach($images as $image){
            $image_name= 'Publication_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/publication/'.$image_name);
            $image_data[]='uploads/publication/'.$image_name;
         }
        }
        $imageN =implode(',',$image_data);
        $ads->image = $imageN;
        $ads->save();
        return redirect()->route('all_publication')->with(['alert-type' => 'success','messege'=>'Publication Created Successfully']);

    }
    public function edit( $id ) {

        $publication = Publication::find($id);
        return view('admin.publication.create', compact('publication'));
    }
    public function view( $id ) {
        $publication = Publication::find($id);
        return view('admin.publication.view', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $ads = Publication::find($request->id);
        $ads->title = $request->title;
        $ads->remarks = $request->remarks;
        $ads->cost = $request->cost;
        $ads->qty = $request->qty;
        $images = $request->image;
        if($images){
         foreach($images as $image){
            $image_name= 'Publication_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/publication/'.$image_name);
            $image_data[]='uploads/publication/'.$image_name;
         }
         $imageN =implode(',',$image_data);
         $ads->image = $imageN;
        }

        $ads->save();
        return redirect()->route('all_publication')->with(['alert-type' => 'success','messege'=>'Event Update Successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, Publication $ads ) {
        $ads = $ads->findOrFail($id);
        $ads->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Publication $ads )
    {
        $ads = $ads->findOrFail($request->modal_id);
        $ads->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Publication $ads )
    {
        $ads = $ads->findOrFail($request->modal_id);
        $ads->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
