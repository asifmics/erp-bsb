@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Employee Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_employee')
					<a href="{{route('add_employee')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Employee</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>Employee ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Designation</th>
					<th>Photo</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($employees as $employee)
				<tr>
					<td>{{ $employee->id_no }}</td>
					<td>{{ $employee->name }}</td>
					<td>{{ $employee->email ?? '---' }}</td>
					<td>{{ $employee->phone ?? '---' }}</td>
					<td>{{ $employee->designation->name ?? '---' }}</td>
					<td>
                        @if ($employee->image == '')
						<img class="img50" src="{{ asset('uploads/avatar.png')}}" alt="No-image"/>
                        @else
						<img class="img50" src="{{asset($employee->image)}}"/>
                        @endif
					</td>
					<td>
                        @can('view_employee')
						<a href="{{route('view_employee', $employee->slug)}}" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a>
                        @endcan
                        @can('edit_employee')
						<a href="{{route('view_employee', $employee->slug)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                        @endcan
                        @can('delete_employee')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$employee->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
						<a href="{{route('print_view_employee', $employee->slug)}}" class="text-info" title="Print View"><i class="fa fa-print fa-2x"></i></a>
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No employees found</td>
					</tr>
				@endforelse

			</tbody>
		</table>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('softdelete_employee')}}">
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
