                                <!--begin:: Widgets/Trends-->
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                                Overviews
                                        </h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                                        @if ($student->student_status == 'Guest')
                                       <div class="row">
                                           <div class="col-md-10 m-auto">
                                            <h5>Now You are a guest. If you interested to addmission please apply this form</h5><br>
                                            <a href="{{ route('add_student_admission') }}" class="btn btn-primary btn-block mb-5">Apply This Form</a>
                                           </div>
                                       </div>
                                        @elseif($student->student_status == 'Student')
                                        @endif
                                    </div>
                                    @if ($student->student_status == 'Student')
                                    <div class="kt-portlet__body  kt-portlet__body--fit">
                                        <div class="row">
                                            <div class="col-md-4 col-xl-3">
                                                <!--begin::Stats Widget 30-->
                                                <div class="card card-custom bg-info card-stretch gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <span class="svg-icon svg-icon-2x svg-icon-white">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group.svg-->
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
                                                                    <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
                                                                    <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon-->
                                                         </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ $student->interestcountry->sum('addmission_fees') }}</span>
                                                        <span class="font-weight-bold text-white font-size-sm">Total Addmission Fees</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Stats Widget 30-->
                                            </div>
                                            <div class="col-md-4 col-xl-3">
                                                <!--begin::Stats Widget 31-->
                                                <div class="card card-custom bg-danger card-stretch gutter-b">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <span class="svg-icon svg-icon-2x svg-icon-white">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                                                    <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                                                    <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                                                    <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ count($student->interestcountry) }}</span>
                                                        <span class="font-weight-bold text-white font-size-sm">Total Interested Country</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Stats Widget 31-->
                                            </div>
                                            <div class="col-md-4 col-xl-3">
                                                @php
                                                $check = $student->interestcountry->where('adminssion_status',1)->first();
                                                @endphp
                                                <!--begin::Stats Widget 26-->
                                                <div class="card card-custom bg-light-danger card-stretch gutter-b">
                                                    <!--begin::ody-->
                                                    <div class="card-body">
                                                        <span class="svg-icon svg-icon-2x svg-icon-danger">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group.svg-->
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Price1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">Tk {{ $check->total_course_fees ?? "000" }}</span>
                                                        <span class="font-weight-bold text-muted font-size-sm">Total Tution Fees</span>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Stats Widget 26-->
                                            </div>
                                        </div>
                                    </div>

                                    {{--  <div class="kt-portlet__body  kt-portlet__body--fit">

                                        <div class="row">
                                            <div class="col-md-10 m-auto">
                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">ID Number</label>
                                                        <div class="col-md-8 col-sm-7  col-lg-8 col-xl-8">
                                                            <input class="form-control" disabled name="id_no" type="text" value="{{ $student->id_no }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Full Name</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <input class="form-control" disabled name="name" type="text" value="{{ $student->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Date Of Birth</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <input class="form-control" disabled name="dob" type="text" value="{{ $student->dob }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Email Address</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group ">
                                                                <div class="input-group-prepend">	<span class="input-group-text">
                                                                        <i class="la la-at"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" disabled name="email" value="{{ $student->email }}" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Phone</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" disabled name="phone" value="{{ $student->phone }}" placeholder="Phone">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Parmanent Address</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group">
                                                                <textarea class="form-control" disabled name="permanent_address" name="address" id="" cols="30" rows="3">
                                                                    {{ $student->permanent_address }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Present Address</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group">
                                                                <textarea disabled class="form-control" name="present_address" name="address" id="" cols="30" rows="3">
                                                                    {{ $student->present_address }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>  --}}
                                    @endif
                                </div>


                                <!--end:: Widgets/Trends-->
