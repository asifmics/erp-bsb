                        <div class="col-xl-6">
                            <!--begin:: Widgets/Order Statistics-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Salary Statistics
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fluid">
                                    <div class="kt-widget12">
                                        <div class="kt-widget12__content">
                                            <div class="kt-widget12__item">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td>Description</td>
                                                            <td>Amount</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total_salary = 0;
                                                        @endphp
                                                        @foreach ($employee->salary_details as $string)
                                                        <tr>
                                                            <td>{{$string->string_details->name}}</td>
                                                            <td>{{$string->amount}}</td>
                                                            @php
                                                                $total_salary += $string->amount;
                                                            @endphp
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">Total Salary</span>
                                                    <span class="kt-widget12__value">BDT {{$total_salary}}</span>
                                                </div>
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">Salary Scale</span>
                                                    <span class="kt-widget12__value">{{$employee->salary_scale ? $employee->salary_scale_details->name : 'Custom'}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end:: Widgets/Order Statistics-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin:: Widgets/Order Statistics-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            All Certificate
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fluid">
                                    <div class="kt-widget12">
                                        <div class="kt-widget12__content">
                                            <div class="kt-widget12__item">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 80%">Tax Certificate</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_tax_certificate',$employee->slug) }}" >Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_tax_certificate_pdf',$employee->slug) }}">PDF</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80%">Salary Certificate</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_salary_certificate', $employee->slug) }}" >Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_salary_certificate_pdf' ,$employee->slug) }}">PDF</a></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80%">Experiance Certificate</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_experiance_certificate',$employee->slug) }}">Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_experiance_certificate_pdf',$employee->slug) }}">PDF</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80%">Payslip</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_payslip_certificate',$employee->slug) }}">Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_payslip_certificate_pdf',$employee->slug) }}">PDF</a></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80%">Attendance Report</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_attendance_certificate',$employee->slug) }}">Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_attendance_certificate_pdf',$employee->slug) }}">PDF</a></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80%">Employee Information</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_information',$employee->slug) }}">Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_information_pdf',$employee->slug) }}">PDF</a></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 80%">Increment Letter</td>
                                                            <td style="width: 10%"><a href="{{ route('emp_increment_letter',$employee->slug) }}">Download</a></td>
                                                            <td style="width: 10%"><a href="{{ route('emp_increment_letter_pdf',$employee->slug) }}">PDF</a></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end:: Widgets/Order Statistics-->
                        </div>

                        <div class="col-xl-6">
                            <!--begin:: Widgets/Last Updates-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Latest Updates
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle"
                                            data-toggle="dropdown">
                                            Today
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Nav-->
                                            <ul class="kt-nav">
                                                <li class="kt-nav__head">
                                                    Export Options
                                                    <span data-toggle="kt-tooltip" data-placement="right"
                                                        title="Click to learn more...">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1"
                                                            class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10" />
                                                                <rect fill="#000000" x="11" y="10" width="2" height="7"
                                                                    rx="1" />
                                                                <rect fill="#000000" x="11" y="7" width="2" height="2"
                                                                    rx="1" />
                                                            </g>
                                                        </svg> </span>
                                                </li>
                                                <li class="kt-nav__separator"></li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                        <span class="kt-nav__link-text">Activity</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                        <span class="kt-nav__link-text">FAQ</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                                        <span class="kt-nav__link-text">Settings</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                        <span class="kt-nav__link-text">Support</span>
                                                        <span class="kt-nav__link-badge">
                                                            <span
                                                                class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__separator"></li>
                                                <li class="kt-nav__foot">
                                                    <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade
                                                        plan</a>
                                                    <a class="btn btn-clean btn-bold btn-sm" href="#"
                                                        data-toggle="kt-tooltip" data-placement="right"
                                                        title="Click to learn more...">Learn more</a>
                                                </li>
                                            </ul>
                                            <!--end::Nav-->
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    <!--begin::widget 12-->
                                    <div class="kt-widget4">
                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon-pie-chart-1 kt-font-info"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                Metronic v6 has been arrived!
                                            </a>
                                            <span class="kt-widget4__number kt-font-info">+500</span>
                                        </div>

                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon-safe-shield-protection  kt-font-success"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                Metronic community meet-up 2019 in Rome.
                                            </a>
                                            <span class="kt-widget4__number kt-font-success">+1260</span>
                                        </div>

                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon2-line-chart kt-font-danger"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                Metronic Angular 8 version will be landing soon...
                                            </a>
                                            <span class="kt-widget4__number kt-font-danger">+1080</span>
                                        </div>

                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon2-pie-chart-1 kt-font-primary"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                ale! Purchase Metronic at 70% off for limited time
                                            </a>
                                            <span class="kt-widget4__number kt-font-primary">70% Off!</span>
                                        </div>

                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon2-rocket kt-font-brand"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                Metronic VueJS version is in progress. Stay tuned!
                                            </a>
                                            <span class="kt-widget4__number kt-font-brand">+134</span>
                                        </div>

                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon2-notification kt-font-warning"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                Black Friday! Purchase Metronic at ever lowest 90% off for limited time
                                            </a>
                                            <span class="kt-widget4__number kt-font-warning">70% Off!</span>
                                        </div>

                                        <div class="kt-widget4__item">
                                            <span class="kt-widget4__icon">
                                                <i class="flaticon2-file kt-font-success"></i>
                                            </span>
                                            <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                                Metronic React version is in progress.
                                            </a>
                                            <span class="kt-widget4__number kt-font-success">+13%</span>
                                        </div>
                                    </div>
                                    <!--end::Widget 12-->
                                </div>
                            </div>
                            <!--end:: Widgets/Last Updates-->
                        </div>
