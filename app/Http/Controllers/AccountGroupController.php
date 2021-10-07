<?php

namespace App\Http\Controllers;

use App\AccountGroup;
use App\AccountClass;
use Illuminate\Http\Request;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accgroup = AccountGroup::all();
        $accclass = AccountClass::all();
        return view('admin.accounts.group', compact('accgroup', 'accclass'));
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
            'parent' => 'nullable|integer',
            'class' => 'required|integer',
        ]);

        $group = new AccountGroup();
        $group->name = $request->name;
        $group->parent_id = $request->parent;
        $group->class_id = $request->class;
        $group->save();

        return redirect()->back()->with('success', 'Group added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AccountGroup $accountGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountGroup $accountGroup)
    {
        $accgroup = AccountGroup::all();
        $accclass = AccountClass::all();
        return view('admin.accounts.group', compact('accgroup', 'accclass', 'accountGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountGroup $accountGroup)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'parent' => 'nullable|integer',
            'class' => 'required|integer',
        ]);
;
        $accountGroup->name = $request->name;
        $accountGroup->parent_id = $request->parent;
        $accountGroup->class_id = $request->class;
        $accountGroup->save();

        return redirect()->route('account.group')->with('success', 'Group Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountGroup  $accountGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $acc_group = AccountGroup::findOrFail($request->modal_id);
        $isParent = $acc_group->childGroup->count();

        // TODO: Add check for GL accounts
        if(!$isParent){
            $acc_group->delete();
            return redirect()->back()->with('success', 'Group Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Group Can not be Deleted! Child Exsist.');
    }
}
