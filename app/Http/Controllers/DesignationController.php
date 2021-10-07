<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Designation;
class DesignationController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $designations = Designation::where('status',1)->get();
        return view( 'admin.hr.designation.all', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.hr.designation.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $slug = strtolower('desg-' . Str::random(8) . '-' . Str::random(8));

        $designation = new Designation;
        $designation->name = $request->name;
        $designation->slug = $slug;
        $designation->save();
        return redirect()->route('all_designation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::find($id);
        return view('admin.hr.designation.create', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Designation $designation ) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);


        $designation = Designation::whereSlug($request->slug)->firstOrFail();
        $designation->name = $request->name;
        $designation->save();
        return redirect()->route('all_designation');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Designation $designation ) {
        $designation = $designation->findOrFail($request->modal_id);
        $designation->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Designation $designation )
    {
        $designation = $designation->findOrFail($request->modal_id);
        $designation->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Designation $designation )
    {
        $designation = $designation->findOrFail($request->modal_id);
        $designation->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
