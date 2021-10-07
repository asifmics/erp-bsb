<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Termination;
class TerminationController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $termination = Termination::where('status',1)->get();
        return view('admin.hr.termination.all', compact('termination'));
    }

    public function create() {
        return view('admin.hr.termination.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'reason' => 'required',

        ]);
// dd($request->all());
        $slug = strtolower('termination-' . Str::random(8) . '-' . Str::random(8));

        $termination = new Termination;
        $termination->reason = $request->reason;
        $termination->slug = $slug;
        $termination->branch_id = $request->branch_id;
        $termination->employee_id = $request->employee_id;
        $termination->notice_date = $request->notice_date;
        $termination->termination_date = $request->termination_date;
        $termination->description = $request->description;
        $termination->save();
        return redirect()->route('all_termination');
    }
    public function edit( $id ) {
        $termination = Termination::find($id);
        return view('admin.hr.termination.create', compact('termination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Termination $termination ) {
        $validatedData = $request->validate([
            'termination_for' => 'required',
        ]);

        $termination = Termination::find($request->id);
        $termination->reason = $request->reason;
        $termination->branch_id = $request->branch_id;
        $termination->employee_id = $request->employee_id;
        $termination->notice_date = $request->notice_date;
        $termination->termination_date = $request->termination_date;
        $termination->description = $request->description;
        $termination->save();
        return redirect()->route('all_termination');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Termination $termination ) {
        $termination = $termination->findOrFail($request->modal_id);
        $termination->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Termination $termination )
    {
        $termination = $termination->findOrFail($request->modal_id);
        $termination->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Termination $termination )
    {
        $termination = $termination->findOrFail($request->modal_id);
        $termination->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
