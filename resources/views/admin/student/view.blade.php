@extends('layouts.admin')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content" style="padding: 10px">

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
                    <div class="kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <!--Begin::App-->
                <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                    <!--Begin:: App Aside Mobile Toggle-->
                    <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                        <i class="la la-close"></i>
                    </button>
                    <!--End:: App Aside Mobile Toggle-->

                    <!--Begin:: App Aside-->
                    <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                        <!--begin:: Widgets/Applications/User/Profile4-->
                        <div class="kt-portlet kt-portlet--height-fluid-" style="padding: 0px">
                            <div class="kt-portlet__body" style="padding: 0px">
                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-4">
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                            @if ($student->image != '')
                                            <img class="kt-widget__img kt-hidden-" src="{{ URL::to($student->image)}}" alt="image">
                                            @else
                                            <img class="kt-widget__img kt-hidden-" src="{{ asset('uploads/avatar.png')}}" alt="image">
                                            @endif

                                            <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                                JD
                                            </div>
                                        </div>
                                        <div class="kt-widget__content">
                                            <div class="kt-widget__section">
                                                <a href="#" class="kt-widget__username">
                                                    {{ $student->name }}
                                                </a>
                                                @php
                                                    $status = App\StudentStatus::where('status',1)->get();
                                                @endphp
                                                <div class="kt-widget__button">
                                                    {{-- @if ($student->student_status == 'Guest')
                                                    <span class="btn btn-label-warning btn-sm">Guest</span>
                                                    @elseif($student->student_status == 'Student')
                                                    <span class="btn btn-label-warning btn-sm">Student</span>
                                                    @endif --}}
                                                    <select style="width:200px; margin-left:70px" class="form-control" name="student_status" id="">
                                                        @foreach ($status as $item)
                                                        <option value="{{ $item->id }}" @if ($student->file_transfer_status == $item->id) selected  @endif>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                </div>

                                                {{-- <div class="kt-widget__action">
                                                    <a href="#" class="btn btn-icon btn-circle btn-label-facebook">
                                                        <i class="socicon-facebook"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-icon btn-circle btn-label-twitter">
                                                        <i class="socicon-twitter"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-icon btn-circle btn-label-google">
                                                        <i class="socicon-google"></i>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget__body">
                                        @if ($student->student_status == 'Student')
                                        <a href="{{ route('view_student',$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student')  kt-widget__item--active @endif">
                                            Profile Overview
                                        </a>
                                        @endif
                                        <a href="{{ route('view_student_personal' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_personal')  kt-widget__item--active @endif">
                                            Personal info
                                        </a>
                                        @if ($student->student_status == 'Student')
                                        <a href="{{ route('view_student_academic' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_academic')  kt-widget__item--active @endif">
                                            Academic
                                        </a>
                                        <a href="{{ route('view_student_document' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_document')  kt-widget__item--active @endif">
                                            Document
                                        </a>
                                        @endif
                                        {{--  @if ($student->student_status == 'Guest')  --}}
                                        <a href="{{ route('view_student_interest' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_interest')  kt-widget__item--active @endif">
                                            Interest Country
                                        </a>

                                        @if ($student->student_status == 'Guest' AND count($student->interestcountry->where('adminssion_status',1))>0)
                                        <a href="{{ route('view_student_admission' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_admission')  kt-widget__item--active @endif">
                                            Admission
                                        </a>
                                        @endif
                                        @if ($student->student_status == 'Student')
                                        <a href="{{ route('view_student_visa' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_visa')  kt-widget__item--active @endif">
                                            Visa
                                        </a>
                                        <a href="{{ route('view_student_passport' ,$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_passport')  kt-widget__item--active @endif">
                                        Passport
                                        </a>
                                        <a href="{{ route('view_student_account',$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_account')  kt-widget__item--active @endif">
                                            Account Information
                                        </a>

                                        <a href="{{ route('view_student_log',$student->slug) }}" class="kt-widget__item @if(Route::currentRouteName() == 'view_student_log')  kt-widget__item--active @endif">
                                            Logs History
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Widget -->
                            </div>
                        </div>
                    </div>
                    <!--End:: App Aside-->

                    <!--Begin:: App Content-->
                    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                        <div class="row">
                            <div class="col-xl-12">
                                @if(Route::currentRouteName() == 'view_student')
                                @include('admin.student.view.overview')
                                @elseif(Route::currentRouteName() == 'view_student_document' || Route::currentRouteName() == 'edit_document')
                                @include('admin.student.view.document')
                                @elseif(Route::currentRouteName() == 'view_student_academic' || Route::currentRouteName() == 'edit_student_academic')
                                @include('admin.student.view.academic')
                                @elseif(Route::currentRouteName() == 'view_student_personal')
                                @include('admin.student.view.personal')
                                @elseif(Route::currentRouteName() == 'view_student_visa'|| Route::currentRouteName() == 'edit_visa')
                                @include('admin.student.view.visa')
                                @elseif(Route::currentRouteName() == 'view_student_interest'|| Route::currentRouteName() == 'edit_interest')
                                @include('admin.student.view.interest')
                                @elseif(Route::currentRouteName() == 'view_student_passport')
                                @include('admin.student.view.passport')
                                @elseif(Route::currentRouteName() == 'view_student_admission')
                                @include('admin.student.view.admission')
                                @elseif(Route::currentRouteName() == 'view_student_account')
                                @include('admin.student.view.account')
                                @elseif(Route::currentRouteName() == 'view_student_log')
                                @include('admin.student.view.log')
                                @endif
                            </div>
                        </div>
                        <!--End:: App Content-->
                    </div>
                <!--End::App-->	</div>
                <!-- end:: Content -->
    </div>
@endsection
@push('js')

<script>
    $(document).ready(function(){

        $('select[name="student_status"]').on('change',function(){
            var id = $(this).val();
            var st_id = $('input[name="student_id"]').val();
            $.ajaxSetup({
                    headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
            $.ajax({
                    url: '{{ url('dashboard/student/ajax/status/update/')}}',
                    method: "POST",
                    data:{id:id, st_id:st_id},
                    success: function(data){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                            getValues()
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                        }
                })
        });

    });
</script>

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

<script>
    var KTAppsEducationStudentProfile = function () {
	// Base elements
	var avatar;

	var initAvatar = function() {
		avatar = new KTImageInput('kt_user_avatar');
	}

	return {
		// public functions
		init: function() {
			initAvatar();
		}
	};
}();

jQuery(document).ready(function() {
	KTAppsEducationStudentProfile.init();
});
</script>

@endpush
