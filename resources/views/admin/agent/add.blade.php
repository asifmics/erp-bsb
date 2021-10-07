@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_agent')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/agent/create'))
                    Add New Agent
                    @else
                    Edit Agent
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$agent->slug}}">
                    <input type="hidden" name="id" value="{{$agent->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="{{route('all_agent')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Agent</a>

                    </div>
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
                <label class="col-md-3 col-form-label">Name:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" placeholder="Enter agent name" name="name" value="{{old('name') ?? $agent->name ?? ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">E-mail:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="email" value="{{old('email') ?? $agent->email ?? ''}}" placeholder="Enter agent email">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Phone:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $agent->phone ?? ''}}" placeholder="Enter agent phone">
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('address') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Address:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="address" value="{{old('address') ?? $agent->address ?? ''}}" placeholder="Enter agent address">
                    @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
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