<?php

namespace App\Http\Controllers;

use App\Resignation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ResignationController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $resignation = Resignation::where('status',1)->get();
        return view('admin.hr.resignation.all', compact('resignation'));
    }

    public function create() {
        return view('admin.hr.resignation.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'resignation_for' => 'required',

        ]);
// dd($request->all());
        $slug = strtolower('resignation-' . Str::random(8) . '-' . Str::random(8));

        $resignation = new Resignation;
        $resignation->resignation_for = $request->resignation_for;
        $resignation->branch_id = $request->branch_id;
        $resignation->employee_id = $request->employee_id;
        $resignation->notice_date = $request->notice_date;
        $resignation->resignation_date = $request->resignation_date;
        $resignation->reason = $request->reason;
        $resignation->save();
        return redirect()->route('all_resignation');
    }
    public function edit( $id ) {
        $resignation = Resignation::find($id);
        return view('admin.hr.resignation.create', compact('resignation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Resignation $resignation ) {
        $validatedData = $request->validate([
            'resignation_for' => 'required',
        ]);

        $resignation = Resignation::find($request->id);
        $resignation->resignation_for = $request->resignation_for;
        $resignation->branch_id = $request->branch_id;
        $resignation->employee_id = $request->employee_id;
        $resignation->notice_date = $request->notice_date;
        $resignation->resignation_date = $request->resignation_date;
        $resignation->reason = $request->reason;
        $resignation->save();
        return redirect()->route('all_resignation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Resignation $resignation ) {
        $resignation = $resignation->findOrFail($request->modal_id);
        $resignation->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Resignation $resignation )
    {
        $resignation = $resignation->findOrFail($request->modal_id);
        $resignation->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Resignation $resignation )
    {
        $resignation = $resignation->findOrFail($request->modal_id);
        $resignation->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
