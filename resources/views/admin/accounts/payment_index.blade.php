@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Payment Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_journal')
					<a href="{{route('payment')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Payment</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table id="alltableinfo" class="table table-striped table-bordered table-hover table-checkable custom_table">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Date</th>
					<th>From</th>
					<th>Refarance</th>
					<th>Memo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
                @foreach($all as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{\Carbon\Carbon::parse($data->date)->format('d M Y')}}</td>
                            <td>
                                {{ $data->bank_account->account_name }}
                            </td>
                            <td>
                                {{ $data->referance }}
                            </td>
                            
                            <td>
                                {{ $data->memo }}
                            </td>
                            <td>
                                <a href="{{route('payment.show',$data->id)}}" class="text-dark manage_btn_icon" title="view"><i class="fa fa-plus-square"></i></a>
                                
                                <a href="{{route('payment.edit',$data->id)}}" class="text-info manage_btn_icon" title="edit"><i class="fa fa-pen-square"></i></a>
                                
                                {{-- <a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->id}}"><i class="fa fa-trash"></i></a> --}}
                </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="kt-portlet__foot">
        <a href="#" class="btn btn-info btn-sm">Print</a>
        <a href="#" class="btn btn-warning btn-sm">PDF</a>
        </div>
    </div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('gl.entry.softdelete')}}">
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
