<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class DepartmentController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $departments = Department::where('status',1)->get();
        return view( 'admin.hr.department.all', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.hr.department.create' );
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

        $slug = strtolower('dept-' . Str::random(8) . '-' . Str::random(8));

        $department = new Department;
        $department->name = $request->name;
        $department->slug = $slug;
        $department->save();
        return redirect()->route('all_department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show( Department $department ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug ) {
        $department = Department::whereSlug($slug)->firstOrFail();
        return view('admin.hr.department.create', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Department $department ) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);


        $department = Department::whereSlug($request->slug)->firstOrFail();
        $department->name = $request->name;
        $department->save();
        return redirect()->route('all_department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Department $department ) {
        $department = $department->findOrFail($request->modal_id);
        $department->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Department $department )
    {
        $department = $department->findOrFail($request->modal_id);
        $department->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Department $department )
    {
        $department = $department->findOrFail($request->modal_id);
        $department->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
