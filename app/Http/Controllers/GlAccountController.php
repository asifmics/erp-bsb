<?php

namespace App\Http\Controllers;

use App\GlAccount;
use App\AccountGroup;
use Illuminate\Http\Request;

class GlAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: make it Order by parent child of group
        $glAccounts = GlAccount::orderBy('group_id')->get();
        $accgroup = AccountGroup::all();
        return view('admin.accounts.gl_account', compact('glAccounts', 'accgroup'));
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
            'group' => 'nullable|integer'
        ]);

        $glAccount = new GlAccount();
        $glAccount->name = $request->name;
        $glAccount->group_id = $request->group;
        $glAccount->code = $request->code;
        $glAccount->opening_balance = $request->opening_balance;
        $glAccount->status = 1;
        $glAccount->save();

        return redirect()->back()->with('success', 'GL Account Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GlAccount  $glAccount
     * @return \Illuminate\Http\Response
     */
    public function show(GlAccount $glAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GlAccount  $glAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(GlAccount $glAccount)
    {
        $glAccounts = GlAccount::orderBy('group_id')->get();
        $accgroup = AccountGroup::all();
        return view('admin.accounts.gl_account', compact('glAccounts', 'accgroup', 'glAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GlAccount  $glAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GlAccount $glAccount)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'group' => 'nullable|integer'
        ]);

        $glAccount->name = $request->name;
        $glAccount->group_id = $request->group;
        $glAccount->code = $request->code;
        $glAccount->opening_balance = $request->opening_balance;
        $glAccount->status = 1;
        $glAccount->save();

        return redirect()->route('account.gl')->with('success', 'GL Account Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GlAccount  $glAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $glAccount = GlAccount::findOrFail($request->modal_id);
        $glAccount->delete();
        // TODO: Do a check is there any bank account or transection exsist
        return redirect()->back()->with('success', 'GL Account Deleted Successfully!');
    }
}
