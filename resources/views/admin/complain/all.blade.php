@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Complain</h3>
		</div>

	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Name</th>
					<th>Email</th>
					<th>Details</th>
					<th>Complain Date</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
				@forelse ($complain as $item)
				<tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
					<td>{{ $item->email }}</td>
					<td>{{Str::limit( $item->details , 60)}}</td>
					<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>

					<td>
                        @if ($item->c_status == 'Pending')
                        <a href="{{route('solve_complain', $item->id)}}" class="text-info" title="Pending"><i class="far fa-times-circle fa-2x text-warning"></i></a>
                        @else
                        <a href="{{route('pending_complain', $item->id)}}" class="text-info" title="Solve"><i class="far fa-check-circle fa-2x text-success"></i></a>
                        @endif
                        @can('view_complain')
						<a href="{{route('view_complain', $item->id)}}" class="text-info" title="View Question"><i class="far fa-eye fa-2x"></i></a>
                        @endcan
                        @can('delete_complain')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
					</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No Complain found</td>
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
