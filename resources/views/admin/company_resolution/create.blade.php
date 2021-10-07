@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_resolution')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/company-resolution/create'))
                    Add New Company Resolution
                    @else
                    Edit Resolution
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$resolution->slug}}">
                    <input type="hidden" name="id" value="{{$resolution->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_resolutions')
                        <a href="{{route('resolutions')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Resolutions</a>
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
            <div class="form-group row custom_row{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Resolution Title:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" placeholder="Enter resolution title" name="title" value="{{old('title') ?? $resolution->title ?? ''}}">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('pdf_file') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Resolutions PDF File:</label>
                <div class="col-md-7">
                    <input type="file" class="form-control" name="pdf_file" value="{{old('pdf_file') ?? $resolution->pdf_file ?? ''}}">
                    @if ($errors->has('pdf_file'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pdf_file') }}</strong>
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
