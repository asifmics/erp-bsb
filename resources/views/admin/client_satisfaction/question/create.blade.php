@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_cs_question')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/client-staisfaction/question/create'))
                    Add New Client Satisfaction Question
                    @else
                    Edit Client Satisfaction Question
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$question->slug}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                    @can('all_client_question')
                           <a href="{{route('all_cs_question')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Question</a>
                    @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Question Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="form-group row custom_row{{ $errors->has('question') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Question:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="question" value="{{old('question') ?? $question->question ?? ''}}">
                    @if ($errors->has('question'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('question') }}</strong>
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
