@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_holiday')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/holiday/create'))
                    Add New Holiday
                    @else
                    Edit Holiday
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$holiday->slug}}">
                    <input type="hidden" name="id" value="{{$holiday->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_holiday')
                        <a href="{{route('all_holiday')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Holiday</a>
                        @endcan
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
            <div class="form-group row custom_row{{ $errors->has('reason') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Holiday Reason:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" placeholder="Enter Holiday Reason" name="reason" value="{{old('reason') ?? $holiday->reason ?? ''}}">
                    @if ($errors->has('reason'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('reason') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">holiday Day:</label>
                <div class="col-md-7">
                    <div class="input-group date">
                        <input type="text" class="form-control" readonly="readonly" name="date" value="{{ old('date_from') ?? $holiday->date ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">
                        <div class="input-group-append"><span class="input-group-text">
                        <i class="la la-calendar"></i>
                        </span>
                        </div>
                    </div>
                    @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Holiday Description:</label>
                <div class="col-md-7">
                    {{-- <input type="text" class="form-control" name="description" value="{{old('description') ?? $holiday->description ?? ''}}"> --}}
                    <textarea placeholder="Enter Holiday description" name="description" class="form-control" id="" cols="30" rows="7">
                        {{old('description') ?? $holiday->description ?? ''}}
                    </textarea>
                    @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
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
