@extends('layouts.admin')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .admission-form-title{
    margin-bottom: 5px;
    margin-top: 10px;
    background-color: #e4e4e4;
    padding-left: 10px;
    }
    p{
        font-family: 'Raleway', sans-serif;
    font-size: 14px;
    font-weight: normal;
    letter-spacing: 0;
    line-height: 28px;
    margin: 0;
    }
</style>
@endpush
@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('counsellor_update_student')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    Student Information
                </h3>
            </div>
            {{-- <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{route('all_employee')}}"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Student List</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Student Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="admission-form">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <div class="admission-address">

                                    <div>
                                        {{-- <h4 class="text-center">Register Student</h4> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                {{-- <hr> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                {{-- <p class="admission-form-title" ><strong>Basic Information:</strong>
                                </p> --}}
                            </div>
                        </div>
                        <style>
                           .required{
                                color: red;
                                font-weight: bold;
                                font-size: 16px;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name <span class="required"></span>
                                    </label>
                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                    <input class="form-control col-md-10 col-xs-12" name="name" id="name" value="{{ $student->name ?? "" }}" placeholder="Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('id_no') ? ' has-error' : '' }}">
                                    <label for="id_no">Visitor ID <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="id_no" disabled id="name" value="{{ $student->visitor_id ?? "" }}" placeholder="ID number" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('id_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="email" id="email" value="{{ $student->email ?? "" }}" placeholder="Email" type="email" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">Phone <span class="required"></span></label>
                                    <input class="form-control col-md-10 col-xs-12" name="phone" id="phone" value="{{ $student->phone ?? "" }}" placeholder="Phone" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('national_id') ? ' has-error' : '' }}">
                                    <label for="national_id">National ID <span class="required"></span></label>
                                    <input class="form-control col-md-10 col-xs-12" name="national_id" id="national_id" value="{{ $student->nid ?? "" }}" placeholder="National ID" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('national_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('nationality') ? ' has-error' : '' }}">
                                    <label for="nationality">Nationality <span class="required"></span></label>
                                    @php
                                        $countries = App\Country::all();
                                    @endphp
                                    <select name="nationality" id="" class="form-control col-md-10 col-xs-12">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if($student->country_id == $country->id) selected @endif>{{ $country->name }}</option>

                                        @endforeach
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('nationality'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob">Birth Date <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="dob" id="dob" value="{{ $student->dob ?? "" }}" placeholder="Birth Date" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender">Gender <span class="required"></span>
                                    </label>
                                    <select class="form-control col-md-10 col-xs-12" name="gender" id="gender" >
                                        <option value="">--Select--</option>
                                        <option value="male" @if($student->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($student->gender == 'female') selected @endif>Female</option>
                                        <option value="other" @if($student->gender == 'other') selected @endif>Others</option>
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                    <label for="blood_group">Blood Group <span class="required"></span></label>
                                    <select class="form-control col-md-10 col-xs-12" name="blood_group" id="blood_group">
                                        <option value="">--Select--</option>
                                        <option value="a_positive" @if($student->blood_group == 'a_positive') selected @endif>A+</option>
                                        <option value="a_negative" @if($student->blood_group == 'a_negative') selected @endif>A-</option>
                                        <option value="b_positive" @if($student->blood_group == 'b_positive') selected @endif>B+</option>
                                        <option value="b_negative" @if($student->blood_group == 'b_negative') selected @endif>B-</option>
                                        <option value="o_positive" @if($student->blood_group == 'o_positive') selected @endif>O+</option>
                                        <option value="o_negative" @if($student->blood_group == 'o_negative') selected @endif>O-</option>
                                        <option value="ab_positive" @if($student->blood_group == 'ab_positive') selected @endif>AB+</option>
                                        <option value="ab_negative" @if($student->blood_group == 'ab_negative') selected @endif>AB-</option>
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('blood_group'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('blood_group') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('add_religion') ? ' has-error' : '' }}">
                                    <label for="religion">Religion <span class="required"></span></label>
                                    <input class="form-control col-md-10 col-xs-12" name="religion" id="add_religion" value="{{ $student->religion ?? "" }}" placeholder="Religion" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('add_religion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('add_religion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('passport') ? ' has-error' : '' }}">
                                    <label for="health_condition">Passport (Optional)</label>
                                    <input class="form-control col-md-10 col-xs-12" name="passport_id" id="passport" value="{{ $student->passport_id ?? "" }}" placeholder="Passport Id" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('passport'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passport') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="photo">Student Photo (Optional)</label>
                                    <input class="form-control col-md-10 col-xs-12" name="photo" id="photo" type="file">
                                    <div class="text-info" style="font-size: 9px;">Image file format: .jpg, .jpeg, .png or .gif</div>
                                    <div class="help-block"></div>
                                     @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> --}}
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="admission-form-title"><strong>Others Information:</strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="father_name">Father Name</label>
                                    <input class="form-control col-md-7 col-xs-12" name="father_name" id="father_name" value="{{ $student->father_name ?? "" }}" placeholder="Father Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="father_profession">Father Profession</label>
                                    <input class="form-control col-md-7 col-xs-12" name="father_profession" id="father_profession" value="{{ $student->father_profession ?? "" }}" placeholder="Father Profession" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input class="form-control col-md-7 col-xs-12" name="mother_name" id="mother_name" value="{{ $student->mother_name ?? "" }}" placeholder="Mother Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="mother_profession">Mother Profession</label>
                                    <input class="form-control col-md-7 col-xs-12" name="mother_profession" id="mother_profession" value="{{ $student->mother_profession ?? "" }}" placeholder="Mother Profession" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="admission-form-title"><strong>Academic Information:</strong>
                                </p>
                            </div>
                        </div>
                        @php
                            $key =10;

                        @endphp
                            @if (count($student->academics) > 0)
                                    @foreach ($student->academics as $aca)
                                        <div class="mainacademic{{ $key++ }}">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="type_id"></label>
                                                        <input type="hidden" name="aca_id[]" value="{{ $aca->id ?? "" }}">
                                                        <input type="text" class="form-control" required name="exam[]" value="{{ $aca->exam ?? "" }}" placeholder="Exam Name" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="class_id"><span class="required"></span>
                                                        </label>
                                                        <input type="text" required class="form-control" name="institut[]" value="{{ $aca->institut ?? "" }}" placeholder="Institut Name" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="group_id"></label>
                                                        <input type="text" required class="form-control" name="department[]" value="{{ $aca->department ?? "" }}" placeholder="Department" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="board"></label>
                                                        <input class="form-control" required name="board[]" id="board" value="{{ $aca->board ?? "" }}"  placeholder="Board" type="text" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-12">
                                                    <div class="item form-group">
                                                        <label for="grade"></label>
                                                        <input class="form-control" required name="grade[]" id="grade" value="{{ $aca->grade ?? "" }}" placeholder="Grade" type="text" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-12">
                                                    <div class="item form-group" style="display:flex">
                                                        <label for="second_language"></label>
                                                        <input  class=" col-md-7 form-control mt-4" required name="pass_year[]" id="pass_year" value="{{ $aca->pass_year ?? "" }}"  placeholder="Year" type="text" autocomplete="off">
                                                        <button class="col-md-3 btn btn-danger removeacademic btn-sm mt-4 ml-2" data-id="{{ $key++ }}">X</button>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>;
                                    @endforeach
                                    {{-- <div class="mainacademic">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="type_id">Exam Name</label>
                                                    <input type="text" class="form-control" name="exam[]" placeholder="Exam Name">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="class_id">Institut Name <span class="required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="institut[]" placeholder="Institut Name">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="group_id">Department</label>
                                                    <input type="text" class="form-control" name="department[]" placeholder="Department">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="board">Board</label>
                                                    <input class="form-control" name="board[]" id="board" value="" placeholder="Board" type="text">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="grade">Grade</label>
                                                    <input class="form-control" name="grade[]" id="grade" value="" placeholder="Grade" type="text">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="second_language">Passing Year</label>
                                                    <input  class=" col-md-7 col-xs-12 form-control" name="pass_year[]" id="pass_year" value="" placeholder="Year" type="text" autocomplete="off">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @else
                                    <div class="mainacademic">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="type_id">Exam Name</label>
                                                    <input type="text" class="form-control" name="exam[]" placeholder="Exam Name">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="class_id">Institut Name <span class="required"></span>
                                                    </label>
                                                    <input type="text" class="form-control" name="institut[]" placeholder="Institut Name">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="group_id">Department</label>
                                                    <input type="text" class="form-control" name="department[]" placeholder="Department">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="board">Board</label>
                                                    <input class="form-control" name="board[]" id="board" value="" placeholder="Board" type="text">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="grade">Grade</label>
                                                    <input class="form-control" name="grade[]" id="grade" value="" placeholder="Grade" type="text">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                <div class="item form-group">
                                                    <label for="second_language">Passing Year</label>
                                                    <input  class=" col-md-7 col-xs-12 form-control" name="pass_year[]" id="pass_year" value="" placeholder="Year" type="text" autocomplete="off">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                    {{-- @endif --}}

                        {{-- <div class="mainacademic">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="type_id">Exam Name</label>
                                        <input type="text" class="form-control" name="exam[]" placeholder="Exam Name">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="class_id">Institut Name <span class="required"></span>
                                        </label>
                                        <input type="text" class="form-control" name="institut[]" placeholder="Institut Name">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="group_id">Department</label>
                                        <input type="text" class="form-control" name="department[]" placeholder="Department">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="board">Board</label>
                                        <input class="form-control" name="board[]" id="board" value="" placeholder="Board" type="text">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="grade">Grade</label>
                                        <input class="form-control" name="grade[]" id="grade" value="" placeholder="Grade" type="text">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="second_language">Passing Year</label>
                                        <input  class=" col-md-7 col-xs-12 form-control" name="pass_year[]" id="pass_year" value="" placeholder="Year" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div id="copyacademic">

                        </div>
                        <div class="form-group row custom_form_group">
                            <label class="col-md-5 col-sm-3 control-label"><span class="req_star"></span></label>
                            <div class="col-sm-4">
                            <button type="button" id="Addaca" class="btn btn-dark btn-sm addacademic" style="margin-top: 20px">Add More Field</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="admission-form-title"> <strong>
                                    Interest Country:
                                    </strong>
                                </p>
                            </div>
                        </div>

                        @php
                            $keys =10;

                        @endphp
                            @if (count($student->interestcountry) > 0)
                                    @foreach ($student->interestcountry as $incoun)
                                    <div class="maindocument{{ $keys++ }}">
                                        <div class="row">
                                             <div class="col-md-2 col-sm-4 col-xs-12">
                                                 <div class="item form-group">
                                                    <label for="type_id"></label>
                                                   @php $countries = App\Country::all(); @endphp
                                                   <input type="hidden" name="in_coun_id[]" value="{{ $incoun->id }}">
                                                 <select name="country_id[]" id="" class="form-control country{{ $keys++ }}">
                                                     <option value="">Please select country</option>
                                                     @foreach ($countries as $country)
                                                     <option data-id="{{ $country->reg_fees }}" value="{{ $country->id }}" @if($country->id == $incoun->country_id) selected @endif>{{ $country->name }}</option>
                                                     @endforeach </select>
                                                     <div class="help-block"></div>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-4 col-xs-12">
                                                 <div class="item form-group">
                                                     <label for="class_id"><span class="required"></span>
                                                    </label>
                                                    <select name="university_id[]" id="" class="form-control university{{ $keys++ }}">
                                                        <option value="{{ $incoun->university_id }}">{{ $incoun->university->name ?? "" }}</option>
                                                    </select>
                                                     <div class="help-block"></div>
                                                 </div>
                                             </div>
                                             <div class="col-md-2 col-sm-4 col-xs-12">
                                                 <div class="item form-group">
                                                     <label for="class_id"><span class="required"></span>
                                                    </label>
                                                    <select name="university_program_category_id[]" id="" class="form-control col-md-12 col-xs-12 university_program_category{{ $keys++ }}">
                                                        <option value="{{ $incoun->university_program_category_id }}">{{ $incoun->coursecategory->name ?? "" }}</option>
                                                    </select>
                                                     <div class="help-block"></div>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-4 col-xs-12">
                                                 <div class="item form-group" >
                                                     <label for="class_id"><span class="required"></span>
                                                    </label>
                                                     <select name="university_program_id[]" id="" class="form-control col-md-12 col-xs-12 university_program{{ $keys++ }}">
                                                        <option value="{{ $incoun->university_program_id }}">{{ $incoun->course->name ?? "" }}</option>

                                                    </select>
                                                     <div class="help-block"></div>
                                                 </div>
                                             </div>
                                             <div class="col-md-2 col-sm-4 col-xs-12">
                                                 <div class="item form-group">
                                                    <label for="group_id"></label>
                                                     <input type="radio" name="status[]" value="1" @if( $incoun->adminssion_status == 1) checked @endif style="margin-right: 16px; margin-top:20px;">
                                                     <button type="button" class="btn btn-danger removedocument btn-sm mt-4 ml-2" data-id="{{ $keys++ }}">X</button>
                                                     <div class="help-block"></div>
                                                </div>
                                             </div>

                                         </div>
                                     </div>
                                 @endforeach
                            @else
                            <div class="maindocument"
                                <div class="row">
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                        <div class="item form-group">
                                            <label for="type_id">Country</label>
                                            @php
                                            $countries = App\Country::all();
                                            @endphp
                                            <input type="hidden" name="in_coun_id[]" value="">
                                            <select name="country_id[]"  class="form-control country">
                                                <option value="">Please select country</option>
                                                @foreach ($countries as $country)
                                                <option data-id="{{ $country->reg_fees }}" value="{{ $country->id }}" @if(old('country_id') == $country->id || ( isset($interest) && $interest->country_id == $country->id)) selected @endif>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="item form-group">
                                            <label for="class_id">University<span class="required"></span>
                                            </label>
                                            <select name="university_id[]" id="" class="form-control university">
                                                <option value="">Please select University</option>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                        <div class="item form-group">
                                            <label for="group_id">University Category</label>
                                            <select name="university_program_category_id[]" id="" class="form-control col-md-12 col-xs-12 university_program_category">
                                                <option value="">Please select Category</option>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="item form-group">
                                            <label for="group_id">Course</label>
                                            <select name="university_program_id[]" id="" class="form-control col-md-12 col-xs-12 university_program">
                                                <option value="">Please select Course</option>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                        <div class="item form-group">
                                            <label for="group_id">Status</label><br>
                                            <input type="radio" name="status[]" style="margin-left: 6px; margin-top:6px;" value="1" >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        <div id="copydocument">
                        </div>
                        <div class="form-group row custom_form_group">
                            <label class="col-md-5 col-sm-3 control-label"><span class="req_star"></span></label>
                            <div class="col-sm-4">
                            <button type="button" id="Adddocument" class="btn btn-dark btn-sm adddocument" style="margin-top: 20px">Add More Field</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="admission-form-title"> <strong>
                                            Address Information:
                                </strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label for="present_address">Present Address <span class="required"></span></label>
                                    <textarea class="form-control textarea-4column" name="present_address" id="present_address" placeholder="Present Address">
                                        {{ $student->present_address ?? "" }}
                                    </textarea>
                                    <div class="help-block"></div>
                                    @if ($errors->has('present_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('present_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label for="permanent_address">Permanent Address <span class="required"></span></label>
                                    <textarea class="form-control textarea-4column" name="permanent_address" id="permanent_address" placeholder="Permanent Address">
                                        {{ $student->permanent_address ?? "" }}
                                    </textarea>
                                    <div class="help-block"></div>
                                    @if ($errors->has('permanent_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('permanent_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 margin-top text-center">
                                <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Next Step</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div> --}}
    </form>
</div>

@push('js')
<script>

var i =1;
$('#Adddocument').on('click',function(){
var last = i++;
    var html = '<div class="maindocument'+last+'">'+
                           ' <div class="row">'+
                                '<div class="col-md-2 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group">'+
                                       ' <label for="type_id"></label>'+
                                      '@php $countries = App\Country::all(); @endphp'+
                                     ' <input type="hidden" name="in_coun_id[]" value="">'+
                                    '<select name="country_id[]" id="" class="form-control country'+last+'">'+
                                        '<option value="">Please select country</option>'+
                                        '@foreach ($countries as $country)'+
                                        '<option data-id="{{ $country->reg_fees }}" value="{{ $country->id }}" @if(old('country_id') == $country->id || ( isset($interest) && $interest->country_id == $country->id)) selected @endif>{{ $country->name }}</option>'+
                                        '@endforeach </select>'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-3 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group">'+
                                        '<label for="class_id"><span class="required"></span>'+
                                       '</label>'+
                                       '<select name="university_id[]" id="" class="form-control university'+last+'"> <option value="">Please select University</option> </select>'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-2 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group">'+
                                        '<label for="class_id"><span class="required"></span>'+
                                       '</label>'+
                                       '<select name="university_program_category_id[]" id="" class="form-control col-md-12 col-xs-12 university_program_category'+last+'"><option value="">Please select Category</option></select>'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-3 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group" >'+
                                        '<label for="class_id"><span class="required"></span>'+
                                       '</label>'+
                                        '<select name="university_program_id[]" id="" class="form-control col-md-12 col-xs-12 university_program'+last+'"><option value="">Please select course</option></select>'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-2 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group"'+
                                       ' <label for="group_id"></label>'+
                                        '<input type="radio" name="status[]" value="1" style="margin-right: 16px; margin-top:20px;">'+
                                        '<button " class="btn btn-danger removedocument btn-sm mt-4 ml-2" data-id="'+last+'">X</button>'+
                                        '<div class="help-block"></div>'+
                                   ' </div>'+
                                '</div>'+

                            '</div>'+
                        '</div>';
    $('#copydocument').append(html);



       $('.country'+last).on('change', function(){
          var fees= $(this).find(':selected').data('id');
          $('input[name="addmission_fees"]').val(fees);
           var country_id = $(this).val();
           if(country_id) {
               $.ajax({
                   url: "{{  url('dashboard/get/country/') }}/"+country_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     var d =$('.university'+last).empty();
                     $('.university'+last).append('<option value="">'+'Please Select University'+'</option>');
                         $.each(data, function(key, value){
                             $('.university'+last).append('<option value="'+ value.id +'">' + value.name + '</option>');
                         });
                   },

               });
           } else {

           }

       });

       $('.university'+last).on('change', function(){
           var course_id = $(this).val();
           if(course_id) {
               $.ajax({
                   url: "{{  url('dashboard/get/course-category/') }}/"+course_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {

                     var d =$('.university_program_category'+last).empty();
                             $('.university_program_category'+last).append(data);

                   },

               });
           } else {

           }
       });

       $('.university_program_category'+last).on('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             var cat_id = $(this).val();
            var university = $('.university'+last).val();
             if(cat_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course/') }}",
                     type:"POST",
                     data:{cat_id:cat_id,university:university},
                     success:function(data) {
                       var d =$('.university_program'+last).empty();
                               $('.university_program'+last).append(data);

                     },

                 });
             } else {

             }
         });

       $('.university_program'+last).on('change', function(){
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
           var course = $(this).val();

          var university = $('.university'+last).val();
          var category = $('.university_program_category'+last).val();
           if(course) {
               $.ajax({
                   url: "{{  url('dashboard/get/course/fees') }}",
                   type:"POST",
                   data:{
                      course:course,
                      university:university,
                      category:category
                      },
                   success:function(data) {

                             $('input[name="total_course_fees"]').val(data.total_tution_fees);
                             $('input[name="tution_fees"]').val(data.tution_fees);

                   },

               });
           } else {

           }
       });



})
$(document).on('click','.removedocument',function(){
        var id = $(this).data('id');
        $('.maindocument'+id+'').remove();
    })




var is =1;
$('#Addaca').on('click',function(){
var lasts = is++;
    var html =  '<div class="mainacademic'+lasts+'">'+
                                '<div class="row">'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="type_id"></label>'+
                                            '<input type="hidden" name="aca_id[]" value="">'+
                                            '<input type="text" class="form-control" required name="exam[]" placeholder="Exam Name" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="class_id"><span class="required"></span>'+
                                            '</label>'+
                                            '<input type="text" required class="form-control" name="institut[]" placeholder="Institut Name" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="group_id"></label>'+
                                            '<input type="text" required class="form-control" name="department[]" placeholder="Department" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="board"></label>'+
                                            '<input class="form-control" required name="board[]" id="board" value="" placeholder="Board" type="text" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="grade"></label>'+
                                            '<input class="form-control" required name="grade[]" id="grade" value="" placeholder="Grade" type="text" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group" style="display:flex">'+
                                            '<label for="second_language"></label>'+
                                            '<input  class=" col-md-7 form-control required mt-4" required name="pass_year[]" id="pass_year" value="" placeholder="Year" type="text" autocomplete="off">'+
                                            '<button class="col-md-3 btn btn-danger removeacademic btn-sm mt-4 ml-2" data-id="'+lasts+'">X</button>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
    $('#copyacademic').append(html);
    })
    $(document).on('click','.removeacademic',function(){
            var id = $(this).data('id');
        $('.mainacademic'+id+'').remove();
    })


</script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.country').on('change', function(){
          var fees= $(this).find(':selected').data('id');
          $('input[name="addmission_fees"]').val(fees);
           var country_id = $(this).val();
           if(country_id) {
               $.ajax({
                   url: "{{  url('dashboard/get/country/') }}/"+country_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     var d =$('.university').empty();
                     $('.university').append('<option value="">'+'Please Select University'+'</option>');
                         $.each(data, function(key, value){
                             $('.university').append('<option value="'+ value.id +'">' + value.name + '</option>');
                         });
                   },

               });
           } else {

           }

       });

       $('.university').on('change', function(){
           var course_id = $(this).val();
           if(course_id) {
               $.ajax({
                   url: "{{  url('dashboard/get/course-category/') }}/"+course_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {

                     var d =$('.university_program_category').empty();
                             $('.university_program_category').append(data);

                   },

               });
           } else {

           }
       });

       $('.university_program_category').on('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             var cat_id = $(this).val();
            var university = $('.university').val();
             if(cat_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course/') }}",
                     type:"POST",
                     data:{cat_id:cat_id,university:university},
                     success:function(data) {
                       var d =$('.university_program').empty();
                               $('.university_program').append(data);

                     },

                 });
             } else {

             }
         });

       $('.university_program').on('change', function(){
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
           var course = $(this).val();

          var university = $('.university').val();
          var category = $('.university_program_category').val();
           if(course) {
               $.ajax({
                   url: "{{  url('dashboard/get/course/fees') }}",
                   type:"POST",
                   data:{
                      course:course,
                      university:university,
                      category:category
                      },
                   success:function(data) {

                             $('input[name="total_course_fees"]').val(data.total_tution_fees);
                             $('input[name="tution_fees"]').val(data.tution_fees);

                   },

               });
           } else {

           }
       });
   });

</script>
@endpush
@endsection
