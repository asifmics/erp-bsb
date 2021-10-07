@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Student Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('all_student')
					<a href="{{route('add_student')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Student</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>Student ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Photo</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>

                @forelse ($students as $student)

                @if ($student->counsellorganerate->email == Auth::user()->email or Auth::user()->role == 'Super Admin' or Auth::user()->role == 'Admin')
                @php
                    // dd($student->counsellorganerate->email);
                @endphp
				<tr>
					<td>{{ $student->id_no }}</td>
					<td>{{ $student->name }}</td>
					<td>{{ $student->email }}</td>
					<td>{{ $student->phone }}</td>
					<td>
						<img class="img50" src="{{ URL::to($student->image)}}" alt="No-image"/>
					</td>
					<td>
                        @can('view_student')
						<a href="{{route('view_student', $student->slug)}}" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a>
                        @endcan
                        @can('edit_student')
						<a href="{{route('view_student', $student->slug)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                        @endcan
                        @can('delete_student')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $student->id }}"><i class="fa fa-trash"></i></a>
                        @endcan
                        <a href="{{route('print_view_student', $student->slug)}}" class="text-info" title="Print View"><i class="fa fa-print fa-2x"></i></a>
					</td>
				</tr>

                @endif
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
				<form method="post" action="{{route('softdelete_student')}}">
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
