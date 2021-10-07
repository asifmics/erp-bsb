@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <form class="kt-form kt-form--label-right" method="post" action='{{ isset($editable) ? url("dashboard/certification/agent/$editable->slug") : url("dashboard/certification/agent") }}' enctype="multipart/form-data">
            @csrf

            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">
                        Add New Client Satisfaction Certification
                    </h3>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            @php
                                session()->forget('success');
                            @endphp
                        </div>
                    @endif
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{{url('dashboard/certification')}}"
                               class="btn btn-brand btn-elevate btn-icon-sm"><i
                                    class="fa fa-th"></i>All Certification</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group row ">
                    <label class="col-md-3 col-form-label">Certification Name:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="name"
                               value="{{ old('name', $editable->name ?? '') }}">
                        @if ($errors->has('name'))
                            <span style="margin-top: 10px" class="text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
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
