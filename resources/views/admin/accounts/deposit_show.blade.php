@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Deposit Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_journal')
					<a href="{{route('deposit.index')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>All Deposits</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="row">
			<div class="col-md-12">
				<h4>To : {{$deposit->bank_account->account_name}}</h4>
				<h4>Referance : {{$deposit->referance}}</h4>
				<h4>Order Of : {{$deposit->order_of}}</h4>
				<h4>Date : {{$deposit->created_at->format('d-M-yy')}}</h4>
				<h4>Created By : {{$deposit->creator->name}}</h4>
				@if ($deposit->updator->name)
				<h4>Updated By : {{$deposit->updator->name}}</h4>
				<h4>Updated At : {{$deposit->updated_at->format('d-M-yy H:i')}}</h4>
				@endif
				<br><br>
			</div>
		</div>
		<table class="table table-striped table-bordered table-hover table-checkable custom_table">
			<thead class="thead-dark">
				<tr>
					<th>Account</th>
					<th>Amount</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($deposit->details as $item)
					<tr>
						<td>{{$item->gl_detail->name}}</td>
						<td>{{$item->amount}}</td>
						<td>{{$item->description}}</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td class="text-right">Total:</td>
					<td> <b> {{$deposit->details->sum('amount')}}</b></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">
						Memo: {{ nl2br($deposit->memo) }}
					</td>
				</tr>
			</tfoot>
        </table>
    </div>
    <div class="kt-portlet__foot">
        {{-- <a href="#" class="btn btn-info btn-sm">Print</a>
        <a href="#" class="btn btn-warning btn-sm">PDF</a> --}}
        </div>
    </div>
@endsection
