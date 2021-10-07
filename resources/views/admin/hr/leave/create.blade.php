@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_leave')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/leave/create'))
                    Add New Leaver Type
                    @else
                    Edit Leave Type
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$leave->slug}}">
                    <input type="hidden" name="id" value="{{$leave->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_leave')
                        <a href="{{route('all_leave')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Leave</a>
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
            <div class="form-group row custom_row{{ $errors->has('type') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Leave Type:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="type" value="{{old('type') ?? $leave->type ?? ''}}">
                    @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('leave_day') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Leave Day:</label>
                <div class="col-md-7">
                    @php
                        $day = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30');
                    @endphp
                   <select name="leave_day" id="" class="form-control">
                       <option value="">Select Day</option>
                       @foreach ($day as $item)
                       <option value="{{ $item }}" @if (old('leave_day') == $item || isset($leave) && $leave->leave_day == $item) selected @endif>{{ $item }}</option>
                       @endforeach
                   </select>
                    @if ($errors->has('leave_day'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('leave_day') }}</strong>
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
