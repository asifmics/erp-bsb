@extends('layouts.admin')
@section('content')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Active Loan Details</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('loan_report_search') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group custom_row">
                    <label class=" col-form-label text-bold">Branch Name:</label>
                    <div class="">
                        @php
                            $branches = App\Branch::where('status',1)->get();
                        @endphp
                        <select class="form-control" name="branch">
                            <option value="">Select Branch</option>
                            @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('branch'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('branch') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group custom_row">
                    <label class=" col-form-label text-bold">Departments:</label>
                    @php
                        $department = App\Department::all();
                    @endphp
                    <div class="">
                        <select class="form-control" name="department">
                            <option value="">Select Department</option>
                            @foreach ($department as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('department') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group custom_row">
                    <label class=" col-form-label text-bold">Date Range:</label>

                    <div class="">
                        <div class="input-daterange input-group" id="kt_datepicker_5" style="z-index: 9999;color:  !important;">
                            <input type="text" class="form-control" name="start" style="">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                   To
                                </span>
                            </div>
                            <input type="text" class="form-control" name="end">
                        </div>
                        
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-3">
                <div class="form-group custom_row">
                    <label class=" col-form-label text-bold">Status:</label>
                    @php
                        $status = App\EmpStatus::all();
                    @endphp
                    <div class="">
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            @foreach ($status as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div> --}}


            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style="Width:100%; margin-top: 38px">
                    Search Loan Report
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

@push('js')
{{--  --}}
@endpush
