@extends('layouts.admin')
@push('css')
<style>
    .mini-stat {
border-radius: 3px;
margin-bottom: 20px;
padding: 20px;
color: #ffffff;
}
.bg-white {
background-color: #f5f5f5 !important;
}
.bx-shadow {
-webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
}
.kt-portlet__body .row .col-md-3{
padding: 0 10px;
}
.mini-stat-icon{
    background: #a096d6;
    margin-bottom: -140px
}
.mini-stat-icon i {
    font-size: 40px;
}

</style>
@endpush
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Recycle Bin</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					{{-- <a href="" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Employee</a> --}}
				</div>
			</div>
		</div>
    </div>

<h3 class="text-center"><u>Human Resourse</u></h3>

	<div class="kt-portlet__body">
		<div class="row">
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class=""></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                            $employees =App\Employee::where('status',0)->get();
                        @endphp
                          <span class="counter text-dark">{{ $employees->count() }}</span><br>
                          Employee
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-panorama"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                        $department =App\Department::where('status',0)->get();
                         @endphp
                          <span class="counter text-dark">{{ $department->count() }}</span><br>
                          Department
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-contacts"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                        $branch =App\Branch::where('status',0)->get();
                    @endphp
                          <span class="counter text-dark">{{ $branch->count() }}</span><br>
                          Branch
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                        $shift =App\Shift::where('status',0)->get();
                        @endphp
                          <span class="counter text-dark">{{ $shift->count() }}</span><br>
                          Shift
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-photo-library"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                        $nature =App\EmpNature::where('status',0)->get();
                        @endphp
                          <span class="counter text-dark">{{ $nature->count() }}</span><br>
                          Nature
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-insert-chart"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">

                          <span class="counter text-dark"></span><br>
                          Status
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-account-box"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                        $salaryscale =App\SalaryScale::where('status',0)->get();
                    @endphp
                          <span class="counter text-dark">{{ $salaryscale->count() }}</span><br>
                          Salery Scale
                      </div>
                  </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                  <div class="mini-stat clearfix bx-shadow bg-white">
                      <span class="mini-stat-icon bg-primary"><i class="md md-account-box"></i></span>
                      <div class="mini-stat-info text-right text-dark mini_stat_info">
                        @php
                        $paytype =App\PayType::where('status',0)->get();
                    @endphp
                          <span class="counter text-dark">{{ $paytype->count() }}</span><br>
                          Pay Type
                      </div>
                  </div>
                </a>
            </div>


        </div> <!-- End row-->
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>


    @endsection
