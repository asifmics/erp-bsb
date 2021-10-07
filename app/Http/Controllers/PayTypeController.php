<?php

namespace App\Http\Controllers;

use App\PayType;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PayTypeController extends Controller
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
        $payTypes = PayType::where('status',1)->get();
        return view('admin.hr.pay_type.all', compact('payTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hr.pay_type.create');
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
            'day' => 'required',
        ]);

        $paytype = new PayType;
        $paytype->name = $request->name;
        $paytype->pay_days = $request->day;
        $paytype->save();

        return redirect()->route('all_pay_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PayType  $payType
     * @return \Illuminate\Http\Response
     */
    public function show(PayType $payType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PayType  $payType
     * @return \Illuminate\Http\Response
     */
    public function edit(PayType $payType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PayType  $payType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayType $payType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PayType  $payType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayType $payType)
    {
        //
    }

    public function softdelete(Request $request, PayType $payType)
    {
        $payType = $payType->findOrFail($request->modal_id);
        $payType->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request, PayType $payType)
    {
        $payType = $payType->findOrFail($request->modal_id);
        $payType->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
