@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<form class="kt-form kt-form--label-right" method="post" action="{{url('dashboard/country/submit')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
	      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
				<h3 class="kt-portlet__head-title">Add Country Information</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
                        @can('all_country')
						<a href="{{url('dashboard/country')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Country</a>
                        @endcan
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">
			@if(Session::has('success'))
        <script type="text/javascript">
            swal({title: "Success!", text: "Successfully add country information!", icon: "success", button: "OK", timer:5000,});
         </script>
      @endif
      @if(Session::has('error'))
          <script type="text/javascript">
              swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
          </script>
      @endif
			<div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
				<label class="col-md-3 col-form-label">Country Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" placeholder="Enter Country Name" name="name" value="{{old('name')}}">
					@if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
				</div>
			</div>
			<div class="form-group row custom_row{{ $errors->has('reg_fees') ? ' has-error' : '' }}">
				<label class="col-md-3 col-form-label">Registration Fees:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="reg_fees" value="{{old('reg_fees')}}" placeholder="Enter Country Registration Fees">
					@if ($errors->has('reg_fees'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('reg_fees') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Country Flag:</label>
				<div class="col-md-7">
					<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
							<div class="kt-avatar__holder" style="background-image: url({{asset('uploads')}}/avatar.png)"></div>
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
	    <button type="submit" class="btn btn-md btn-brand">SAVE</button>
		</div>
	</form>
</div>
@endsection
