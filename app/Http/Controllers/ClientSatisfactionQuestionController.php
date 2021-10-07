<?php

namespace App\Http\Controllers;

use App\ClientSatisfactionQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ClientSatisfactionQuestionController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $questions = ClientSatisfactionQuestion::where('status',1)->get();
        return view( 'admin.client_satisfaction.question.all', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.client_satisfaction.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $validatedData = $request->validate([
            'question' => 'required',
        ]);

        $slug = strtolower('question-' . Str::random(8) . '-' . Str::random(8));

        $question = new ClientSatisfactionQuestion;
        $question->question = $request->question;
        $question->slug = $slug;
        $question->save();
        return redirect()->route('all_cs_question');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show( Department $department ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug ) {
        $question = ClientSatisfactionQuestion::whereSlug($slug)->firstOrFail();
        return view('admin.client_satisfaction.question.create', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, ClientSatisfactionQuestion $question ) {
        $validatedData = $request->validate([
            'question' => 'required',
        ]);


        $question = ClientSatisfactionQuestion::whereSlug($request->slug)->firstOrFail();
        $question->question = $request->question;
        $question->save();
        return redirect()->route('all_cs_question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, ClientSatisfactionQuestion $question ) {
        $question = $question->findOrFail($request->modal_id);
        $question->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, ClientSatisfactionQuestion $question )
    {
        $question = $question->findOrFail($request->modal_id);
        $question->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function publish(Request $request, ClientSatisfactionQuestion $question )
    {

        $question = $question->findOrFail($request->modal_id);
        $question->update(['publish' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Publish Successfully');
    }
        public function unpublish(Request $request, ClientSatisfactionQuestion $question )
    {

        $question = $question->findOrFail($request->modal_id);
        $question->update(['publish' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Unpublish Successfully');
    }
        public function restore(Request $request, ClientSatisfactionQuestion $question )
    {
        $question = $question->findOrFail($request->modal_id);
        $question->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
