@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('call_save')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    @if (Request::is('dashboard/employee/call/create'))
                    Add New Call
                    @else
                    Edit Call
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$call->slug}}">
                    <input type="hidden" name="id" value="{{$call->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    {{-- <div class="kt-portlet__head-actions">
                        @can('all_resolutions')
                        <a href="{{route('resolutions')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Resolutions</a>
                        @endcan
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Department Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Caller Name:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{old('name') ?? $call->name ?? ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('number') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Call Number:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="number" placeholder="Enter Caller Number" value="{{old('number') ?? $call->number ?? ''}}">
                    @if ($errors->has('number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('note') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Note:</label>
                <div class="col-md-7">
                    <textarea name="note" class="form-control" id="" placeholder="Enter Caller Note" rows="5">
                        {{old('note') ?? $call->note ?? ''}}
                    </textarea>
                    @if ($errors->has('note'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('note') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection
