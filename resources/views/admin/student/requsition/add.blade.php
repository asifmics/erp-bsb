@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_requsition')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/student/requsition/create'))
                    Add New Student Requsition
                    @else
                    Edit Student Requsition
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$requsition->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="{{route('all_requsition')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Requsition</a>

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

            <div class="form-group row custom_row{{ $errors->has('country_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Country:</label>
                @php
                    $countries = App\Country::all();
                @endphp
                <div class="col-md-7">
                    {{-- <input type="text" class="form-control" placeholder="Enter agent name" name="country_id" value="{{old('country_id') ?? $agent->country_id ?? ''}}"> --}}
                    <select name="country_id" id="" class="form-control">
                        <option value="">Common</option>
                            @foreach ($countries as $item)
                            <option value="{{ $item->id }}" @if (old('country_id') ?? $requsition->country_id ?? '' == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('country_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Parent:</label>
                @php
                    $requsitions = App\StudentRequsition::where('parent_id', null)->get();
                @endphp
                <div class="col-md-7">
                    {{-- <input type="text" class="form-control" placeholder="Enter agent name" name="parent_id" value="{{old('parent_id') ?? $agent->parent_id ?? ''}}"> --}}
                    <select name="parent_id" id="" class="form-control">
                        <option value="">As a Requsition</option>
                        @foreach ($requsitions as $item)
                        <option value="{{ $item->id }}" @if (old('parent_id') ?? $requsition->parent_id ?? '' == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('parent_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Name</label>
                @php
                    $employees = App\Employee::where('status',1)->get();
                @endphp
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $requsition->name ?? ''}}" placeholder="Enter requsition name">
                    </select>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('payable_amount') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Account Payable</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="payable_amount" value="{{old('payable_amount') ?? $requsition->payable_amount ?? ''}}" placeholder="Enter Payable Amount">
                    </select>
                    @if ($errors->has('payable_amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('payable_amount') }}</strong>
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
