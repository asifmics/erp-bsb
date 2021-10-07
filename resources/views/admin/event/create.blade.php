@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_event')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/event/create'))
                    Add New Event
                    @else
                    Edit Event
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$event->slug}}">
                    <input type="hidden" name="id" value="{{$event->id}}">
                    @endif
                </h3>
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
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Event Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif

            <div class="form-group row custom_row{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Event Title:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="title" placeholder="Enter Event Title" value="{{old('title') ?? $event->title ?? ''}}">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('cost') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Cost:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="cost" placeholder="Enter Cost" value="{{old('cost') ?? $event->cost ?? ''}}">
                    @if ($errors->has('cost'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cost') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('date_from') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Form:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="date_from" value="{{ old('date_from') ?? $event->date_from ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">

                    @if ($errors->has('date_from'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date_from') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('date_to') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">To:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="date_to" value="{{ old('date_to') ?? $event->date_to ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">

                    @if ($errors->has('date_to'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date_to') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('remarks') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Remarks:</label>
                <div class="col-md-7">
                    <textarea name="remarks" id="" cols="30" rows="6" class="form-control">
                        {{old('remarks') ?? $event->remarks ?? ''}}
                    </textarea>
                    @if ($errors->has('remarks'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('remarks') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Description:</label>
                <div class="col-md-7">
                    <textarea name="description" id="" cols="30" rows="6" class="form-control">
                        {{old('description') ?? $event->description ?? ''}}
                    </textarea>
                    @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('remarks') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Images:</label>
                <div class="col-md-7">
                    {{-- <div class="dropzone dropzone-default dropzone-brand" id="kt_dropzone_2">
						<div class="dropzone-msg dz-message needsclick">
						    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
						    <span class="dropzone-msg-desc">Upload up to 10 files</span>
						</div>
                    </div> --}}
                    <input type="file" name="image[]" multiple id="">
                    @if ($errors->has('remarks'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('remarks') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row">
                <label class="col-md-3 col-form-label"></label>
                <div class="col-md-7">
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
                </div>
            </div>


        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection
@push('js')
<script src="{{asset('contents/admin')}}/assets/js/pages/crud/file-upload/dropzonejs.js" type="text/javascript"> </script>
@endpush


