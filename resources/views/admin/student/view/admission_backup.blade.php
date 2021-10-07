                                <!--begin:: Widgets/Trends-->
                                <style>
                                    .required{
                                        color: red;
                                        font-weight: bold;
                                    }
                                </style>
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">

                                        </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">

                                        </div>
                                    </div>
                                    <div class="  kt-portlet__body--fit">

                                        <form action="{{ route('save_student_admission') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $student->id }}">
                                            <input type="hidden" name="slug" value="{{ $student->slug }}">
                                            <div class="row">
                                                <div class="col-md-12 m-auto">

                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="admission-form">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                                    <div class="admission-address">
                                                                        <div>
                                                                            <h4 class="text-center">Admission Form</h4>
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
                                                                {{-- <div class="col-md-12 col-sm-12">
                                                                    <p class="admission-form-title" ><strong>Basic Information:</strong>
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                            <style>
                                                                label{
                                                                    font-weight: 550 !important;
                                                                }
                                                            </style>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
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

                                                               <div class="col-md-6 col-sm-12 col-xs-2">
                                                                <div class="item form-group {{ $errors->has('admission_date') ? ' has-error' : '' }}">
                                                                    <label for="admission_date">Date<span class="required">*</span>
                                                                    </label>
                                                                    @php
                                                                        $date =(new DateTime("now"))->format('y-m-d');
                                                                    @endphp
                                                                    <input class="form-control col-md-12 col-xs-12" id="kt_datepicker_1" name="admission_date" value="{{ $date }}"  type="text" autocomplete="off" >
                                                                    <div class="help-block"></div>
                                                                     @if ($errors->has('admission_date'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('admission_date') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                               </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('apply_for') ? ' has-error' : '' }}">
                                                                        <label for="to">Application For <span class="required"></span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="apply_for" id="to"  placeholder="Enter Application For" type="text">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('apply_for'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('apply_for') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                                        <label for="name">Applicants Name<span class="required">*</span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="name" id="name" placeholder="Enter Applicant Name" type="text" value="{{ old('name') ?? ($student->name ?? '') }}"">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                                        <label for="country">Country <span class="required">*</span></label>
                                                                        @php
                                                                            $countries = App\Country::all();
                                                                        @endphp
                                                                        <select name="nationality" id="" class="form-control col-md-12 col-xs-12">
                                                                            <option >Select Country</option>
                                                                            @foreach ($countries as $country)
                                                                            <option data-id="{{ $country->reg_fees }}" value="{{ $country->id }}">{{ $country->name }}</option>

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
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('university') ? ' has-error' : '' }}">
                                                                        <label for="country">University/College <span class="required">*</span></label>
                                                                        <select name="university" id="" class="form-control col-md-12 col-xs-12">

                                                                        </select>
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('university'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('university') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('course_category') ? ' has-error' : '' }}">
                                                                        <label for="country">Course Category <span class="required">*</span></label>
                                                                        <select name="course_category" id="" class="form-control col-md-12 col-xs-12">
                                                                        </select>
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('course_category'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('course_category') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('course') ? ' has-error' : '' }}">
                                                                        <label for="country">Course <span class="required">*</span></label>
                                                                        <select name="course" id="" class="form-control col-md-12 col-xs-12">

                                                                        </select>

                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('course'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('course') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('reg_fees') ? ' has-error' : '' }}">
                                                                        <label for="reg_fees">Application / Reg-Fees<span class="required">*</span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="reg_fees" id="reg_fees"  placeholder="Reg fees" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('reg_fees'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('reg_fees') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('tution_fees') ? ' has-error' : '' }}">
                                                                        <label for="tution_fees">Tution Fees (Per S/Y)<span class="required">*</span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="tution_fees" id="tution_fees"  placeholder="Tution Fees" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('tution_fees'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('tution_fees') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('total_course_fees') ? ' has-error' : '' }}">
                                                                        <label for="total_course_fees">Totall Course Fees<span class="required">*</span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="total_course_fees" id="total_course_fees"  placeholder="Totall Course Fees" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('total_course_fees'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('total_course_fees') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('mode_of_payment') ? ' has-error' : '' }}">
                                                                        <label for="mode_of_payment">Mode of Payment<span class="required">*</span>
                                                                        </label>
                                                                        <select name="mode_of_payment" id="" class="form-control">
                                                                            <option value="">Please Select</option>
                                                                            <option value="Cash">Cash</option>
                                                                            <option value="Bank">Bank</option>
                                                                            <option value="Check">Check</option>
                                                                            <option value="Mastercard">Mastercard</option>
                                                                            <option value="CreditCard">CreditCard</option>
                                                                            <option value="Visacard">Visacard</option>
                                                                        </select>
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('mode_of_payment'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('mode_of_payment') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('living_cost') ? ' has-error' : '' }}">
                                                                        <label for="living_cost">Living Cost<span class="required"></span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="living_cost" id="living_cost"  placeholder="Living Cost" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('living_cost'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('living_cost') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('job_permission') ? ' has-error' : '' }}">
                                                                        <label for="job_permission">Job Permission<span class="required"></span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="job_permission" id="job_permission"  placeholder="Job permission" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('job_permission'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('job_permission') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('application_deadline') ? ' has-error' : '' }}">
                                                                        <label for="application_deadline">Application Deadline<span class="required">*</span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="application_deadline" id="application_deadline"  placeholder="Application Deadline" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('application_deadline'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('application_deadline') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('commencement_date') ? ' has-error' : '' }}">
                                                                        <label for="commencement_date">Commencement Date<span class="required"></span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="commencement_date" id="kt_datepicker_1"  placeholder="Date" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('commencement_date'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('commencement_date') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('visa_fees') ? ' has-error' : '' }}">
                                                                        <label for="visa_fees">Visa Fees<span class="required"></span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="visa_fees" id="visa_fees"  placeholder="Visa Fees" type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('visa_fees'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('visa_fees') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('embassy_address') ? ' has-error' : '' }}">
                                                                        <label for="embassy_address">Embassy Address<span class="required">*</span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="ambassy_address" id="embassy_address"  placeholder="Embassy Address " type="text" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('embassy_address'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('embassy_address') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('air_tiket') ? ' has-error' : '' }}">
                                                                        <label for="air_tiket">Air Tiket<span class="required"></span>
                                                                        </label>
                                                                        <input class="form-control col-md-12 col-xs-12" name="air_tiket" id="air_tiket"  placeholder="Air Tiket" type="text">
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('air_tiket'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('air_tiket') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('comments') ? ' has-error' : '' }}">
                                                                        <label for="religion">Comments</label>
                                                                        <textarea class="form-control col-md-12 col-xs-12" name="comments" id="" cols="30" rows="4"></textarea>
                                                                        <div class="help-block"></div>
                                                                         @if ($errors->has('comments'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('comments') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="item form-group {{ $errors->has('counsellor') ? ' has-error' : '' }}">
                                                                        <label for="counsellor">Co-ordinetor/ Counsellor<span class="required">*</span>
                                                                        </label>
                                                                        @php
                                                                        $counsellor =App\Employee::where('designation_id',1)->get();
                                                                        @endphp
                                                                        <select class="form-control kt-select2" id="kt_select2_2" name="counsellor">
                                                                            <option >Select Ref By</option>
                                                                            @foreach($counsellor as $item)
                                                                            <option value="{{$item->id}}" >{{$item->name}} / Branch: {{ $item->branch_details->name }}</option>
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
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 margin-top text-center">
                                                                    <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Add New Student</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <!--end:: Widgets/Trends-->

                                @push('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>


<script type="text/javascript">
	  $(document).ready(function() {
         $('select[name="nationality"]').on('change', function(){
            var fees= $(this).find(':selected').data('id');
            $('input[name="reg_fees"]').val(fees);
             var country_id = $(this).val();
             if(country_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/country/') }}/"+country_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       var d =$('select[name="university"]').empty();
                       $('select[name="university"]').append('<option value="">'+'Please Select University'+'</option>');
                           $.each(data, function(key, value){
                               $('select[name="university"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                           });
                     },

                 });
             } else {

             }

         });

         $('select[name="university"]').on('change', function(){
             var course_id = $(this).val();
             if(course_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course-category/') }}/"+course_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                       var d =$('select[name="course_category"]').empty();
                               $('select[name="course_category"]').append(data);

                     },

                 });
             } else {

             }
         });

         $('select[name="course_category"]').on('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             var cat_id = $(this).val();
            var university = $('select[name="university"]').val();
             if(cat_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course/') }}",
                     type:"POST",
                     data:{cat_id:cat_id,university:university},
                     success:function(data) {
                       var d =$('select[name="course"]').empty();
                               $('select[name="course"]').append(data);

                     },

                 });
             } else {

             }
         });

         $('select[name="course"]').on('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             var course = $(this).val();
            var university = $('select[name="university"]').val();
            var category = $('select[name="course_category"]').val();
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
