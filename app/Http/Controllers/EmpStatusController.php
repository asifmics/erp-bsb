<?php

namespace App\Http\Controllers;

use App\EmpStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EmpStatusController extends Controller
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
        $statuss = EmpStatus::where('status',1)->get();
        return view('admin.hr.emp_status.all', compact('statuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hr.emp_status.create');
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

        $paytype = new EmpStatus;
        $paytype->name = $request->name;
        $paytype->save();

        return redirect()->route('all_emp_status');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function show(EmpStatus $empStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = EmpStatus::findOrFail($id);
        return view('admin.hr.emp_status.create', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $paytype = EmpStatus::findOrFail($request->id);
        $paytype->name = $request->name;
        $paytype->save();

        return redirect()->route('all_emp_status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EmpStatus $empStatus)
    {
        $empStatus = $empStatus->findOrFail($request->modal_id);
        $empStatus->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function softdelete(Request $request, EmpStatus $empStatus)
    {
        $empStatus = $empStatus->findOrFail($request->modal_id);
        $empStatus->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request, EmpStatus $empStatus)
    {
        $empStatus = $empStatus->findOrFail($request->modal_id);
        $empStatus->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

}
