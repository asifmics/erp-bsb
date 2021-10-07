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

                    @if (Request::is('dashboard/student/create'))
                    Student Registration Form
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
                                    <label for="name">Name <span class="required">*</span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="name" id="name" value="" placeholder="Name" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
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
                                    <label for="id_no">Student ID <span class="required">*</span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="id_no" id="name" value="" placeholder="ID number" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
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
                                    <label for="email">Email <span class="required">*</span>
                                    </label>
                                    <input class="form-control col-md-10 col-xs-12" name="email" id="email" value="" placeholder="Email" type="email" autocomplete="off">
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
                                    <label for="phone">Phone <span class="required">*</span></label>
                                    <input class="form-control col-md-10 col-xs-12" name="phone" id="phone" value="" placeholder="Phone" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('national_id') ? ' has-error' : '' }}">
                                    <label for="national_id">National ID <span class="required">*</span></label>
                                    <input class="form-control col-md-10 col-xs-12" name="national_id" id="national_id" value="" placeholder="National ID" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('national_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('nationality') ? ' has-error' : '' }}">
                                    <label for="nationality">Nationality <span class="required">*</span></label>
                                    @php
                                        $countries = App\Country::all();
                                    @endphp
                                    <select name="nationality" id="" class="form-control col-md-10 col-xs-12">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>

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
                                    <label for="dob">Birth Date <span class="required">*</span>
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
                                <div class="item form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender">Gender <span class="required">*</span>
                                    </label>
                                    <select class="form-control col-md-10 col-xs-12" name="gender" id="gender" >
                                        <option value="">--Select--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Others</option>
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                    <label for="blood_group">Blood Group <span class="required">*</span></label>
                                    <select class="form-control col-md-10 col-xs-12" name="blood_group" id="blood_group">
                                        <option value="">--Select--</option>
                                        <option value="a_positive">A+</option>
                                        <option value="a_negative">A-</option>
                                        <option value="b_positive">B+</option>
                                        <option value="b_negative">B-</option>
                                        <option value="o_positive">O+</option>
                                        <option value="o_negative">O-</option>
                                        <option value="ab_positive">AB+</option>
                                        <option value="ab_negative">AB-</option>
                                    </select>
                                    <div class="help-block"></div>
                                     @if ($errors->has('blood_group'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('blood_group') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('add_religion') ? ' has-error' : '' }}">
                                    <label for="religion">Religion <span class="required">*</span></label>
                                    <input class="form-control col-md-10 col-xs-12" name="religion" id="add_religion" value="" placeholder="Religion" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('add_religion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('add_religion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="item form-group {{ $errors->has('passport') ? ' has-error' : '' }}">
                                    <label for="health_condition">Passport (Optional)</label>
                                    <input class="form-control col-md-10 col-xs-12" name="passport_id" id="passport" value="" placeholder="Passport Id" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                     @if ($errors->has('passport'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passport') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
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
                            </div>
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
                                    <input class="form-control col-md-7 col-xs-12" name="father_name" id="father_name" value="" placeholder="Father Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="father_profession">Father Profession</label>
                                    <input class="form-control col-md-7 col-xs-12" name="father_profession" id="father_profession" value="" placeholder="Father Profession" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input class="form-control col-md-7 col-xs-12" name="mother_name" id="mother_name" value="" placeholder="Mother Name" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <label for="mother_profession">Mother Profession</label>
                                    <input class="form-control col-md-7 col-xs-12" name="mother_profession" id="mother_profession" value="" placeholder="Mother Profession" type="text" autocomplete="off">
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
                                    Student Document:
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="maindocument">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item form-group">
                                        <label for="type_id">Document Title</label>
                                        <input type="text" class="form-control" name="document_title[]" placeholder="Document Title">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item form-group">
                                        <label for="class_id">Document Type<span class="required"></span>
                                        </label>
                                        <select name="document_type[]" id="" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="file">FIle</option>
                                            <option value="image">Image</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item form-group">
                                        <label for="group_id">Document</label>
                                        <input type="file" class="form-control" name="document[]">
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
                                            Address Information:
                                            </strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label for="present_address">Present Address <span class="required">*</span></label>
                                    <textarea class="form-control textarea-4column" name="present_address" id="present_address" placeholder="Present Address"></textarea>
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
                                    <label for="permanent_address">Permanent Address <span class="required">*</span></label>
                                    <textarea class="form-control textarea-4column" name="permanent_address" id="permanent_address" placeholder="Permanent Address"></textarea>
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
                                        '<input type="text" class="form-control" name="document_title[]" required placeholder="Document Title">'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group">'+
                                        '<label for="class_id"><span class="required"></span>'+
                                       '</label>'+
                                        '<select name="document_type[]" id="" class="form-control" required>'+
                                            '<option value="">Select Type</option>'+
                                            '<option value="word">Word</option>'+
                                            '<option value="image">Image</option>'+
                                            '<option value="pdf">PDF</option>'+
                                        '</select>'+
                                        '<div class="help-block"></div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 col-sm-4 col-xs-12">'+
                                    '<div class="item form-group" style="display:flex">'+
                                        '<label for="group_id"></label>'+
                                        '<input type="file" class="form-control mt-4" name="document[]" required>'+
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
