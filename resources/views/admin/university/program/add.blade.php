@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<form class="kt-form kt-form--label-right" method="post" action="{{url('dashboard/university/program/submit')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
	      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
				<h3 class="kt-portlet__head-title">Add University Program Information</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
                        @can('all_university_program')
						<a href="{{url('dashboard/university/program')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Program</a>
                        @endcan
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">
			@if(Session::has('success'))
        <script type="text/javascript">
            swal({title: "Success!", text: "Successfully add university program information!", icon: "success", button: "OK", timer:5000,});
         </script>
      @endif
      @if(Session::has('error'))
          <script type="text/javascript">
              swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
          </script>
      @endif
			<div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
				<label class="col-md-3 col-form-label">University Program Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="name" value="{{old('name')}}">
					@if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
				</div>
			</div>
			<div class="form-group row custom_row{{ $errors->has('cate') ? ' has-error' : '' }}">
				<label class="col-md-3 col-form-label">University Program Category:</label>
				<div class="col-md-7">
					@php
							$allUPC=App\UniversityProgramCategory::where('status',1)->orderBy('name','ASC')->get();
					@endphp
					<select class="form-control kt-select2" id="kt_select2_1" name="cate">
							<option value="">Select Program Category</option>
							@foreach($allUPC as $cate)
							<option value="{{$cate->id}}">{{$cate->name}}</option>
							@endforeach
					</select>
					@if ($errors->has('cate'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('cate') }}</strong>
              </span>
          @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">University Program Duration:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="duration" value="{{old('duration')}}">
				</div>
			</div>
		</div>
	  <div class="kt-portlet__foot text-center">
	    <button type="submit" class="btn btn-md btn-brand">SAVE</button>
		</div>
	</form>
</div>
@endsection
