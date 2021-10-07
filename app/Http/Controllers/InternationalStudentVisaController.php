<?php

namespace App\Http\Controllers;

use App\InternationalStudentVisa;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InternationalStudentVisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visas = InternationalStudentVisa::all();
        return view('admin.client_satisfaction.international-student-visa-record.all', compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('id','desc')->get();
        return view('admin.client_satisfaction.international-student-visa-record.create', compact('students'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'student_id' => 'required',
            'offer_letter_form' => 'required',
            'admission_on_pro' => 'required',
            'overseas' => 'required',
            'submit_on' => 'required',
            'notary_on' => 'required',
            'received_no' => 'required',
            'appointment_on' => 'required',
            'file_submit_on' => 'required',


        ], [
            'student_id.required' => 'The student ID field is required',
            'offer_letter_form.required' => 'The file offer letter field is required',
            'admission_on_pro.required' => 'The admission on field is required',
            'overseas.required' => 'The overseas start field is required',
            'submit_on.required' => 'The submit date field is required',
            'notary_on.required' => 'The notary date field is required',
            'received_no.required' => 'The received date field is required',
            'appointment_on.required' => 'The appointment date field is required',
            'file_submit_on.required' => 'The file submit date field is required',


        ]);
        $data['slug'] = md5(rand() . time() . rand());
        $data['overseas'] = Carbon::parse($request->overseas)->format('d-m-Y');
        $data['submit_on'] = Carbon::parse($request->submit_on)->format('d-m-Y');
        $data['notary_on'] = Carbon::parse($request->notary_on)->format('d-m-Y');
        $data['received_no'] = Carbon::parse($request->received_no)->format('d-m-Y');
        $data['appointment_on'] = Carbon::parse($request->appointment_on)->format('d-m-Y');
        $data['file_submit_on'] = Carbon::parse($request->file_submit_on)->format('d-m-Y');
        //return $data;
        InternationalStudentVisa::create($data);
        return redirect('dashboard/international/admission/visa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternationalStudentVisa $internationalStudentVisa
     * @return \Illuminate\Http\Response
     */
    public function show(InternationalStudentVisa $internationalStudentVisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternationalStudentVisa $internationalStudentVisa
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $internationalStudentVisa = InternationalStudentVisa::with('student')->where('slug', $slug)->firstOrFail();
        return view('admin.client_satisfaction.international-student-visa-record.edit', compact('internationalStudentVisa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\InternationalStudentVisa $internationalStudentVisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug )
    {
        $internationalStudentVisa = InternationalStudentVisa::where('slug', $slug)->firstOrFail();
        $data = $request->all();
        $this->validate($request, [
            'student_id' => 'required',
            'offer_letter_form' => 'required',
            'admission_on_pro' => 'required',
            'overseas' => 'required',

        ], [
            'student_id.required' => 'The student ID field is required',
            'offer_letter_form.required' => 'The file offer letter field is required',
            'admission_on_pro.required' => 'The admission on field is required',
            'overseas.required' => 'The overseas start field is required',

        ]);

        $data['overseas'] = Carbon::parse($request->overseas)->format('d-m-Y');
        //return $data;
        $internationalStudentVisa->update($data);
        return redirect('dashboard/international/admission/visa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternationalStudentVisa $internationalStudentVisa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,InternationalStudentVisa $internationalStudentVisa)
    {
        $studentVisa = $internationalStudentVisa->findOrFail($request->modal_id);
        $studentVisa->delete();;
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
