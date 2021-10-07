@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All University Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_university')
					<a href="{{url('dashboard/university/add')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add University</a>
                   @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table id="alltableinfo" class="table table-striped table-bordered table-hover table-checkable custom_table">
			<thead class="thead-dark">
				<tr>
					<th>University Name</th>
					<th>Country</th>
					<th>Rank</th>
					<th>Program</th>
					<th>Image</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
        @foreach($all as $data)
				<tr>
					<td>{{$data->name}}</td>
					<td>{{$data->countryName->name}}</td>
					<td>{{$data->rank}}</td>
					<td>
							@php
									$uID=$data->id;
									$totalProgram=App\UniversityWiseProgram::where('status',1)->where('university',$uID)->count();
							@endphp
							@if($totalProgram<=9)
								0{{$totalProgram}}
							@else
								{{$totalProgram}}
							@endif
					</td>
					<td>
              @if($data->image!='')
									<img class="img-thumbnail img50" src="{{asset('uploads/university/'.$data->image)}}" alt="Photo"/>
							@else
									<img class="img-thumbnail img50" src="{{asset('uploads/no-image.png')}}" alt="No-image"/>
							@endif
          </td>
					<td>
                        @can('view_university')
                        <a href="{{url('dashboard/university/view/'.$data->slug)}}" class="text-dark manage_btn_icon" title="view"><i class="fa fa-plus-square"></i></a>
                        @endcan
                        @can('edit_university')
                        <a href="{{url('dashboard/university/edit/'.$data->slug)}}" class="text-info manage_btn_icon" title="edit"><i class="fa fa-pen-square"></i></a>
                        @endcan
                        @can('delete_university')
                        <a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
          </td>
				</tr>
        @endforeach
			</tbody>
		</table>
	</div>
  <div class="kt-portlet__foot">
    <a href="#" class="btn btn-info btn-sm">Print</a>
    <a href="#" class="btn btn-warning btn-sm">PDF</a>
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{url('dashboard/university/softdelete')}}">
					@csrf
	        <div class="modal-content">
	            <div class="modal-header alert_modal_header">
	                <h5 class="modal-title"><i class="fab fa-gg-circle"></i> Confirm Message</h5>
	            </div>
	            <div class="modal-body alert_modal_body">
									Are you sure you want to delete?
									<input type="hidden" id="modal_id" name="modal_id">
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
									<button type="button" class="btn btn-sm btn-brand" data-dismiss="modal">Close</button>
	            </div>
	        </div>
				</form>
    </div>
</div>
@endsection
