@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Salary Scale Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    <a href="{{route('salary_string')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fab fa-amazon-pay"></i>Salary String</a>
                    @can('insert_salary_scale')
					<a href="{{route('add_salary_scale')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Salary Scale</a>
                    @endcan
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
                        {{-- <a href="#" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a> --}}
                        @can('edit_salary_scale')
						<a href="{{route('edit_salary_scale', $salary->id)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                        @endcan
                        @can('delete_salary_scale')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$salary->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
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
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('softdelete_salary_scale')}}">
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
