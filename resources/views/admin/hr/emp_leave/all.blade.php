@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Employee Leave</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_employee_leave')
					<a href="{{route('add_emp_leave')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Employee Leave</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Employee Name</th>
					<th>Date From</th>
					<th>Date To</th>
					<th>Total Day</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
				@forelse ($emp_leave as $item)
				<tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $item->employee->name }}</td>
					<td>{{ $item->date_from }}</td>
					<td>{{ $item->date_to }}</td>
					<td>{{ $item->total_day }}</td>
					<td>
                        @if($item->approved == 'No')
                        <a href="#" title="Unapproved" id="publish" data-toggle="modal" data-target="#publishModal" data-id="{{$item->id}}"><i class="fa fa-pause text-danger fa-lg fa-2x ml-5"></i></a>
                        @else
                        <a href="#" title="Approved" id="unpublish" data-toggle="modal" data-target="#unPubModal" data-id="{{$item->id}}"><i class="fa fa-check-circle text-success fa-lg fa-2x ml-5"></i></a>
                        @endif
                        @can('edit_employee_leave')
						<a href="{{route('edit_emp_leave', $item->id)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x ml-2"></i></a>
                        @endcan
                        @can('delete_employee_leave')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash fa-lg ml-2"></i></a>
                        @endcan
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No Employee Leave found</td>
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
				<form method="post" action="{{route('softdelete_emp_leave')}}">
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
<!--Publish Modal Information-->
<div id="publishModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{route('approved_emp_leave')}}" enctype="multipart/form-data">
              @csrf
              <div class="card mb-0">
                <div class="card-header alert_modal_header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body alert_modal_body">
                  Are you sure you want to approved employee?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!--Unpublish Modal Information-->
<div id="unPubModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="POST" action="{{route('unapproved_emp_leave')}}" enctype="multipart/form-data">
              @csrf
              <div class="card mb-0">
                <div class="card-header alert_modal_header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body alert_modal_body">
                  Are you sure you want to unapproved employee?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
