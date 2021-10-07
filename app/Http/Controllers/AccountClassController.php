<?php

namespace App\Http\Controllers;

use App\AccountClass;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class AccountClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accclass = AccountClass::all();
        return view('admin.accounts.class', compact('accclass'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart_of_accounts()
    {
        $classes = AccountClass::with('groupDetails', 'groupDetails.childGroup', 'groupDetails.childGroup.glAccounts', 'groupDetails.glAccounts')->get();
        return view('admin.accounts.chart_of_accounts', compact('classes'));
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
            'type' => 'required|in:Assets,Liabilities,Income,Expense',
        ]);

        $accclass = new AccountClass();
        $accclass->name = $request->name;
        $accclass->type = $request->type;
        $accclass->save();

        return redirect()->back()->with('success', 'Class added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountClass  $accountClass
     * @return \Illuminate\Http\Response
     */
    public function show(AccountClass $accountClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountClass  $accountClass
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountClass $accountClass)
    {
        $accclass = AccountClass::all();
        return view('admin.accounts.class', compact('accclass', 'accountClass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccountClass  $accountClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountClass $accountClass)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|in:Assets,Liabilities,Income,Expense',
        ]);
        $accountClass->name = $request->name;
        $accountClass->type = $request->type;
        $accountClass->save();
        return redirect()->route('account.class')->with('success', 'Class Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountClass  $accountClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $accClass = AccountClass::findOrFail($request->modal_id);

        $hasGroups = $accClass->groupDetails->count();
        if(!$hasGroups){
            $accClass->delete();
            return redirect()->back()->with('success', 'Class Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Class Can not be Deleted! Account group exsist.');
    }
}
