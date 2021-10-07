<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Updates and statistics">
	<title>ERP :: Dashboard @yield('title') </title>
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/googlefont.css">
	<link href="{{asset('contents/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
	<script src="{{asset('contents/admin')}}/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
    <script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js" type="text/javascript"></script>

    {{-- Toster Css --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    @stack('css')
</head>

<body
	class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="{{url('dashboard')}}">
				<img alt="Logo" src="{{asset('contents/admin')}}/assets/media/logos/logo.png" />
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
				id="kt_aside_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
					class="flaticon-more"></i></button>
		</div>
	</div>
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
				id="kt_aside">
				<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
					<div class="kt-aside__brand-logo">
						<a href="{{url('dashboard')}}">
							<img alt="Logo" src="{{asset('contents/admin')}}/assets/media/logos/logo.png" />
						</a>
					</div>
					<div class="kt-aside__brand-tools">
						<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
							<span class="flaticon2-fast-back"></span>
							<span class="flaticon2-fast-next"></span>
						</button>
					</div>
				</div>
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
						data-ktmenu-dropdown-timeout="500">
						<ul class="kt-menu__nav ">
							<li class="kt-menu__item  kt-menu__item--active">
								<a href="{{url('dashboard')}}" class="kt-menu__link ">
									<span class="kt-menu__link-icon fa fa-home"></span>
									<span class="kt-menu__link-text">Dashboard</span>
								</a>
							</li>
							{{-- <li class="kt-menu__item  kt-menu__item">
								<a href="{{url('dashboard/user')}}" class="kt-menu__link ">
									<span class="kt-menu__link-icon fa fa-user-circle"></span>
									<span class="kt-menu__link-text">Users</span>
								</a>
							</li> --}}
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fa fa-cog"></span>
									<span class="kt-menu__link-text">Manage ERP</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
                                        @can('all_user','insert_user','view_user','edit_user','delete_user')
										<li class="kt-menu__item ">
											<a href="{{url('dashboard/user')}}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Users</span>
											</a>
                                        </li>
                                        @endcan
										<li class="kt-menu__item ">
											<a href="{{ route('all_requsition') }}" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Student Requsition</span>
											</a>
                                        </li>
                                        <li class="kt-menu__item ">
											<a href="{{route('all_student_status')}}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Student Status</span>
											</a>
                                        </li>
                                        @can('all_role','insert_role','view_role','edit_role','delete_role')
										<li class="kt-menu__item ">
											<a href="{{ route('roles') }}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Roles And Permissions</span>
											</a>
                                        </li>
                                        @endcan
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Contact Information</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Email Configuration</span>
											</a>
										</li> --}}
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Settings</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fa fa-universal-access"></span>
									<span class="kt-menu__link-text">Human Resource</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								@include('layouts.partials.nav.hr')
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fa fa-money-check"></span>
									<span class="kt-menu__link-text">Accounts</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								@include('layouts.partials.nav.accounts')
                            </li>


							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fa fa-user-tie"></span>
									<span class="kt-menu__link-text">Employee Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">

										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Employee Asset Management</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Employee Payment Management</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Employee Leave Management</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Employee Exit Management</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Employee Report</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon flaticon-rotate"></span>
									<span class="kt-menu__link-text">Client Satisfaction</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Response</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    @can('all_client_response','edit_client_response','delete_client_response','inser_client_response')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_cs_survey')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Response</span>
                                                        </a>
                                                    </li>
                                                    @endcan

                                                </ul>
                                            </div>
										</li>
										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Question</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    @can('insert_client_question')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('add_cs_question')}}" class="kt-menu__link ">
                                                            <i
                                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">Add Question</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                    @can('edit_client_question','delete_client_question','all_client_question')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_cs_question')}}" class="kt-menu__link ">
                                                            <i
                                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Question</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </div>
										</li>
										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Complain</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    @can('all_complain','edit_complain','insert_complain','delete_complain')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_complain')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Complain</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </div>
										</li>

									</ul>
								</div>
                            </li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon flaticon-rotate"></span>
									<span class="kt-menu__link-text">Loan Management</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">

										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Loan Details</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    @can('insert_loan_details')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('add_loan')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">Add Loan</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                    @can('all_loan_details','edit_loan_details','delete_loan_details')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_loan')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Loan</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </div>
										</li>
										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Installment</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('add_installment')}}" class="kt-menu__link ">
                                                            <i
                                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">Add Installment</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_installment')}}" class="kt-menu__link ">
                                                            <i
                                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Installment</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="kt-menu__item ">
                                            <a href="{{ route('loan_report_search') }}" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Loan Report</span>

                                            </a>
                                        </li>

									</ul>
								</div>
                            </li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon flaticon-rotate"></span>
									<span class="kt-menu__link-text">Event Management</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">

										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Event</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    @can('insert_event')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('add_event')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">Add Event</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                    @can('all_event','edit_event','delete_event')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_event')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Event</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </div>
										</li>
										<li class="kt-menu__item ">
                                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <span class="kt-menu__link-icon fa fa-money-check"></span>
                                                <span class="kt-menu__link-text">Ads</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                <ul class="kt-menu__subnav">
                                                    @can('insert_advertisment')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('add_ads')}}" class="kt-menu__link ">
                                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">Add Ads</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                    @can('all_advertisment','edit_advertisment','delete_advertisment')
                                                    <li class="kt-menu__item ">
                                                        <a href="{{route('all_ads')}}" class="kt-menu__link ">
                                                            <i
                                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                            <span class="kt-menu__link-text">All Ads</span>
                                                        </a>
                                                    </li>
                                                    @endcan
                                                </ul>
                                            </div>
										</li>


									</ul>
								</div>
                            </li>


							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon flaticon-rotate"></span>
									<span class="kt-menu__link-text">Student Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
                                        @can('all_student','edit_student','delete_student')
										<li class="kt-menu__item ">
											<a href="{{ route('all_student') }}" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All Student</span>
											</a>
                                        </li>
                                        @endcan
                                        @can('insert_student')
										<li class="kt-menu__item ">
											<a href="{{ route('add_student') }}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Add Student</span>
											</a>
                                        </li>
                                        @endcan
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Student Payment</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Student Report</span>
											</a>
										</li> --}}
									</ul>
								</div>
                            </li>

							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon flaticon2-avatar"></span>
									<span class="kt-menu__link-text">Guest Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
                                        @can('all_guest','edit_guest','delete_guest')
										<li class="kt-menu__item ">
											<a href="{{ route('all_guest_student') }}" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All Guest Information</span>
											</a>
                                        </li>
                                        @endcan
                                        @can('insert_guest')
										<li class="kt-menu__item ">
											<a href="{{route('add_guest_student')}}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Add Guest Information</span>
											</a>
                                        </li>
                                        @endcan
										<li class="kt-menu__item ">
											<a href="{{ route('calllists') }}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Guest Call Report</span>
											</a>
										</li>
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Guest Report</span>
											</a>
										</li> --}}
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fa fa-smile"></span>
									<span class="kt-menu__link-text">Counsellor Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">

										<li class="kt-menu__item ">
											<a href="{{ route('all_counsellor') }}" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All Counsellor</span>
											</a>
										</li>
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Add Counsellor</span>
											</a>
										</li> --}}
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Counsellor Commission</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Counsellor Report</span>
											</a>
										</li> --}}
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fab fa-buysellads"></span>
									<span class="kt-menu__link-text">Agent Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
										<li class="kt-menu__item ">
											<a href="{{ route('all_agent') }}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All Agent Information</span>
											</a>
										</li>
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Add Agent Information</span>
											</a>
										</li> --}}
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Agent Commission</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Agent Report</span>
											</a>
										</li> --}}
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fab fa-buysellads"></span>
									<span class="kt-menu__link-text">Receptionist Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
										<li class="kt-menu__item ">
											<a href="{{ route('all_receptionist') }}" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All Receptionist Information</span>
											</a>
										</li>
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Add Agent Information</span>
											</a>
										</li> --}}
										{{-- <li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Receptionist Commission</span>
											</a>
										</li>
										<li class="kt-menu__item ">
											<a href="#" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">Receptionist Report</span>
											</a>
										</li> --}}
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon fa fa-university"></span>
									<span class="kt-menu__link-text">University Information</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
                                        @can('all_university','edit_university','delete_university','insert_university')
										<li class="kt-menu__item ">
											<a href="{{url('dashboard/university')}}" class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All University</span>
											</a>
                                        </li>
                                        @endcan
                                        @can('all_university_program','edit_university_program','insert_university_program','delete_university_program')
										<li class="kt-menu__item ">
											<a href="{{url('dashboard/university/program')}}" class="kt-menu__link ">
												<i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">All University Program</span>
											</a>
                                        </li>
                                        @endcan
                                        @can('all_university_program_category','insert_university_program_category','edit_university_program_category')
										<li class="kt-menu__item ">
											<a href="{{url('dashboard/university/program/category')}}"
												class="kt-menu__link ">
												<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
												<span class="kt-menu__link-text">University Program Category</span>
											</a>
                                        </li>
                                        @endcan
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item">
								<a href="{{url('dashboard/country')}}" class="kt-menu__link ">
									<span class="kt-menu__link-icon flaticon-placeholder-3"></span>
									<span class="kt-menu__link-text">Country Information</span>
								</a>
							</li>
							{{-- <li class="kt-menu__item  kt-menu__item">
								<a href="#" class="kt-menu__link ">
									<span class="kt-menu__link-icon fa fa-file-download"></span>
									<span class="kt-menu__link-text">Official Document</span>
								</a>
							</li> --}}
							<li class="kt-menu__item  kt-menu__item">
								<a href="{{ route('recycle_all') }}" class="kt-menu__link ">
									<span class="kt-menu__link-icon fa fa-trash-restore"></span>
									<span class="kt-menu__link-text">Recycle</span>
								</a>
							</li>
							<li class="kt-menu__item  kt-menu__item">
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();document.getElementById('logout-form').submit();"
									class="kt-menu__link ">
									<span class="kt-menu__link-icon fa fa-power-off"></span>
									<span class="kt-menu__link-text">Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
					<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

					</div>
					<div class="kt-header__topbar">
						<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown"
							id="kt_quick_search_toggle">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
								<span class="kt-header__topbar-icon flaticon2-search-1"></span>
							</div>
							<div
								class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
								<div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact"
									id="kt_quick_search_dropdown">
									<form method="get" class="kt-quick-search__form">
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text"><i
														class="flaticon2-search-1"></i></span>
											</div>
											<input type="text" class="form-control kt-quick-search__input"
												placeholder="Search...">
											<div class="input-group-append"><span class="input-group-text"><i
														class="la la-close kt-quick-search__close"></i></span>
											</div>
										</div>
									</form>
									<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325"
										data-mobile-height="200"></div>
								</div>
							</div>
						</div>
						<!--end: Search -->
						<!--end: Search -->
						<!--begin: Notifications -->
						<div class="kt-header__topbar-item dropdown">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px"
								aria-expanded="true">
								<span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
									<span class="kt-pulse__ring"></span>
									<i class="flaticon2-list-1"></i>
								</span>
							</div>
							<div
								class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
							</div>
						</div>
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
								<div class="kt-header__topbar-user"> <span
										class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
									<span
										class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->name}}</span>
									<img class="kt-hidden" alt="Pic"
										src="{{asset('contents/admin')}}/assets/media/users/300_25.jpg" />
									<span
										class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
								</div>
							</div>
							<div
								class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
								<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
									style="background-image: url({{asset('contents/admin')}}/assets/media/misc/bg-1.jpg)">
									<div class="kt-user-card__avatar">
										<img class="kt-hidden" alt="Pic"
											src="{{asset('contents/admin')}}/assets/media/users/300_25.jpg" />
										<span
											class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
									</div>
									<div class="kt-user-card__name">{{Auth::user()->name}}</div>
									<div class="kt-user-card__badge"> <span
											class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
									</div>
								</div>
								<!--end: Head -->
								<!--begin: Navigation -->
								<div class="kt-notification">
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon"> <i
												class="flaticon2-calendar-3 kt-font-success"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">My Profile</div>
											<div class="kt-notification__item-time">Account settings and more</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon"> <i
												class="flaticon2-mail kt-font-warning"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">My Messages</div>
											<div class="kt-notification__item-time">Inbox and tasks</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon"> <i
												class="flaticon2-rocket-1 kt-font-danger"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">My Activities</div>
											<div class="kt-notification__item-time">Logs and notifications</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon"> <i
												class="flaticon2-hourglass kt-font-brand"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">My Tasks</div>
											<div class="kt-notification__item-time">latest tasks and projects</div>
										</div>
									</a>
									<div class="kt-notification__custom kt-space-between">
										<a href="{{ route('logout') }}"
											onclick="event.preventDefault();document.getElementById('logout-form').submit();"
											class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
					<div class="kt-subheader  kt-grid__item" id="kt_subheader">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">Dashboard</h3>
								<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
									<input type="text" class="form-control" placeholder="Search order..."
										id="generalSearch"> <span
										class="kt-input-icon__icon kt-input-icon__icon--right">
										<span><i class="flaticon2-search-1"></i></span>
									</span>
								</div>
							</div>
							<div class="kt-subheader__toolbar">

							</div>
						</div>
					</div>
					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
						@yield('content')
					</div>
				</div>
				<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-footer__copyright">
							Copyright &copy; 2020 | All right reserved BSB Global Network.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="kt_scrolltop" class="kt-scrolltop"> <i class="fa fa-arrow-up"></i></div>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
	<script src="{{asset('contents/admin')}}/assets/js/scripts.bundle.js" type="text/javascript"></script>
	<script src="{{asset('contents/admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"
		type="text/javascript"></script>
	<script src="{{asset('contents/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"
		type="text/javascript"></script>
	<script src="{{asset('contents/admin')}}/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"
		type="text/javascript"></script>
	<script src="{{asset('contents/admin')}}/assets/js/pages/crud/forms/widgets/select2.js" type="text/javascript">
	</script>
	<script src="{{asset('contents/admin')}}/assets/js/pages/crud/file-upload/ktavatar.js" type="text/javascript">
	</script>
	<script src="{{asset('contents/admin')}}/assets/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom.js" type="text/javascript"></script>
     {{-- Toster alert js --}}
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @stack('js')
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>
</body>

</html>
