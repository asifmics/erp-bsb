<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentDocument;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;

class StudentDocumentController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * @param $slug
     */

    public function store( Request $request ) {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'document_type' => 'required',
            'document' => 'required',
        ]);


        $document = new StudentDocument;
        $document->student_id = $request->student_id;
        $document->document_title = $request->document_title;
        $document->document_type = $request->document_type;
        $doc_file = $request->document;
        $image_name= 'document_'.time().'.'.$doc_file->getClientOriginalExtension();
        $doc_file->move('uploads/document/',$image_name);
        $document->document='uploads/document/'.$image_name;
        $document->save();
        return redirect()->back();
    }
    public function edit( $id ) {
        $document = StudentDocument::find($id);
        $student = Student::find($document->student_id);
        return view('admin.student.view', compact('student','document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request) {
        $validatedData = $request->validate([
            'student_id' => 'required',
        ]);

        $document = StudentDocument::find($request->id);
        $document->student_id = $request->student_id;
        $document->document_title = $request->document_title;
        $document->document_type = $request->document_type;
        $doc_file = $request->document;
        if($doc_file){
            $image_name= 'document_'.time().'.'.$doc_file->getClientOriginalExtension();
            $doc_file->move('uploads/document/',$image_name);
            $document->document='uploads/document/'.$image_name;
        }
        $document->save();
        $notification = array(
            'messege'   =>  'Document Update successfully',
                'alert-type'=>  'success'
            );
            $student_slug = Student::find($request->student_id);
            $student_slug = $student_slug ? $student_slug->slug : 0;

            return redirect()->route('view_student_document', $student_slug)->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, StudentDocument $document ) {
        $document = $document->findOrFail($id);
        unlink($document->document);
        $document->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

        public function softdelete(Request $request, Experience $experience )
    {
        $experience = $experience->findOrFail($request->modal_id);
        $experience->update(['status' => 0, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
        public function restore(Request $request, Experience $experience )
    {
        $experience = $experience->findOrFail($request->modal_id);
        $experience->update(['status' => 1, 'updated_at'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->with('success', 'Restored Successfully');
    }
}
