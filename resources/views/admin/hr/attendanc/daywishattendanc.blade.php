@extends('layouts.admin')
@section('content')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Day Wish Attendanc</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('employee.daywishattendancview') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group custom_row">
                    <label class=" col-form-label text-bold">Branch Name:</label>
                    <div class="">
                        @php
                            $branches = App\Branch::where('status',1)->get();
                        @endphp
                        <select class="form-control" name="branch_id" required>
                            <option value="">Select Departments</option>
                            @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('branch_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('branch_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="col-form-label text-right">Attendance Date</label>
                    <div class="">
                        <div class="input-group date">
                            <input type="text" name="attendanc_date" class="form-control" readonly="readonly" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" id="kt_datepicker_3">
                            <div class="input-group-append">	<span class="input-group-text">
                            <i class="la la-calendar"></i>
                            </span>
                            </div>
                        </div>
                        {{-- <span class="form-text text-muted">Enable clear and today helper buttons</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
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
