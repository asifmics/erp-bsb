<?php

namespace App\Http\Controllers;

use App\EventManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
class EventManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index() {
        $event = EventManagement::where('status',1)->get();
        return view('admin.event.all', compact('event'));
    }
    public function create() {
        return view('admin.event.create');
    }
    /**
     * @param $slug
     */
    public function store( Request $request ) {

        $validatedData = $request->validate([
            'title' => 'required',
            'date_to' => 'required',
            'date_from' => 'required',
        ]);

        $slug = strtolower('event_' . Str::random(8) . '-' . Str::random(8));
        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->format('Y-m-d');
        $event = new EventManagement;
        $event->title = $request->title;
        $event->date_from = $start;
        $event->date_to = $end;
        $event->description = $request->description;
        $event->remarks = $request->remarks;
        $event->cost = $request->cost;
        $event->slug = $slug;
        $images = $request->image;
        if($images){

         foreach($images as $image){
            $image_name= 'event_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/event/'.$image_name);
            $image_data[]='uploads/event/'.$image_name;
         }
        }
        $imageN =implode(',',$image_data);
        $event->image = $imageN;
        $event->save();
        return redirect()->route('all_event')->with(['alert-type' => 'success','messege'=>'Event Created Successfully']);

    }
    public function edit( $id ) {

        $event = EventManagement::find($id);
        return view('admin.event.create', compact('event'));
    }
    public function view( $id ) {
        $event = EventManagement::find($id);
        return view('admin.event.view', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, EventManagement $event ) {
        $validatedData = $request->validate([
            'title' => 'required',
            'date_to' => 'required',
            'date_from' => 'required',
        ]);
        $start = Carbon::parse($request->date_from)->format('Y-m-d');
        $end = Carbon::parse($request->date_to)->format('Y-m-d');
        $event = EventManagement::find($request->id);
        $event->title = $request->title;
        $event->date_from = $start;
        $event->date_to = $end;
        $event->description = $request->description;
        $event->remarks = $request->remarks;
        $event->cost = $request->cost;
        $images = $request->image;
        if($images){
         foreach($images as $image){
            $image_name= 'event_'.Str::random(8).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/event/'.$image_name);
            $image_data[]='uploads/event/'.$image_name;
         }
         $imageN =implode(',',$image_data);
         $event->image = $imageN;
        }
        $event->save();
        return redirect()->route('all_event')->with(['alert-type' => 'success','messege'=>'Event Update Successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, EventManagement $event ) {
        $event = $event->findOrFail($id);
        $event->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, EventManagement $event )
    {
        $event = $event->findOrFail($request->modal_id);
        $event->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, EventManagement $event )
    {
        $event = $event->findOrFail($request->modal_id);
        $event->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
