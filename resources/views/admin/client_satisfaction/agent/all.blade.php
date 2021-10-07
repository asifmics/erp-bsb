@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All International Agent</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">

					<a href='{{ url("dashboard/international/agent/create") }}' class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add International Agent</a>

				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Institutional Agency</th>
					<th>Country Name</th>
					<th>Type</th>
					<th>Valid Form</th>
					<th>Valid To</th>
					<th>Certification </th>
                    <th>Commission  </th>
                    <th>Pdf  </th>
                    <th>Status  </th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>

				@forelse ($agents as $item)
				<tr>
					<td>{{ $loop->iteration ?? '' }}</td>
                    <td>{{ $item->universities->name ?? ''}}</td>
                    <td>{{ $item->country->name ?? ''}}</td>
					<td>
                        @if ( $item->type == 1)
                            <span class="text-success" style="font-weight: 600">Direct</span>
                        @else
                            <span class="text-danger"  style="font-weight: 600">Indirect</span>
                        @endif
                    </td>
					<td>{{ $item->valid_form ?? '' }}</td>
					<td>{{ $item->valid_to ?? '' }}</td>
					<td>{{ $item->certification->name ?? '' }}</td>
					<td>{{ $item->commission."%" ?? '' }}</td>
					<td><a  href='{{ url("dashboard/get/pdf/$item->id/download") }}'><i class="fa fa-download"></i></a></td>
					<td>@if ( $item->status == 1)
                            <span class="text-success" style="font-weight: 600">Active</span>
                            @else
                            <span class="text-danger"  style="font-weight: 600">Inactive</span>
					@endif
                    </td>
					<td>

						<a href='{{ url("dashboard/international/agent/$item->slug/edit") }}' class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>

						<a href="#"x id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No Loan found</td>
					</tr>
				@endforelse

			</tbody>
		</table>
	</div>
    <div class="kt-portlet__foot">
        <a href='{{ url("dashboard/international/agent/excel/download") }}' class="btn btn-info btn-sm">Excel</a>
        <a href='{{ url("dashboard/international/agent/pdf/download") }}' class="btn btn-warning btn-sm">PDF</a>
    </div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action=''>
					@csrf
                    @method('delete')

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
