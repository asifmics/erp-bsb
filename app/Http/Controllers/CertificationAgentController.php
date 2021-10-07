<?php

namespace App\Http\Controllers;

use App\CertificationAgent;
use App\Http\Requests\CertificationAgentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CertificationAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (!empty($certificate)) {
            $data['editable'] = $certificate;
        }
        $data['certifications'] = CertificationAgent::all();
        return view('admin.client_satisfaction.certification.all', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($certificate = null)
    {
        $data = [];

        if (!empty($certificate)) {
            $data['editable'] = CertificationAgent::whereSlug($certificate)->firstOrFail();
        }

        return view('admin.client_satisfaction.certification.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationAgentRequest $request)
    {
        $data = $request->all();
        $data['slug'] = strtolower(md5(time() . rand() . rand()));
        CertificationAgent::create($data);
        $msg = "Data added successfully";

        return redirect('dashboard/certification/category')->with('success', $msg);
    }


    public function update(Request $request, $certificate = null)
    {
        $certification = CertificationAgent::whereSlug($certificate)->firstOrFail();
        $this->validate($request, [
            "name" => 'required|unique:certification_agents,name,'.$certification->id
        ]);
        $certification->update($request->all());
        $msg = "Data updated successfully";
        return redirect('dashboard/certification/category')->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertificationAgent $certificationAgent
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, CertificationAgent $certificate)
    {
        $certificate = $certificate->findOrFail($request->modal_id);
        $certificate->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');

    }
}
