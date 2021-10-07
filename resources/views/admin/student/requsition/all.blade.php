@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
        <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Student Requsition</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{route('add_requsition')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Requsition</a>
				</div>
			</div>
		</div>
	</div>
	@php
		$counsellor = App\StudentRequsition::where('status',1)->orderBy('parent_id', 'ASC')->get();
	@endphp
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>SN</th>
					<th>Country</th>
					<th>Main Requsition</th>
					<th>Requsition Name</th>
					<th>Payable Amount</th>
					<th>Manage</th>
				</tr>
			</thead>
			@php
				$i =1;
			@endphp
			<tbody>
                @forelse ($counsellor as $item)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $item->country->name ?? "" }}</td>
					<td>{{ $item->mainrequsition->name ?? ''}}</td>
					<td>{{ $item->name ?? 'Not Available' }}</td>
					<td>{{ $item->payable_amount ?? 'Not Available' }}</td>
					<td>
						 {{-- <a href="{{route('view_requsition', $item->id)}}" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a> --}}
						 <a href="{{route('edit_requsition', $item->id)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
						 <a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No Requsition found</td>
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
				<form method="post" action="{{route('softdelete_requsition')}}">
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
