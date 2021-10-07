@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_emp_leave')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/employeeleave/create'))
                    Add New Employee Leave
                    @else
                    Edit Employee Leave
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$emp_leave->slug}}">
                    <input type="hidden" name="id" value="{{$emp_leave->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_employee_leave')
                        <a href="{{route('all_emp_leave')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Employee Leave</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Employee Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif

            <div class="form-group row custom_row{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Branch Name:</label>
                <div class="col-md-7">
                    @php
                    $branches = App\Branch::where('status',1)->get();
                @endphp
                <select class="form-control" name="branch_id" required>
                    <option value="">Select Branch</option>
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id || ( isset($emp_leave) && $emp_leave->employee->branch == $branch->id)) selected @endif>{{ $branch->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('branch_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('branch_id') }}</strong>
                </span>
                @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Name:</label>
                <div class="col-md-7">
                    @php
                        if(isset($emp_leave)){
                            $employees = App\Employee::where('branch', $emp_leave->employee->branch)->get();
                        }
                    @endphp
                    <select class="form-control" name="employee_id" required>
                        @if(isset($emp_leave))
                        @foreach ($employees as $item)
                        <option value="{{ $item->id }}" @if($item->id == $emp_leave->employee_id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('employee_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('employee_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('leave_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Leave Type:</label>
                <div class="col-md-7">
                    @php
                        $type =App\Leave::where('status',1)->get();
                    @endphp
                    <select name="leave_id" id="" class="form-control" required>
                        <option value="">Select Leave Type</option>
                        @foreach ($type as $item)
                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" name="leave_id" value="{{old('leave_id') ?? $emp_leave->leave_id ?? ''}}"> --}}
                    @if ($errors->has('leave_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('leave_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('date_from') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Form:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="date_from" value="{{ old('date_from') ?? $emp_leave->date_from ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">
                    @if ($errors->has('date_from'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date_from') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('date_to') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">To:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="date_to" value="{{ old('date_to') ?? $emp_leave->date_to ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

                    @if ($errors->has('date_to'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date_to') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('reason') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Leave Reason:</label>
                <div class="col-md-7">
                    <textarea name="reason" id="" cols="30" rows="6" class="form-control">
                        {{old('reason') ?? $emp_leave->reason ?? ''}}
                    </textarea>
                    @if ($errors->has('reason'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('reason') }}</strong>
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
<script>
$('select[name="branch_id"]').on('change',function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
            if(id != '')
            {
                var id =$(this).val();
                $.ajax({
                    url: '{{ route('employee.getAjax') }}',
                    method: "POST",
                    data: {id:id},
                    dataType: "JSON",
                    success:function(data){
                        if(data != ''){
                        var d =$('select[name="employee_id"]').empty();
                        var html ='';
                        html +='<option label="Select Employee"></option>';
                        $.each(data, function(key, emp){
                            html += '<option value="'+ emp.id +'">' + emp.name + '</option>'
                            })
                            $('select[name="employee_id"]').html(html);
                        }else{
                            var d =$('select[name="employee_id"]').empty();
                        }
                 }
                })
            }

        })
</script>
@endpush


