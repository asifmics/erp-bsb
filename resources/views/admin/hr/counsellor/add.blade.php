@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_counsellor')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/counsellor/create'))
                    Add New Counsellor
                    @else
                    Edit Counsellor
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$counsellor->slug}}">
                    <input type="hidden" name="id" value="{{$counsellor->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="{{route('all_counsellor')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Counsellor</a>

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

            <div class="form-group row custom_row{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Parent:</label>
                @php
                    $counsellors = App\CounsellorGenerate::where('parent_id', null)->get();
                @endphp
                <div class="col-md-7">
                    {{-- <input type="text" class="form-control" placeholder="Enter agent name" name="parent_id" value="{{old('parent_id') ?? $agent->parent_id ?? ''}}"> --}}
                    <select name="parent_id" id="" class="form-control">
                        <option value="">As a Counsellor</option>
                        @foreach ($counsellors as $item)
                        <option value="{{ $item->id }}">{{ $item->counsellor->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('parent_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('counsellor_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Assistance Counsellor</label>
                @php
                    $employees = App\Employee::where('status',1)->get();
                @endphp
                <div class="col-md-7">
                    {{-- <input type="text" class="form-control" name="email" value="{{old('email') ?? $agent->email ?? ''}}" placeholder="Enter agent email"> --}}
                    <select name="counsellor_id" id="" class="form-control">
                        <option value="">Please Select Assistant Counsellor</option>
                        @foreach ($employees as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('counsellor_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('counsellor_id') }}</strong>
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
