<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class HolidayController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $holiday = Holiday::where('status',1)->get();
        return view('admin.hr.holiday.all', compact('holiday'));
    }

    public function create() {
        return view('admin.hr.holiday.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'reason' => 'required',
            'date' => 'required',
        ]);
        $date =date('Y-m-d', strtotime($request->date));
        $slug = strtolower('Holiday-' . Str::random(8) . '-' . Str::random(8));

        $holiday = new Holiday;
        $holiday->reason = $request->reason;
        $holiday->slug = $slug;
        $holiday->date = $date;
        $holiday->description = $request->description;
        $holiday->save();
        return redirect()->route('all_holiday');
    }
    public function edit( $id ) {
        $holiday = Holiday::find($id);
        return view('admin.hr.holiday.create', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
        public function update( Request $request, Holiday $holiday )
        {
            $validatedData = $request->validate([
                'reason' => 'required',
                'date' => 'required',
            ]);

            $holiday = Holiday::find($request->id);
            $holiday->reason = $request->reason;
            $holiday->date = $request->date;
            $holiday->description = $request->description;
            $holiday->save();
            return redirect()->route('all_holiday');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
        public function destroy( Request $request, Holiday $holiday )
        {
            $holiday = $holiday->findOrFail($request->modal_id);
            $holiday->delete();
            return redirect()->back()->with('success', 'Deleted Successfully');
        }

        public function softdelete(Request $request, Holiday $holiday )
        {
            $holiday = $holiday->findOrFail($request->modal_id);
            $holiday->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
            return redirect()->back()->with('success', 'Deleted Successfully');
        }
        public function restore(Request $request, Holiday $holiday )
        {
            $holiday = $holiday->findOrFail($request->modal_id);
            $holiday->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
            return redirect()->back()->with('success', 'Restored Successfully');
        }
}
