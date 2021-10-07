@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_salary_scale')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    
                    @if (Request::is('dashboard/hr/salary_scale/create'))
                    Add New Salary Scale Information
                    @else
                    Edit Salary Scale Information
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$salary->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_salary_scale')
                        <a href="{{route('all_salary_scale')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Salary Scale</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Salary Scale Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Salary Scale Name:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $salary->name ?? ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Salary Scale Amount:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="amount" value="{{old('amount') ?? $salary->amount ?? ''}}">
                    @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
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