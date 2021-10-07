@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<form class="kt-form kt-form--label-right" method="post" action="{{url('dashboard/university/update')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
	      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
				<h3 class="kt-portlet__head-title">Add University Information</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
                        @can('all_university')
						<a href="{{url('dashboard/university')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All University</a>
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
				<label class="col-md-3 col-form-label">University Name:</label>
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
			<div class="form-group row custom_row{{ $errors->has('country') ? ' has-error' : '' }}">
				<label class="col-md-3 col-form-label">Country of University:</label>
				<div class="col-md-7">
					@php
							$allcountry=App\Country::where('status',1)->orderBy('name','ASC')->get();
					@endphp
					<select class="form-control kt-select2" id="kt_select2_1" name="country">
							<option value="">Select Country</option>
							@foreach($allcountry as $country)
							<option value="{{$country->id}}" @if($data->country==$country->id) selected @endif>{{$country->name}}</option>
							@endforeach
					</select>
					@if ($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('country') }}</strong>
              </span>
          @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">University Rank:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="rank" value="{{$data->rank}}">
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">University Details:</label>
				<div class="col-md-7">
					<textarea class="form-control" name="details" rows="3">{{$data->details}}</textarea>
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">University Address:</label>
				<div class="col-md-7">
					<textarea class="form-control" name="address" rows="3">{{$data->address}}</textarea>
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">University Image:</label>
				<div class="col-md-7">
					<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
							@if($data->image!='')
							<div class="kt-avatar__holder" style="background-image: url({{asset('uploads/university/'.$data->image)}})"></div>
							@else
								<div class="kt-avatar__holder" style="background-image: url({{asset('uploads')}}/avatar.png)"></div>
							@endif
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="pic" accept=".png, .jpg, .jpeg">
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
							</span>
					</div>
				</div>
			</div>
		</div>
	  <div class="kt-portlet__foot text-center">
	    <button type="submit" class="btn btn-md btn-brand">UPDATE</button>
		</div>
	</form>
</div>
@endsection
