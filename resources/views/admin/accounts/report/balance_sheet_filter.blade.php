@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Balance Sheet</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('account_balance_sheet_report') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="col-form-label text-right">First Date</label>
                    <div class="">
                        <div class="input-group date">
                            <input type="text" name="first_date" class="form-control" readonly="readonly" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" id="kt_datepicker_3">
                            <div class="input-group-append">	<span class="input-group-text">
                            <i class="la la-calendar"></i>
                            </span>
                            </div>
                        </div>
                        {{-- <span class="form-text text-muted">Enable clear and today helper buttons</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="col-form-label text-right">Secound Date</label>
                    <div class="">
                        <div class="input-group date">
                            <input type="text" name="secound_date" class="form-control" readonly="readonly" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" id="kt_datepicker_3">
                            <div class="input-group-append">	<span class="input-group-text">
                            <i class="la la-calendar"></i>
                            </span>
                            </div>
                        </div>
                        {{-- <span class="form-text text-muted">Enable clear and today helper buttons</span> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>
            <div class="col-md-2 float-right">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style="Width:100%; margin-top: 38px">
                    Submit
                  </button>
                </div>
            </div>

        </div>
    </form>
    <br>


	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

@endsection
