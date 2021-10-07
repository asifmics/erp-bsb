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
</style>
@endpush
@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_student')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/guest/add'))
                    Guest Student Form
                    @else
                    Edit Student Information
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
                                        <h4 class="text-center">Register Student</h4>
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
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="item form-group {{ $errors->has('to') ? ' has-error' : '' }}">
                                    <label for="to">To <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="to" id="to" value="" placeholder="to" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
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
                                    <label for="room">Room #<span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="room" id="name" value="" placeholder="ID number" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="help-block"></div>
                                     @if ($errors->has('room'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('purpose_study') ? ' has-error' : '' }}">
                                    <label for="purpose_study">Purpose :Study<span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="purpose_study" id="name" value="" placeholder="ID number" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="help-block"></div>
                                     @if ($errors->has('purpose_study'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purpose_study') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('visa_tiket') ? ' has-error' : '' }}">
                                    <label for="visa_tiket">Visa/Tiket <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="visa_tiket" id="visa_tiket" value="" placeholder="visa_tiket" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('visa_tiket'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('visa_tiket') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('ielts') ? ' has-error' : '' }}">
                                    <label for="ielts">TOEFL/IELTS</label>
                                    <input class="form-control col-md-10 col-xs-12" name="ielts" id="ielts" value="" placeholder="ielts" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('ielts'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ielts') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('others') ? ' has-error' : '' }}">
                                    <label for="others">Others</label>
                                    <input class="form-control col-md-10 col-xs-12" name="others" id="others" value="" placeholder="National ID" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('others'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('others') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country">Country</label>
                                    @php
                                        $countries = App\Country::all();
                                    @endphp
                                    <select name="country" id="" class="form-control col-md-10 col-xs-12">
                                        <option value="">Select Country</option>
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label for="country">Subject</label>
                                    @php
                                        $countries = App\Country::all();
                                    @endphp
                                    <select name="subject" id="" class="form-control col-md-10 col-xs-12">
                                        <option value="">Select subject</option>
                                        @foreach ($countries as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>

                                        @endforeach
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name<span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="name" id="name" value="" placeholder="ID number" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
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
                                    <label for="dob">Birth Date <span class="required"></span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="dob" id="dob" value="" placeholder="Birth Date" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('married') ? ' has-error' : '' }}">
                                    <label for="married">Married <span class="required"></span>
                                    </label>
                                    <select class="form-control col-md-10 col-xs-12" name="married" id="married" >
                                        <option value="">--Select--</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('married'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('married') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('single') ? ' has-error' : '' }}">
                                    <label for="single">Single</label>
                                    <select class="form-control col-md-10 col-xs-12" name="single" id="single">
                                        <option value="">--Select--</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('single'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('single') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('father') ? ' has-error' : '' }}">
                                    <label for="religion">Father/Husband</label>
                                    <input class="form-control col-md-10 col-xs-12" name="father" id="father" value="" placeholder="Enter Father/Husbend Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('father'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('father') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('present_address') ? ' has-error' : '' }}">
                                    <label for="religion">Present Address</label>
                                    <input class="form-control col-md-10 col-xs-12" name="present_address" id="present_address" value="" placeholder="Enter your present address" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('present_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('present_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="health_condition">E-mail</label>
                                    <input class="form-control col-md-10 col-xs-12" name="email" id="email" value="" placeholder="email Id" type="email" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="health_condition">Phone</label>
                                    <input class="form-control col-md-10 col-xs-12" name="phone" id="phone" value="" placeholder="phone Id" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="photo">Student Photo</label>
                                    <input class="form-control col-md-10 col-xs-12" name="photo" id="photo" type="file">
                                    <div class="text-info" style="font-size: 9px;">Image file format: .jpg, .jpeg, .png or .gif</div>
                                    <div class="help-block"></div>
                                     @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
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
                        </div>

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
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="education_fair">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Seminar
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="seminar">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Staff
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="staff">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Advertisment
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="advertisment">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Relative / Friend
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="relative">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Newspaper
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="newspaper">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Facebook
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="facebook">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Agent
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="agent">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Leaflet
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="leaflet">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Web-Page
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="webpage">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Spot Admisssion
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="webpage">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">TV Programe
                                    <input id="" class="ml-2 mt-1" type="checkbox" name="tv_programe">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="checkbox checkbox-outline checkbox-success">Others
                                        <input type="checkbox" name="others">
                                        </label>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 margin-top text-center">
                                <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Add New Student</button>
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

@endsection
@push('js')

<script>

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
