@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_shift')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/shift/create'))
                    Add New Shift Information
                    @else
                    Edit Shift Information
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$shift->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_shift')
                        <a href="{{route('all_shift')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Shift</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Shift Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Shift Name:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $shift->name ?? ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('start') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Shift Start:</label>
                <div class="col-md-7">
                    <input type="text" readonly="readonly" class="form-control" id="kt_timepicker_1"  name="start" value="{{old('start') ?? $shift->start ?? ''}}">
                    @if ($errors->has('start'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('start') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('end') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Shift End:</label>
                <div class="col-md-7">
                    {{-- <input type="text" name="out_time[]" id="kt_timepicker_2" readonly="readonly" value="" class="form-control"> --}}

                    <input type="text" readonly="readonly" class="form-control" id="kt_timepicker_1"  name="end" value="{{old('end') ?? $shift->end ?? ''}}">
                    @if ($errors->has('end'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('end') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('type') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Type:</label>
                <div class="col-md-7">
                    @php
                    $bloodGroup = ['Same Day', 'Next Day'];
                    @endphp
                    <select class="form-control kt-select2" id="kt_select2_1" name="type">
                        <option value="">Select Type</option>
                        @foreach($bloodGroup as $group)
                        <option value="{{$group}}"
                        @if (old('type') == $group || (isset($shift) && $shift->type == $group))
                            selected
                        @endif>{{$group}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
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
@push('js')
<script src="{{ asset('contents/admin/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js?v=7.1.2') }}"></script>
@endpush

