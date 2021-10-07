@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Question</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('insert_client_question')
					<a href="{{route('add_cs_question')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Question</a>
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
					<th>Question</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
				@forelse ($questions as $item)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$item->question}}</td>
					<td>
                        @if($item->publish==1)
                        <a href="#" title="publish" id="unpublish" data-toggle="modal" data-target="#unPubModal" data-id="{{$item->id}}"><i class="fa fa-check-square text-success fa-lg ml-1"></i></a>
                    @else
                        <a href="#" title="unpublish" id="publish" data-toggle="modal" data-target="#publishModal" data-id="{{$item->id}}"><i class="fa fa-pause text-danger fa-lg ml-1"></i></a>
                    @endif
                        {{-- <a href="#" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a> --}}
                        @can('edit_client_question')
						<a href="{{route('edit_cs_question', $item->slug)}}" class="text-info" title="edit"><i class="fa fa-pen-square fa-lg ml-1"></i></a>
                        @endcan
                        @can('delete_client_question')
						<a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash fa-sm ml-1"></i></a>
                        @endcan
					</td>
				</tr>
				@empty
				<tr>
					<td>No Question Found</td>
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
				<form method="POST" action="{{route('delete_cs_question')}}">
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

<div id="publishModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{route('publish_cs_question')}}" enctype="multipart/form-data">
              @csrf
              <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body alert_modal_body modal_card">
                  Are you sure you want to publish question?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!--Unpublish Modal Information-->
<div id="unPubModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="POST" action="{{route('unpublish_cs_question')}}" enctype="multipart/form-data">
              @csrf
              <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card alert_modal_body">
                  Are you sure you want to unpublish question?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection
