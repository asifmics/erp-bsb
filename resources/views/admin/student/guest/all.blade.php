@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Guest Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('add_guest')
					<a href="{{route('add_guest_student')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Guest</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>Visitor ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Photo</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($guests as $guest)
				<tr>
					<td>{{ $guest->visitor_id }}</td>
					<td>{{ $guest->name }}</td>
					<td>{{ $guest->email }}</td>
					<td>{{ $guest->phone }}</td>
					<td>
                        @if (empty($guest->image))
                        <img class="img50" src="{{ asset('uploads/avatar.png')}}" alt="No-image"/>
                        @else
						<img class="img50" src="{{ URL::to($guest->image)}}" alt="No-image"/>
                        @endif

					</td>
					<td>
                        @can('view_guest')
						<a href="{{route('view_student', $guest->slug)}}" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a>
                        @endcan
                        @can('edit_guest')
						<a href="{{route('view_student', $guest->slug)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                        @endcan
                        @can('delete_guest')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id=""><i class="fa fa-trash"></i></a>
                        @endcan
					</td>
				</tr>

				@empty
					<tr>
						<td colspan="7">No Studnet found</td>
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
