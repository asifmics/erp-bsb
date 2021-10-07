<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BranchController extends Controller
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
        $branches = Branch::where('status',1)->get();
        return view('admin.hr.branch.all', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hr.branch.create');
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
            'departments' => 'required',
        ]);

        $branch = new Branch;
        $branch->name = $request->name;
        $branch->departments = implode(', ', $request->departments);
        $branch->save();

        return redirect()->route('all_branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.hr.branch.create', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'departments' => 'required',
        ]);

        $branch = Branch::findOrFail($request->id);
        $branch->name = $request->name;
        $branch->departments = implode(', ', $request->departments);
        $branch->save();

        return redirect()->route('all_branch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Branch $branch)
    {
        $branch = $branch->findOrFail($request->modal_id);
        $branch->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function softdelete(Request $request, Branch $branch)
    {
        $branch = $branch->findOrFail($request->modal_id);
        $branch->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request, Branch $branch)
    {
        $branch = $branch->findOrFail($request->modal_id);
        $branch->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
