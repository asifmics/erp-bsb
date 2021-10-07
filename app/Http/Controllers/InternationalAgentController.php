<?php

namespace App\Http\Controllers;

use App\CertificationAgent;
use App\Country;
use App\ExcelReports\InternationalAgentExcelReport;
use App\InternationalAgent;
use App\University;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;


class InternationalAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = InternationalAgent::with('universities', 'country')->get();
        return view('admin.client_satisfaction.agent.all', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $certificates = CertificationAgent::all();
        return view('admin.client_satisfaction.agent.create', compact('countries', 'certificates'));
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
        $data['valid_form'] = Carbon::createFromFormat('m/d/Y', $request->valid_form)->format('d-m-Y');
        $data['valid_to'] = Carbon::createFromFormat('m/d/Y', $request->valid_to)->format('d-m-Y');

        $data['slug'] = Str::slug(md5(rand() . time() . rand()));
        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = uploadImage($request->file('pdf_file'), 'uploads/agent');
        }

        InternationalAgent::create($data);
        return redirect('dashboard/international/agent');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternationalAgent $internationalAgent
     * @return \Illuminate\Http\Response
     */
    public function edit($internationalAgent)
    {
        $countries = Country::all();
        $certificates = CertificationAgent::all();
        $agent = InternationalAgent::where('slug', $internationalAgent)->firstOrFail();
        $country = Country::with('universities')->where('id', $agent->country_id)->get();

        return view('admin.client_satisfaction.agent.edit', compact('countries', 'certificates', 'agent', 'country'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\InternationalAgent $internationalAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $internationalAgent)
    {
        $agent = InternationalAgent::where('slug', $internationalAgent)->firstOrFail();
        $data = $request->all();
        $data['valid_form'] = Carbon::parse($request->valid_form)->format('d-m-Y');
        $data['valid_to'] = Carbon::parse($request->valid_to)->format('d-m-Y');
        if ($request->hasFile('pdf_file')) {
            @unlink(public_path("uploads/agent/$agent->pdf_file"));
            $data['pdf_file'] = uploadImage($request->file('pdf_file'), 'uploads/agent');
        }

        $agent->update($data);
        return redirect('dashboard/international/agent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternationalAgent $internationalAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InternationalAgent $internationalAgent)
    {
        $agent = $internationalAgent->findOrFail($request->modal_id);
        @unlink(public_path("uploads/agent/$agent->pdf_file"));
        $agent->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');

    }

    public function getUniversity(Request $request)
    {
        $country = Country::with('universities')->where('id', $request->country_id)->first();
        return response()->json([
            'success' => true,
            'data' => $country
        ]);
    }

    public function download(InternationalAgent $document)
    {
        $file = public_path("uploads/agent/$document->pdf_file");
        return Response::download($file);
    }

    public function pdfDownload()
    {
        /*$agents = InternationalAgent::all();
        return view('admin.client_satisfaction.agent.pdf.pdf-view',compact('agents'));*/

        $agents = InternationalAgent::all();
        $pdf = PDF::loadview('admin.client_satisfaction.agent.pdf.pdf-view', compact('agents'))->setPaper('a4', 'landscape');
        return $pdf->download(md5(rand() . time()) . '.' . "pdf");

    }

    public function internationalAgentXlsx()
    {
        return Excel::download(new InternationalAgentExcelReport(), md5(rand().time()).'.xlsx','Xlsx');
    }


}
