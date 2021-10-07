<?php

namespace App\Http\Controllers;

use App\LoanDetails;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
class LoanDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index() {
        $loan = LoanDetails::where('status',1)->get();
        return view('admin.loan_managment.loan_details.all', compact('loan'));
    }
    public function create() {
        return view('admin.loan_managment.loan_details.create');
    }
    /**
     * @param $slug
     */
    public function store( Request $request ) {

        $validatedData = $request->validate([
            'employee_id' => 'required',
            'loan_amount' => 'required',
        ]);

        $slug = strtolower('loan_' . Str::random(8) . '-' . Str::random(8));
        $date = Carbon::parse($request->loan_taken_date)->format('Y-m-d');
        $loan = new LoanDetails;
        $loan->employee_id = $request->employee_id;
        $loan->loan_amount = $request->loan_amount;
        $loan->loan_taken_date = $date;
        $loan->duration = $request->duration;
        $loan->monthly_installment = $request->monthly_installment;
        $loan->given_installment = $request->given_installment;
        $loan->slug = $slug;
        $loan->save();
        return redirect()->route('all_loan')->with(['alert-type' => 'success','messege'=>'loan Created Successfully']);

    }
    public function edit( $id ) {

        $loan = LoanDetails::find($id);
        return view('admin.loan_managment.loan_details.create', compact('loan'));
    }
    public function view( $id ) {
        $loan = LoanDetails::find($id);
        return view('admin.loan_managment.loan_details.view', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, LoanDetails $loan ) {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'loan_amount' => 'required',
        ]);
        $date = Carbon::parse($request->loan_taken_date)->format('Y-m-d');
        $loan = LoanDetails::find($request->id);
        $loan->employee_id = $request->employee_id;
        $loan->loan_amount = $request->loan_amount;
        $loan->loan_taken_date = $date;
        $loan->duration = $request->duration;
        $loan->monthly_installment = $request->monthly_installment;
        $loan->given_installment = $request->given_installment;
        $loan->save();
        return redirect()->route('all_loan')->with(['alert-type' => 'success','messege'=>'Event Update Successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, LoanDetails $loan ) {
        $loan = $loan->findOrFail($id);
        $loan->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, LoanDetails $loan )
    {
        $loan = $loan->findOrFail($request->modal_id);
        $loan->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, LoanDetails $loan )
    {
        $loan = $loan->findOrFail($request->modal_id);
        $loan->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
