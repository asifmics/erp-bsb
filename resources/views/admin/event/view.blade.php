@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Event Details</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('all_event')
                    <a href="{{route('all_event')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Event</a>
                    @endcan
                </div>
            </div>
        </div>

	</div>
	<div class="kt-portlet__body">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="form-group">
                    <label class=" col-form-label"><b>Title:</b></label> &nbsp;
                    <label class=" col-form-label">{{ $event->title }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Event Cost:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $event->cost }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Date From:</b></label>&nbsp;
                    <label class=" col-form-label">{{\Carbon\Carbon::parse($event->date_from)->format('d M Y')}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Date To:</b></label>&nbsp;
                    <label class=" col-form-label">{{\Carbon\Carbon::parse($event->date_to)->format('d M Y')}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Event Remarks:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $event->remarks }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Description:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $event->description }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Event Gallery:</b></label>&nbsp;
                    <label class=" col-form-label">
                        <div class="row">
                            @if (old('image') ?? $event->image ?? '')
                            @php
                                $image = explode(',',$event->image);
                            @endphp
                            @foreach ($image as $item)
                            <div class="col-md-4">
                                <img src="{{ asset($item) }}" alt="" width="150" height="150">
                            </div>
                            @endforeach
                            @endif
                        </div>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>

<br><br>
                    <div class="">

                    </div>
                </div>


            </div>
        </div>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

@endsection
