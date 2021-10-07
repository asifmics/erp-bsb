@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Receptionist Wish Visitor Information</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('receptionist_wise_student_report') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label text-right">Font Desk Officer</label>
                    <div class="">
                        @php
                        $receptionists = App\Employee::where('status',1)->where('designation_id',3)->get();

                        @endphp
                        <select name="receptionist_slug" id="" required class="form-control">
                            <option value="">Please Select</option>
                            @foreach ($receptionists as $receptionist)
                                <option value="{{ $receptionist->slug }}">{{ $receptionist->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group date">
                            <div class="input-group-append">
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
