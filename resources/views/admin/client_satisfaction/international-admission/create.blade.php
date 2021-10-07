
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
        <form class="kt-form kt-form--label-right" method="post" action='{{ url("dashboard/international/admission") }}'
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
                                            <h4 class="text-center">International Student Admission</h4>
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
                                    <div class="item form-group  {{ $errors->has('f_o_date') ? ' has-error' : '' }}">
                                        <label for="married">Student ID / Name: <span class="required">*</span>
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
                                        <div class="item form-group">
                                            <label for="student_name">Student name <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" readonly  id="student_name" value="" placeholder="ID number" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
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
                                        <div class="item form-group ">
                                            <label for="email">Institution <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12"  readonly id="university_name" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group ">
                                            <label for="email">Counselor <span class="required"></span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12"  readonly id="counselor_name" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('ex_particulars') ? ' has-error' : '' }}">
                                            <label for="ex_particulars">Expense Particulars <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" name="ex_particulars"  id="ex_particulars" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('ex_particulars'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ex_particulars') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('ex_amount') ? ' has-error' : '' }}">
                                            <label for="ex_amount">Expense Amount <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" name="ex_amount" id="ex_amount" value="" placeholder=""  autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('ex_amount'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ex_amount') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('pay_method') ? ' has-error' : '' }}">
                                            <label for="gender">Payment Method<span class="required">*</span>
                                            </label>
                                            <select class="form-control col-md-10 col-xs-12" name="pay_method" id="pay_method" >
                                                <option value="">--Select--</option>
                                                <option value="1">Card</option>
                                                <option value="2">Bank</option>
                                                <option value="3">check</option>
                                                <option value="4">Master Card</option>
                                                <option value="5">Credit Card</option>
                                                <option value="6">Visa Card</option>
                                            </select>
                                            <div class="help-block"></div>
                                            @if ($errors->has('pay_method'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pay_method') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('card_holder') ? ' has-error' : '' }}">
                                            <label for="name">Card Holder <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" name="card_holder" id="card_holder" value="{{ old('card_holder') }}" placeholder="" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                            <div class="help-block"></div>
                                            @if ($errors->has('card_holder'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card_holder') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('f_o_date') ? ' has-error' : '' }}">
                                            <label for="f_o_date">File Open Date <span class="required">*</span>
                                            </label>
                                            <input class="form-control col-md-10 col-xs-12" id="kt_datepicker_1" name="f_o_date"  value="" placeholder="dd-mm-yy" type="text" autocomplete="off">
                                            <div class="help-block"></div>
                                            @if ($errors->has('f_o_date'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('f_o_date') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <div class="item form-group {{ $errors->has('remark') ? ' has-error' : '' }}">
                                            <label for="remark">Remark <span class="required"></span>
                                            </label>
                                            <textarea style="height: 150px" class="form-control col-md-12 col-xs-12" name="remark" ></textarea>

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
               }

           });
       })
    });
</script>

@endpush
