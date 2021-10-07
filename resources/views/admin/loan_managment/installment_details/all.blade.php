@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Installment</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('all_installment_details')
					<a href="{{route('add_installment')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Installment</a>
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
					<th>Loan Amount</th>
					<th>Installment Amount</th>
					<th>Payment Date</th>
					<th>Received By</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
				@forelse ($installment as $item)
				<tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $item->loan->employee->name}}</td>
                    <td>{{ $item->loan->loan_amount}}</td>
					<td>{{ $item->installment_amount}}</td>
					<td>{{ \Carbon\Carbon::parse($item->payment_date)->format('d M Y') }}</td>
					<td>{{ $item->received_by }}</td>
					<td>
                        @can('edit_installment_details')
						<a href="{{route('edit_installment', $item->id)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                        @endcan
                        @can('delete_installment_details')
						<a href="#"x id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
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
    ...
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('softdelete_installment')}}">
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
