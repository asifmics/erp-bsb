<?php

namespace App\Http\Controllers;

use App\Employee;
use App\SalaryScale;
use App\SalaryString;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
class SalaryScaleController extends Controller
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
        $salaries = SalaryScale::where('status',1)->get();
        $strings = SalaryString::all();
        return view('admin.hr.salary_scale.all', compact('salaries', 'strings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salaryString()
    {
        $strings = SalaryString::all();
        return view('admin.hr.salary_scale.string', compact('strings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSalaryString(Request $request)
    {

        $string = new SalaryString;
        $string->name = $request->name;
        $string->amount = $request->amount;
        $string->type = $request->type;
        $string->save();

        return redirect()->back()->with('success', 'Successfully Saved!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hr.salary_scale.create');
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
            'amount' => 'required',
        ]);

        $salary = new SalaryScale;
        $salary->name = $request->name;
        $salary->amount = $request->amount;
        $salary->save();

        return redirect()->route('all_salary_scale');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryScale $salaryScale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary = SalaryScale::findOrfail($id);
        return view('admin.hr.salary_scale.create', compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ]);

        $salary = SalaryScale::findOrFail($request->id);
        $salary->name = $request->name;
        $salary->amount = $request->amount;
        $salary->save();

        return redirect()->route('all_salary_scale');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalaryScale  $salaryScale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SalaryScale $salaryScale)
    {
        $salaryScale = $salaryScale->findOrFail($request->modal_id);
        $salaryScale->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function softdelete(Request $request, SalaryScale $salaryScale)
    {
        $salaryScale = $salaryScale->findOrFail($request->modal_id);
        $salaryScale->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function restore(Request $request, SalaryScale $salaryScale)
    {
        $salaryScale = $salaryScale->findOrFail($request->modal_id);
        $salaryScale->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
    public function salarysheet()
    {

        $data=['data'=>Employee::where('status',1)->get()];
        // return view('admin.hr.salary_sheet.salary_sheet', $data);
        $pdf = PDF::loadView('admin.hr.salary_sheet.salary_sheet', $data)->setPaper('legal', 'landscape');
        return $pdf->stream();

        // $data = Employee::where('status',1)->get();
        // return view('admin.hr.salary_sheet.salary_sheet',compact('data'));
    }
    public function banksheet()
    {

        $employees = Employee::where('account_no','!=',Null)->where('status',1)->get();
        return view('admin.hr.salary_sheet.bank_transfer',compact('employees'));
    }

    public function cashsheet()
    {
        $employees = Employee::where('account_no',Null)->where('status',1)->get();
        return view('admin.hr.salary_sheet.cash_salary_sheet',compact('employees'));
    }

    public function bonussheet()
    {
        $employees = Employee::where('account_no','!=',Null)->where('status',1)->get();
        return view('admin.hr.salary_sheet.bonus_transfer',compact('employees'));
    }
}
