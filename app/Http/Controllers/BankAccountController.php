<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\GlAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $glAccount = GlAccount::OrderBy('group_id')->get();
        $banks = BankAccount::all();
        // TODO: Add pagination
        return view('admin.accounts.bank', compact('glAccount', 'banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:255',
            'type' => 'nullable|integer',
            'account_gl' => 'required|integer',
            'charge_gl' => 'required|integer',
        ]);

        $isGlUsed = BankAccount::where('account_gl_id', $request->account_gl)->count();

        if($isGlUsed){
            return redirect()->back()->with('error', 'Gl Account already in use!');
        }

        $bank = new BankAccount();
        $bank->account_name = $request->name;
        $bank->bank_name = $request->bank_name;
        $bank->account_number = $request->account_number;
        $bank->bank_address = $request->address;
        $bank->account_gl_id = $request->account_gl;
        $bank->charge_gl_id = $request->charge_gl;
        $bank->type = $request->type;
        $bank->save();
        return redirect()->back()->with('success', 'Bank Account added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        $glAccount = GlAccount::OrderBy('group_id')->get();
        $banks = BankAccount::all();
        return view('admin.accounts.bank', compact('glAccount', 'banks', 'bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'nullable|integer',
            'account_gl' => 'required|integer',
            'charge_gl' => 'required|integer',
        ]);

        $bankAccount->account_name = $request->name;
        $bankAccount->bank_name = $request->bank_name;
        $bankAccount->account_number = $request->account_number;
        $bankAccount->bank_address = $request->address;
        $bankAccount->account_gl_id = $request->account_gl;
        $bankAccount->charge_gl_id = $request->charge_gl;
        $bankAccount->type = $request->type;
        $bankAccount->save();
        return redirect()->route('account.bank')->with('success', 'Bank Account Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bankAccount = BankAccount::findOrFail($request->modal_id);

        // TODO: Add check for  accounts transections
        $bankAccount->delete();
        return redirect()->back()->with('success', 'Account Deleted Successfully!');
    }
}
