@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<form class="kt-form kt-form--label-right" method="post" action="{{url('dashboard/university/program/category/update')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
	      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
				<h3 class="kt-portlet__head-title">Update University Program Category Information</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
                        @can('all_university_program_category')
						<a href="{{url('dashboard/university/program/category')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Category</a>
                        @endcan
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">
      @if(Session::has('error'))
          <script type="text/javascript">
              swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
          </script>
      @endif
			<div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
				<label class="col-md-3 col-form-label">Program Category Name:</label>
				<div class="col-md-7">
					<input type="hidden" name="id" value="{{$data->id}}">
					<input type="hidden" name="slug" value="{{$data->slug}}">
					<input type="text" class="form-control" name="name" value="{{$data->name}}">
					@if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
				</div>
			</div>
		</div>
	  <div class="kt-portlet__foot text-center">
	    <button type="submit" class="btn btn-md btn-brand">UPDATE</button>
		</div>
	</form>
</div>
@endsection
