<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentLog;
use App\StudentStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class StudentStatusController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }


    public function ajaxstatusupdate(Request $request)
    {
        $id = $request->id;
        $st_id = $request->st_id;
        $status_old = Student::find($st_id)->file_status;
        $status_new = StudentStatus::find($id)->name;
        $user = Auth::user();
        if(!empty($status_old)){
            $details = 'Student file transfer status chenge '.$status_old->name .' to '.$status_new. '. This file transfer user '. $user->name;
        }else{
            $details = 'Student file transfer status chenge ' .$status_new. '. This file transfer user '. $user->name;

        }
        // $details = 'Student file transfer status chenge '.$status_old->name .' to '.$status_new. '. This file transfer user '. $user->name;
        $log = new StudentLog;
        $log->student_id = $st_id;
        $log->type = 'File transfered';
        $log->details = $details;
        $log->save();
        $student = Student::find($st_id);
        $student->file_transfer_status = $id;
        $student->save();
        return response()->json(['success' => 'Successfully Updated Student Status']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuss = StudentStatus::where('status',1)->get();
        return view('admin.student.status.all', compact('statuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.status.create');
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
        ]);

        $paytype = new StudentStatus;
        $paytype->name = $request->name;
        $paytype->save();

        return redirect()->route('all_student_status');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function show(EmpStatus $empStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = StudentStatus::findOrFail($id);
        return view('admin.student.status.create', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $paytype = StudentStatus::findOrFail($request->id);
        $paytype->name = $request->name;
        $paytype->save();

        return redirect()->route('all_student_status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpStatus  $empStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StudentStatus $empStatus)
    {
        $empStatus = $empStatus->findOrFail($request->modal_id);
        $empStatus->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function softdelete(Request $request, StudentStatus $empStatus)
    {
        $empStatus = $empStatus->findOrFail($request->modal_id);
        $empStatus->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function restore(Request $request, StudentStatus $empStatus)
    {
        $empStatus = $empStatus->findOrFail($request->modal_id);
        $empStatus->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

}
