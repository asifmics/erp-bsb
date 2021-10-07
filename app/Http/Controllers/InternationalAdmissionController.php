<?php

namespace App\Http\Controllers;

use App\Branch;
use App\ExcelReports\InternationalAdmissionExcelReport;
use App\InternationalAdmission;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class InternationalAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interAdmissions = InternationalAdmission::with('student.interestcountryActiveStatus')->get();
        return view('admin.client_satisfaction.international-admission.all', compact('interAdmissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $internationalStudentIds = InternationalAdmission::all()->pluck('student_id')->toArray();
        $students = Student::all()->except($internationalStudentIds);
        return view('admin.client_satisfaction.international-admission.create', compact('students'));

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
            'f_o_date' => 'required',
            'ex_particulars' => 'required',
            'ex_amount' => 'required',
            'card_holder' => 'required',
            'pay_method' => 'required',
        ], [
            'student_id.required' => 'The student ID field is required',
            'f_o_date.required' => 'The file open date field is required',
            'ex_particulars.required' => 'The expense particulars field is required',
            'ex_amount.required' => 'The expense amount field is required',
            'pay_method.required' => 'The payment method field is required',

        ]);
        $data['slug'] = md5(rand() . time() . rand());
        $data['f_o_date'] = Carbon::parse($request->f_o_date)->format('d-m-Y');
        //return $data;
        InternationalAdmission::create($data);
        return redirect('dashboard/international/admission');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternationalAdmission $internationalAdmission
     * @return \Illuminate\Http\Response
     */
    public function show(InternationalAdmission $internationalAdmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternationalAdmission $internationalAdmission
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $internationalAdmission = InternationalAdmission::with('student.interestcountryActiveStatus.university','student.counsellorganerate')->where('slug', $slug)->firstOrFail();
        $internationalStudentIds = InternationalAdmission::all()->pluck('student_id')->toArray();
        // $students = Student::all();
        $students = Student::all()->except($internationalStudentIds);

        return view('admin.client_satisfaction.international-admission.edit', compact('students', 'internationalAdmission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\InternationalAdmission $internationalAdmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $internationalAdmission = InternationalAdmission::where('slug', $slug)->firstOrFail();

        $data = $request->all();
        $this->validate($request, [
            'student_id' => 'required',
            'f_o_date' => 'required',
            'ex_particulars' => 'required',
            'ex_amount' => 'required',
            'card_holder' => 'required',
            'pay_method' => 'required',
        ], [
            'student_id.required' => 'The student ID field is required',
            'f_o_date.required' => 'The file open date field is required',
            'ex_particulars.required' => 'The expense particulars field is required',
            'ex_amount.required' => 'The expense amount field is required',
            'pay_method.required' => 'The payment method field is required',

        ]);
       // $data['slug'] = md5(rand() . time() . rand());
        $data['f_o_date'] = Carbon::parse($request->f_o_date)->format('d-m-Y');
        //return $data;
        $internationalAdmission->update($data);
        return redirect('dashboard/international/admission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternationalAdmission $internationalAdmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InternationalAdmission $internationalAdmission)
    {
        $admission = $internationalAdmission->findOrFail($request->modal_id);
        $admission->delete();;
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function getStudentAdmissionInfo(Request $request)
    {
        $student = Student::where('id', $request->student_id)->with('counsellorganerate', 'interestcountryActiveStatus')->first();

        return response()->json([
            'success' => true,
            'data' => $student,
        ]);

    }

    public function pdfDownload()
    {
        $admissions = InternationalAdmission::all();
        $pdf = PDF::loadview('admin.client_satisfaction.international-admission.pdf.pdf-view',compact('admissions'))->setPaper('legal', 'landscape');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");

    }

    public function internationalAdmissionXlsx()
    {
        return Excel::download(new InternationalAdmissionExcelReport(), md5(rand().time()).'.xlsx','Xlsx');

    }
}
