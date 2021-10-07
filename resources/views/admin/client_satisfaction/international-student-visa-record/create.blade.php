
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
        <form class="kt-form kt-form--label-right" method="post" action='{{ url("dashboard/international/admission/visa") }}'
              enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">

                    </h3>
                </div>

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
                                            <h4 class="text-center">Add Record Of International Student Admission Visa </h4>
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
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="item form-group  {{ $errors->has('student_id') ? ' has-error' : '' }}">
                                        <label for="married">Bsb ID / Student ID /  Name: <span class="required">*</span>
                                        </label>

                                        <select class="form-control kt-select2 studentChooseId" id="kt_select2_1" name="student_id" >
                                                     <option value="" >Choose Student ID / Name</option>
                                            @foreach($students as $student)
                                                <option value="{{ $student->id}}" >{{$student->id_no . ' / ' . ( $student->name) }}  </option>
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                        @if ($errors->has('student_id'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <style>
                                .required{
                                    color: red;
                                    font-weight: bold;
                                    font-size: 16px;
                                }
                            </style>

                            <div class="form-part">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group ">
                                            <label for="email">Counselor <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12"  readonly id="counselor_name" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="student_name">Student name <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" readonly  id="student_name" value="" placeholder="" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                            <div class="help-block"></div>


                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group ">
                                            <label for="phone_number">Contact Number <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12"   readonly id="phone_number" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group ">
                                            <label for="email">Country <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12"   readonly id="country_name" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('offer_letter_form') ? ' has-error' : '' }}">
                                            <label for="offer_letter_form">Offer Letter Form <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" name="offer_letter_form"  id="offer_letter_form" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('offer_letter_form'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('offer_letter_form') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('admission_on_pro') ? ' has-error' : '' }}">
                                            <label for="admission_on_pro">Admission On Programmer <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" name="admission_on_pro" id="admission_on_pro" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('admission_on_pro'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('admission_on_pro') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('overseas') ? ' has-error' : '' }}">
                                            <label for="overseas">Overseas Will Start On <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="overseas"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('overseas'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overseas') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('purpose') ? ' has-error' : '' }}">
                                            <label for="purpose">Purpose<span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" name="purpose"  id="purpose" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('purpose'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purpose') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('overseas') ? ' has-error' : '' }}">
                                            <label for="overseas">Overseas Will Start On <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="overseas"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('overseas'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overseas') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('submit_on') ? ' has-error' : '' }}">
                                            <label for="submit_on">Submit All Page On <span class="required">*</span></label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="submit_on"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('submit_on'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('submit_on') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('notary_on') ? ' has-error' : '' }}">
                                            <label for="submit_on">Notary, Translation Photocopy Given On <span class="required">*</span></label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="notary_on"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('notary_on'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notary_on') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('received_no') ? ' has-error' : '' }}">
                                            <label for="received_no">Received,Ntp On <span class="required">*</span></label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="received_no"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('received_no'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('received_no') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('appointment_on') ? ' has-error' : '' }}">
                                            <label for="appointment_on">Appointment, At Vf's On <span class="required">*</span></label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="appointment_on"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('appointment_on'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('appointment_on') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('file_submit_on') ? ' has-error' : '' }}">
                                            <label for="file_submit_on">File Submited On<span class="required">*</span></label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="file_submit_on"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('file_submit_on'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file_submit_on') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('remark') ? ' has-error' : '' }}">
                                            <label for="remark">Remark <span class="required"></span>
                                            </label>
                                            <textarea style="height: 150px" class="form-control col-md-12 col-xs-12" name="remark" >{{ old('remark') }}</textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('laps') ? ' has-error' : '' }}">
                                            <label for="laps">LAPS <span class="required"></span>
                                            </label>
                                            <textarea style="height: 150px" class="form-control col-md-12 col-xs-12" name="laps" >{{ old('remark') }}</textarea>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="checkbox checkbox-outline checkbox-success">Active
                                                <input id="" class="ml-2 " value="1" type="checkbox" name="status" style="position: absolute; top: 4px;" checked>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="ln_solid">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 margin-top text-center">
                                        <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Add International Student Admission</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

        </form>
    </div>

@endsection
@push('js')
<script>
    $(document).ready(function () {
        //$('.form-part').css({"display": "none"});
       $('.studentChooseId').on('change',function () {
           $('.form-part').css({"display": "block"});
           let studentID = $(this).val();
           $.ajax({
               url:'{{url("dashboard/international/admission/info")}}',
               type:'post',
               data: {
                   '_token': "{{ csrf_token() }}",
                   'student_id': studentID
               },
               success:function (response) {
                  // alert(response.data);
                   $('#student_name').val(response.data['name']);
                   $('#country_name').val(response.data.interestcountry_active_status[0].country['name']);
                   $('#university_name').val(response.data.interestcountry_active_status[0].university['name']);
                   $('#counselor_name').val(response.data.counsellorganerate['name']);
                   $('#phone_number').val(response.data['phone']);
               }

           });
       })
    });
</script>

@endpush
