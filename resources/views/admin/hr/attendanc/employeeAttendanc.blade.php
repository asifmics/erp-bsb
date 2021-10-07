@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">employee Wish Attendanc</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('employee.wishattendancview') }}" method="POST">
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
                <div class="form-group custom_row">
                    <label class=" col-form-label text-bold">Employee Name:</label>
                    <div class="">
                        <select class="form-control" name="employee_id" required>

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
                    <label class="col-form-label text-right">Date Range</label>
                    <div class="">
                        <div class="input-group date">
                            <input type="text" name="date_from" class="form-control" readonly="readonly" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}" id="kt_datepicker_3">
                            <span class="m-2 text-bold">To</span>
                            <input type="text" name="date_to" class="form-control" readonly="readonly" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}" id="kt_datepicker_3">

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
@push('js')
<script>

$('select[name="branch_id"]').on('change',function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
            if(id != '')
            {
                var id =$(this).val();
                $.ajax({
                    url: '{{ route('employee.getAjax') }}',
                    method: "POST",
                    data: {id:id},
                    dataType: "JSON",
                    success:function(data){
                        if(data != ''){
                        var d =$('select[name="employee_id"]').empty();
                        var html ='';
                        html +='<option label="Select Employee"></option>';
                        $.each(data, function(key, emp){
                            html += '<option value="'+ emp.id +'">' + emp.name + '</option>'
                            })
                            $('select[name="employee_id"]').html(html);
                        }else{
                            var d =$('select[name="employee_id"]').empty();
                        }
                 }
                })
            }

        })




</script>
@endpush


