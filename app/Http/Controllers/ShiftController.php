<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ShiftController extends Controller
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
        $shifts = Shift::where('status',1)->get();
        return view('admin.hr.shift.all', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hr.shift.create');
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
            'start' => 'required',
            'end' => 'required',
            'type' => 'required',
        ]);

        $shift = new Shift;
        $shift->name = $request->name;
        $shift->start = $request->start;
        $shift->end = $request->end;
        $shift->type = $request->type;
        $shift->save();

        return redirect()->route('all_shift');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        return view('admin.hr.shift.create', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'type' => 'required',
        ]);

        $shift = Shift::findOrFail($request->id);
        $shift->name = $request->name;
        $shift->start = $request->start;
        $shift->end = $request->end;
        $shift->type = $request->type;
        $shift->save();

        return redirect()->route('all_shift');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Shift $shift)
    {
        $shift = $shift->findOrFail($request->modal_id);
        $shift->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function softdelete(Request $request, Shift $shift)
    {
        $shift = $shift->findOrFail($request->modal_id);
        $shift->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function restore(Request $request, Shift $shift)
    {
        $shift = $shift->findOrFail($request->modal_id);
        $shift->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
