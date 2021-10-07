@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">View University Program Category Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('all_university_program_category')
					<a href="{{url('dashb oard/university/program/category')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Category</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		@if(Session::has('success'))
			<script type="text/javascript">
					swal({title: "Success!", text: "Successfully update university program category information!", icon: "success", button: "OK", timer:5000,});
			 </script>
		@endif
		<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table class="table table-striped table-bordered table-hover custom_view_table">
							<tr>
									<td>Program Category Name</td>
									<td>:</td>
									<td>{{$data->name}}</td>
							</tr>
							<tr>
									<td>Create Time</td>
									<td>:</td>
									<td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
							</tr>
					</table>
				</div>
				<div class="col-md-1"></div>
		</div>
	</div>
  <div class="kt-portlet__foot">
    <a href="#" class="btn btn-info btn-sm">Print</a>
    <a href="#" class="btn btn-warning btn-sm">PDF</a>
	</div>
</div>
@endsection
