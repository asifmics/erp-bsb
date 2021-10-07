@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Salary Scale RecycleBin</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>Sl.</th>
					<th>Name</th>
					<th>Amount</th>
					<th>Details</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
				@php
					$salary_string_fixed = 0;
					foreach($strings as $string){
						if($string->type == "Fixed"){
							$salary_string_fixed += $string->amount;
						}
					}

					function calculate($salary, $amount, $type, $salary_string_fixed){

						if($type == "Fixed"){
							return $amount;
						}else{
							return (($salary - $salary_string_fixed) * $amount) / 100;
						}
					}
				@endphp
				@forelse ($salaries as $salary)
				<tr>
					<td>{{$salary->id}}</td>
					<td>{{$salary->name}}</td>
					<td>{{$salary->amount}}</td>
					<td>
						<table>
							@foreach ($strings as $string)
							<tr>
								<td>{{ $string->name }}</td> <td>:</td> <td>{{ calculate($salary->amount, $string->amount, $string->type, $salary_string_fixed) }}</td>
							</tr>
							@endforeach
						</table>
					</td>
					<td>
                        <a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$salary->id}}"><i class="fa fa-trash"></i></a>
                        <a href="#" id="restore" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#RestoreModal" data-id="{{$salary->id}}"><i class="fa fa-undo"></i></a>

					</td>
				</tr>

				@empty

				@endforelse

			</tbody>
		</table>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="RestoreModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('restore_branch')}}">
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

<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('delete_branch')}}">
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
