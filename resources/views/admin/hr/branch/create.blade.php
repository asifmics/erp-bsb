@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_branch')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    
                    @if (Request::is('dashboard/hr/branch/create'))
                    Add New Branch Information
                    @else
                    Edit Branch Information
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$branch->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_branch')
                        <a href="{{route('all_branch')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Branch</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Branch Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Branch Name:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $branch->name ?? ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('departments') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Departments:</label>
                <div class="col-md-7">
                    @php
                    $bloodGroup = \App\Department::all();
                    @endphp
                    <select class="form-control kt-select2" id="kt_select2_1" name="departments[]" multiple>
                        <option value="">Select Departments</option>
                        @foreach($bloodGroup as $group)
                        <option value="{{$group->name}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('departments'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('departments') }}</strong>
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