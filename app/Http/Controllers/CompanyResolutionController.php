<?php

namespace App\Http\Controllers;

use App\CompanyResolution;
use Illuminate\Http\Request;
use Str;
use Carbon\Carbon;
class CompanyResolutionController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $resolutions = CompanyResolution::where('status',1)->get();
        return view('admin.company_resolution.all', compact('resolutions'));
    }

    public function create() {
        return view('admin.company_resolution.create');
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'title' => 'required',
            'pdf_file' => 'required',
        ]);

        $resolution = new CompanyResolution;
        $resolution->title =$request->title;
        $pdf =$request->pdf_file;
        $pdf_name= 'resolution_'.Str::random(8).'.'.$pdf->getClientOriginalExtension();
        $pdf->move('uploads/resolution/' , $pdf_name);
        $resolution->pdf_file = 'uploads/resolution/'.$pdf_name;
        $resolution->save();
        return redirect()->route('resolutions');
    }
    public function edit( $id ) {
        $resolution = CompanyResolution::find($id);
        return view('admin.company_resolution.create', compact('resolution'));
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
        $resolution = CompanyResolution::find($request->id);
        $resolution->title =$request->title;
        $pdf =$request->pdf_file;
        if($pdf){
            $pdf_name= 'resolution_'.Str::random(8).'.'.$pdf->getClientOriginalExtension();
            $pdf->move('uploads/resolution/' , $pdf_name);
            $resolution->pdf_file = 'uploads/resolution/'.$pdf_name;
            $resolution->save();
        }else{
            $resolution->save();
        }
        return redirect()->route('resolutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Holiday $holiday ) {
        $holiday = $holiday->findOrFail($request->modal_id);
        $holiday->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, CompanyResolution $resolution )
    {
        $resolution = $resolution->findOrFail($request->modal_id);
        $resolution->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Holiday $holiday )
    {
        $holiday = $holiday->findOrFail($request->modal_id);
        $holiday->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
