@extends('layouts.admin')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        @if (Session::has('success'))
        <script type="text/javascript">
            swal({
                title: "Success!",
                text: "Updated Successfully.",
                icon: "success",
                button: "OK",
                timer: 5000,
            });

        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            swal({
                title: "Opps!",
                text: "Error! Please try again",
                icon: "error",
                button: "OK",
                timer: 5000,
            });

        </script>
    @endif

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                            id="kt_subheader_mobile_toggle"><span></span></button>
                        Profile </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <!--End:: App Aside Mobile Toggle-->

                @include('admin.hr.employee.sidebar')

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        @if(Route::currentRouteName() == 'view_employee')
                        @include('admin.hr.employee.view.overview')
                        @elseif(Route::currentRouteName() == 'view_employee_personal')
                        @include('admin.hr.employee.view.personal')
                        @elseif(Route::currentRouteName() == 'view_employee_academic' || Route::currentRouteName() == 'edit_academic')
                        @include('admin.hr.employee.view.academic')
                        @elseif(Route::currentRouteName() == 'view_employee_training' || Route::currentRouteName() == 'edit_training')
                        @include('admin.hr.employee.view.training')
                        @elseif(Route::currentRouteName() == 'view_employee_experience' || Route::currentRouteName() == 'edit_experience')
                        @include('admin.hr.employee.view.experience')
                        @elseif(Route::currentRouteName() == 'view_employee_advancesalary' || Route::currentRouteName() == 'edit_advance_salary')
                        @include('admin.hr.employee.view.advancesalary')
                        @elseif(Route::currentRouteName() == 'view_employee_official')
                        @include('admin.hr.employee.view.official')
                        @elseif(Route::currentRouteName() == 'view_employee_contact')
                        @include('admin.hr.employee.view.contact')
                        @elseif(Route::currentRouteName() == 'view_employee_statements')
                        @include('admin.hr.employee.view.statement')
                        @elseif(Route::currentRouteName() == 'view_employee_credential')
                        @include('admin.hr.employee.view.credential')
                        @elseif(Route::currentRouteName() == 'view_employee_providentfund')
                        @include('admin.hr.employee.view.providentfund')
                        @elseif(Route::currentRouteName() == 'view_employee_commission')
                        @include('admin.hr.employee.view.commission')
                        @elseif(Route::currentRouteName() == 'view_employee_loan')
                        @include('admin.hr.employee.view.loan')
                        @endif
                    </div>
                </div>
                <!--End:: App Content-->
            </div>
            <!--End::App-->
        </div>
        <!-- end:: Content -->
    </div>
@endsection
@push('js')
<script>
    $("#month_only").datepicker( {
    format: "mm",
    viewMode: "months",
    minViewMode: "months"
    });
    $("#year_only").datepicker( {
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
    });
</script>
@endpush
