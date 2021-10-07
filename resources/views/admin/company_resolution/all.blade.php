@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Resolution</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_resolution')
					<a href="{{route('resolution.add')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Resolution</a>
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
					<th>Resolution Title</th>
					<th>PDF</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i= 1;
                @endphp
				@forelse ($resolutions as $item)
				<tr>
					<td>{{$i++}}</td>
                    <td>{{$item->title}}</td>
                    <td><a href="{{ URL::to($item->image) }}">View</a></td>
					<td>
                        {{-- <a href="#" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a> --}}
                        @can('edit_resolution')
						<a href="{{route('resolution.edit', $item->id)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                        @endcan
                        @can('view_resolution')
						<a href="{{ URL::to($item->pdf_file) }}" class="text-info" title="View"><i class="fa fa-plus fa-2x"></i></a>
                        @endcan
                        @can('delete_resolution')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
                        @endcan
					</td>
				</tr>
				@empty
				<tr>
					<td>No Departments Found</td>
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
				<form method="post" action="{{route('resolution.delete')}}">
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
