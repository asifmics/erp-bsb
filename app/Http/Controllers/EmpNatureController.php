<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmpNature;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EmpNatureController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $natures = EmpNature::where('status',1)->get();
        return view('admin.hr.emp_nature.all', compact('natures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hr.emp_nature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $nature = new EmpNature;
        $nature->name = $request->name;
        $nature->save();

        return redirect()->route('all_emp_nature');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpNature  $empNature
     * @return \Illuminate\Http\Response
     */
    public function show(EmpNature $empNature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpNature  $empNature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nature = EmpNature::findOrFail($id);
        return view('admin.hr.emp_nature.create', compact('nature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpNature  $empNature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $nature = EmpNature::findOrFail($request->id);
        $nature->name = $request->name;
        $nature->save();

        return redirect()->route('all_emp_nature');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpNature  $empNature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EmpNature $empNature)
    {
        $empNature = $empNature->findOrFail($request->modal_id);
        $empNature->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function softdelete(Request $request, EmpNature $empNature)
    {
        $empNature = $empNature->findOrFail($request->modal_id);
        $empNature->update(['status' => 0, 'updated_at'=> \Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request, EmpNature $empNature)
    {
        $empNature = $empNature->findOrFail($request->modal_id);
        $empNature->update(['status' => 1, 'updated_at'=> \Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
