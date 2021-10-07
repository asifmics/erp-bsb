@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Expirience</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{route('add_experience')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Expirience</a>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Company Name</th>
					<th>Designation</th>
					<th>Date From</th>
					<th>Date To</th>
					<th>Description</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
				@forelse ($experience as $item)
				<tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $item->company_name}}</td>
                    <td>{{ $item->designation}}</td>
					<td>{{\Carbon\Carbon::parse($item->date_from)->format('d M Y')}}</td>
					<td>{{\Carbon\Carbon::parse($item->date_to)->format('d M Y')}}</td>
					<td>{{ Str::limit($item->description ,50)}}</td>
					<td>
						<a href="{{route('edit_experience', $item->id)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No Experience found</td>
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
				<form method="post" action="{{route('softdelete_experience')}}">
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
