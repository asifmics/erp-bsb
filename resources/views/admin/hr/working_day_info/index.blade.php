@extends('layouts.admin')
@section('content')

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Working Day Information</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('workday_report_search') }}" method="POST" enctype="multipart/form-data">
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
                    <label class=" col-form-label text-bold">Month:</label>

                    <div class="">
                        <input type="text" name="date" class="form-control" readonly="readonly" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" id="kt_datepicker_3">
                        @if ($errors->has('religion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('religion') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" style="Width:100%; margin-top: 38px">
                    Search Employee Report
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
<script>
    $(document).ready(function() {
  $("#kt_datepicker_3").bootstrapMaterialDatePicker({
    format: "M",
    lang: "br",
    time: false
    //maxDate: moment()
  });
});
</script>
@endpush
