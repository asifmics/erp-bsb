@extends('layouts.admin')
@push('css')
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
    .required{
        color: red;
    }
</style>
@endpush
@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_guest_student')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/student/guest/create'))
                    Guest Student Form
                    @else
                    Edit Guest Information
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$student->slug}}">
                    <input type="hidden" name="id" value="{{$student->id}}">
                    @endif
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
                swal({title: "Success!", text: "New Guest Added Successfully.", icon: "success", button: "OK", timer:5000,});
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
                                        <h4 class="text-center">Register Guest Student</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="admission-form-title" ><strong>Basic Information:</strong>
                                </p>
                            </div>
                        </div>
                        <style>
                            label{
                                font-weight: 550 !important;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item form-group {{ $errors->has('visitor_id') ? ' has-error' : '' }}">
                                    <label for="visitor_id">Visitor Id <span class="required">*</span>
                                    </label>
                                    <input class="form-control col-md-12 col-xs-12" name="visitor_id" id="visitor_id" value="{{ mt_rand(0, 999999)}}" placeholder="Enter Visitor Id" type="text" autocomplete="off" >
                                    <div class="help-block"></div>
                                     @if ($errors->has('visitor_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('visitor_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item form-group {{ $errors->has('contracked_by') ? ' has-error' : '' }}">
                                    <label for="visitor_id">Contact By<span class="required">*</span>
                                    </label>
                                    <br>
                                   <input class="mr-2" name="contracked_by" id="" value="phone" placeholder="Enter Visitor Id" type="radio">Over Phone<br>
                                    <input class="mr-2" name="contracked_by" id="" value="physical" placeholder="Enter Visitor Id" type="radio">Physical
                                    <div class="help-block"></div>
                                     @if ($errors->has('contracked_by'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contracked_by') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           <div class="col-md-4 col-sm-4 col-xs-2">
                            <div class="item form-group {{ $errors->has('guest_date') ? ' has-error' : '' }}">
                                <label for="guest_date">Date <span class="required"></span>
                                </label>
                                <input class="form-control col-md-12 col-xs-12" id="kt_datepicker_1" name="guest_date" id="guest_date"  type="text" autocomplete="off" >
                                <div class="help-block"></div>
                                 @if ($errors->has('guest_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guest_date') }}</strong>
                                </span>
                                @endif
                            </div>
                           </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('to') ? ' has-error' : '' }}">
                                    <label for="to">To <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-12 col-xs-12" name="to" id="to"  placeholder="to" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="help-block"></div>
                                     @if ($errors->has('to'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item form-group {{ $errors->has('room') ? ' has-error' : '' }}">
                                    <label for="room">Room<span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-12 col-xs-12" name="room" id="name" value="{{ mt_rand(0, 999999)}}" placeholder="Enter Room ID" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="help-block"></div>
                                     @if ($errors->has('room'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item form-group {{ $errors->has('purpose_study') ? ' has-error' : '' }}">
                                    <label for="purpose_study">Purpose<span class="required">*</span>
                                    </label>
                                    <br>
                                    <input class="mr-2 mt-1" name="purpose_study" value="1" id=""  type="checkbox" autocomplete="off">Study
                                    <input class="mr-2 mt-1" name="purpose_visit" value="1" id=""  type="checkbox" autocomplete="off">Visit/Tiket
                                    <input class="mr-2 mt-1" name="purpose_ielts" value="1" id=""  type="checkbox" autocomplete="off">TOEFL/IELTS
                                    <input class="mr-2 mt-1" name="purpose_others" value="1" id=""  type="checkbox" autocomplete="off">Others
                                    <div class="help-block"></div>
                                     @if ($errors->has('purpose_study'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purpose_study') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country">Country<span class="required">*</span></label>
                                    @php
                                        $countries = App\Country::all();
                                    @endphp
                                    <select name="nationality" id="" class="form-control col-md-12 col-xs-12">
                                        <option >Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>

                                        @endforeach
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label for="country">Subject</label>
                                    {{-- @php
                                        $countries = App\Country::all();
                                    @endphp
                                    <select name="subject" id="" class="form-control col-md-10 col-xs-12">
                                        <option >Select subject</option>
                                        @foreach ($countries as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>

                                        @endforeach
                                    </select> --}}
                                    <input type="text" name="subject" id="" class="form-control" placeholder="Enter subject nane">
                                    <div class="help-block"></div>
                                     @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name<span class="required"><span class="required">*</span></span>
                                    </label>
                                    <input class="form-control col-md-12 col-xs-12" name="name" id="name"  placeholder="Enter name" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="help-block"></div>
                                     @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob">Birth Date <span class="required">*</span>
                                    </label>
                                    <input class="form-control col-md-12 col-xs-12" id="kt_datepicker_1" name="dob" id="dob"  placeholder="Birth Date" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('marital_status') ? ' has-error' : '' }}">
                                    <label for="married">Marital Status <span class="required"></span>
                                    </label>
                                    @php
                                    $marital_status = ['Single', 'Married', 'Divorced', 'Separete', 'Others' ];
                                    @endphp
                                    <select class="form-control kt-select2" id="kt_select2_2" name="marital_status">
                                        <option >Select Marital Status</option>
                                        @foreach($marital_status as $status)
                                        <option value="{{$status}}" @if(old('marital_status') == $status || ( isset($guest) && $employee->marital_status == $status)) selected @endif>{{$status}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('marital_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('father') ? ' has-error' : '' }}">
                                    <label for="religion">Father/Husband</label>
                                    <input class="form-control col-md-12 col-xs-12" name="father" id="father"  placeholder="Enter Father/Husbend Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('father'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('father') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="health_condition">E-mail<span class="required">*</span></label>
                                    <input class="form-control col-md-12 col-xs-12" name="email" id="email"  placeholder="email Id" type="email" autocomplete="off">
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
                                    <label for="health_condition">Phone <span class="required">*</span></label>
                                    <input class="form-control col-md-12 col-xs-12" name="phone" id="phone"  placeholder="phone Id" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="photo">Student Photo</label>
                                    <input class="form-control col-md-12 col-xs-12" name="image" id="photo" type="file">
                                    <div class="text-info" style="font-size: 9px;">Image file format: .jpg, .jpeg, .png or .gif</div>
                                    <div class="help-block"></div>
                                     @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('present_address') ? ' has-error' : '' }}">
                                    <label for="religion">Present Address</label>
                                    <textarea class="form-control col-md-12 col-xs-12" name="present_address" id="" cols="30" rows="4"></textarea>
                                    <div class="help-block"></div>
                                     @if ($errors->has('present_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('present_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="admission-form-title"><strong>Academic Information:</strong>
                                </p>
                            </div>
                        </div>
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
                                        <input class="form-control" name="board[]" id="board"  placeholder="Board" type="text">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="grade">Grade</label>
                                        <input class="form-control" name="grade[]" id="grade"  placeholder="Grade" type="text">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="second_language">Passing Year</label>
                                        <input  class=" col-md-7 col-xs-12 form-control" name="pass_year[]" id="pass_year"  placeholder="Year" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                    Professional / Work Experiance:
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="maindocument">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item form-group">
                                        <label for="type_id">Company / Organaization</label>
                                        <input type="text" class="form-control" name="company[]" placeholder="Enter Company Name">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item form-group">
                                        <label for="class_id">Duration (Year)<span class="required"></span>
                                        </label>
                                        <input type="text" class="form-control" name="duration[]" placeholder="job duration">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item form-group">
                                        <label for="group_id">Designation</label>
                                        <input type="text" class="form-control" name="designation[]" placeholder="Enter Job Designation">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="copydocument">
                        </div>
                        <div class="form-group row custom_form_group">
                            <label class="col-md-5 col-sm-3 control-label"><span class="req_star"></span></label>
                            <div class="col-sm-4">
                            <button type="button" id="Adddocument" class="btn btn-dark btn-sm adddocument" style="margin-top: 20px">Add More Field</button>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="admission-form-title"> <strong>
                                            Where did you hear about BSB?
                                            </strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Education Fair
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_fair">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Seminar
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_seminar">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Staff
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_staff">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Advertisment
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_ads">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Relative / Friend
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_relative">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Newspaper
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_newspaper">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Facebook
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_facebook">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Agent
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_agent">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Leaflet
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_leaflet">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Web-Page
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_webpage">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Spot Admisssion
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_webpage">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">TV Programe
                                    <input id="" class="ml-2 mt-1" value="1" type="checkbox" name="hear_tv">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Others
                                        <input type="checkbox" value="1" name="hear_others">
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="ref_agent">
                                    <div class="item form-group {{ $errors->has('ref_by') ? ' has-error' : '' }}">
                                        <label for="married">Ref By: <span class="required"></span>
                                        </label>
                                        @php
                                        $counsellor =App\Agent::where('status',1)->get();
                                        @endphp
                                    <select class="form-control kt-select2" id="kt_select2_2" name="ref_by">
                                            <option >Select Ref By</option>
                                            @foreach($counsellor as $item)
                                            <option value="{{$item->id}}" >{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                         @if ($errors->has('marital_status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 mt-4">
                                <label for="others_check">Others: <span class="required"></span>
                                <input class="form-class m-2" type="checkbox" name="ref_check" id="" value="1">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 mt-4">
                                <div class="agent_data row d-none">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="item form-group {{ $errors->has('agent_name') ? ' has-error' : '' }}">
                                            <label for="health_condition">Name<span class="required">*</span></label>
                                            <input class="form-control" name="agent_name" id="agent_name"  placeholder="Enter Name" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                             @if ($errors->has('agent_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('agent_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="item form-group {{ $errors->has('agent_email') ? ' has-error' : '' }}">
                                            <label for="health_condition">E-mail<span class="required">*</span></label>
                                            <input class="form-control" name="agent_email" id="agent_email"  placeholder="Enter Agent Email" type="email" autocomplete="off">
                                            <div class="help-block"></div>
                                             @if ($errors->has('agent_email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('agent_email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="item form-group {{ $errors->has('agent_phone') ? ' has-error' : '' }}">
                                            <label for="health_condition">Phone<span class="required">*</span></label>
                                            <input class="form-control" name="agent_phone" id="email"  placeholder="Enter Phone " type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                             @if ($errors->has('agent_phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('agent_phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('applicant_sign') ? ' has-error' : '' }}">
                                    <label for="married">Applicant/Visitor (Signiture): <span class="required"></span>
                                    </label>
                                   <input type="text" class="form-control" name="applicant_sign" placeholder="Applicant Sign">
                                    <div class="help-block"></div>
                                     @if ($errors->has('applicant_sign'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('applicant_sign') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('reception') ? ' has-error' : '' }}">
                                    <label for="married">Co-ordinator/Receptionist: <span class="required">*</span>
                                    </label>
                                    @php
                                    $receptions =App\Employee::where('designation_id',3)->get();
                                    @endphp
                                    <select class="form-control kt-select2" id="kt_select2_1" name="reception">
                                        <option >Select reception</option>
                                        @foreach($receptions as $item)
                                        <option value="{{$item->id}}" >{{$item->name}} / Branch: {{ $item->branch_details->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('reception'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reception') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('counsellor') ? ' has-error' : '' }}">
                                    <label for="married">Counsellor: <span class="required">*</span>
                                    </label>
                                    @php
                                    $counsellor = App\CounsellorGenerate::where('status',1)->where('parent_id', null)->get();
                                    @endphp
                                    <select class="form-control kt-select2" id="kt_select2_3" name="counsellor">
                                        <option >Select counsellor</option>
                                        @foreach($counsellor as $item)
                                        <option value="{{$item->counsellor_id}}" >{{$item->counsellor->name}} / Branch: {{ $item->counsellor->branch_details->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('counsellor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('counsellor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid">
                            <hr>
                        </div>

                            <div class="col-md-4"></div>
                            <div class="col-md-4 col-sm-4 text-center">
                                <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Add New Guest</button>
                            </div>

                    </div>
                </div>
            </div>
        {{-- <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div> --}}
    </form>
</div>

@endsection
@push('js')

<script>
$('input[name="ref_check"]').on('change',function(){
    var check = $(this).prop('checked');
    if(check == true){
        $('.agent_data').removeClass('d-none');
        $('.ref_agent').addClass('d-none');
    }else if(check == false){
        $('.agent_data').addClass('d-none');
        $('.ref_agent').removeClass('d-none');
    }
})
</script>
<script>
var i =1;
$('#Adddocument').on('click',function(){

var last = i++;
    var html = '<div class="maindocument'+last+'">'+
                           ' <div class="row">'+
                                '<div class="col-md-4 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group">'+
                                       ' <label for="type_id"></label>'+
                                        '<input type="text" class="form-control" name="company[]" required placeholder="Enter Company Name">'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group">'+
                                        '<label for="class_id"><span class="required"></span>'+
                                       '</label>'+
                                       '<input type="text" class="form-control" name="duration[]" required placeholder="Enter Job Duration">'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group" style="display:flex">'+
                                        '<label for="group_id"></label>'+
                                        '<input type="texts" class="form-control mt-4" name="designation[]" required placeholder="Enter Job Designation">'+
                                        '<button class=" btn btn-danger removedocument btn-sm mt-4 ml-2" data-id="'+last+'">X</button>'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
    $('#copydocument').append(html);
    $(document).on('click','.removedocument',function(){
        var id = $(this).data('id');
        $('.maindocument'+id+'').remove();
    })
})
</script>
<script>
var i =1;
$('#Addaca').on('click',function(){
var last = i++;
    var html =  '<div class="mainacademic'+last+'">'+
                                '<div class="row">'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="type_id"></label>'+
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
                                            '<input class="form-control" required name="board[]" id="board"  placeholder="Board" type="text" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group">'+
                                            '<label for="grade"></label>'+
                                            '<input class="form-control" required name="grade[]" id="grade"  placeholder="Grade" type="text" required>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-3 col-xs-12">'+
                                        '<div class="item form-group" style="display:flex">'+
                                            '<label for="second_language"></label>'+
                                            '<input  class=" col-md-7 form-control required mt-4" required name="pass_year[]" id="pass_year"  placeholder="Year" type="text" autocomplete="off">'+
                                            '<button class="col-md-3 btn btn-danger removeacademic btn-sm mt-4 ml-2" data-id="'+last+'">X</button>'+
                                            '<div class="help-block"></div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
    $('#copyacademic').append(html);
    $(document).on('click','.removeacademic',function(){
        var id = $(this).data('id');
        $('.mainacademic'+id+'').remove();
    })
})
</script>
@endpush
