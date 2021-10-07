@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Resopnse</h3>
		</div>

	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Client Name</th>
					<th>Client Email</th>
					<th>Client Phone</th>
					<th>Survey Date</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
				@forelse ($client as $item)
				<tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
					<td>{{ $item->email }}</td>
					<td>{{ $item->phone}}</td>
					<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>

					<td>
                        @can('view_client_response')
						<a href="{{route('view_cs_survey', $item->id)}}" class="text-info" title="View Question"><i class="far fa-eye fa-2x"></i></a>
                        @endcan
                        @can('delete_client_response')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No Resignation found</td>
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
				<form method="post" action="{{route('softdelete_resignation')}}">
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
