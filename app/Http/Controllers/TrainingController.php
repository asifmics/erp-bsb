<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Training;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
class TrainingController extends Controller
{
    public function insert( Request $request ) {

        $validatedData = $request->validate([

            'title' => 'required',
            'topic' => 'required',
            'pass_year' => 'required',
            'institut' => 'required',
            'duration' => 'required',
            'board' => 'required',


        ]);

        $slug = strtolower('train-' . Str::random(8) . '-' . Str::random(8));

        $training = new Training;
        $training->slug = $slug;
        $training->employee_id = $request->emp_id;
        $training->title = $request->title;
        $training->topic = $request->topic;
        $training->pass_year = $request->pass_year;
        $training->institut = $request->institut;
        $training->duration = $request->duration;
        $training->board = $request->board;
        $training->created_at = Carbon::now()->toDateTimeString();

        $training->save();
        $notification = array(
        'messege'   =>  'Trainig create successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit( $id ) {
        $train = Training::find($id);
        $employee = Employee::find($train->employee_id);
        return view('admin.hr.employee.view', compact('train', 'employee'));
    }
    public function update( Request $request ) {
        // dd($request->all());
        $id =$request->id;
        $validatedData = $request->validate([

            'title' => 'required',
            'topic' => 'required',
            'pass_year' => 'required',
            'institut' => 'required',
            'duration' => 'required',
            'board' => 'required',
        ]);

        $training = Training::find($id);
        $training->employee_id = $request->emp_id;
        $training->title = $request->title;
        $training->topic = $request->topic;
        $training->pass_year = $request->pass_year;
        $training->institut = $request->institut;
        $training->duration = $request->duration;
        $training->board = $request->board;
        $training->created_at = Carbon::now()->toDateTimeString();
        $training->save();
        $notification = array(
        'messege'   =>  'Trainig Update successfully',
            'alert-type'=>  'success'
        );
        $emp_slug = Employee::find($request->emp_id);
        $emp_slug = $emp_slug ? $emp_slug->slug : 0;

        return redirect()->route('view_employee_training', $emp_slug)->with($notification);
    }

    public function delete($id)
    {
        Training::find($id)->delete();
        $notification = array(
        'messege'   =>  'Trainig delete successfully',
            'alert-type'=>  'success'
        );
        return redirect()->back()->with($notification);
    }
}
