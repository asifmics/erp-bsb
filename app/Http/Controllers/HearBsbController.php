<?php

namespace App\Http\Controllers;

use App\HearBsb;
use Illuminate\Http\Request;

class HearBsbController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $medias = HearBsb::where('status',1)->get();
        return view('admin.student.hear_bsb.all', compact('medias'));

    }
    public function create()
    {
        return view('admin.student.hear_bsb.create');

    }
    public function edit($id)
    {
        $media =HearBsb::find($id);
        return view('admin.student.hear_bsb.create',compact('media'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $paytype = new HearBsb;
        $paytype->name = $request->name;
        $paytype->save();

        return redirect()->route('all_hear_bsb');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $paytype = HearBsb::findOrFail($request->id);
        $paytype->name = $request->name;
        $paytype->save();

        return redirect()->route('all_hear_bsb');
    }
    public function delete($id)
    {
        $empStatus = HearBsb::find($id);
        $empStatus->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
