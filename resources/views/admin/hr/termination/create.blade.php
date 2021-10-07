@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_termination')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/termination/create'))
                    Add New Termination
                    @else
                    Edit Termination
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$termination->slug}}">
                    <input type="hidden" name="id" value="{{$termination->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_termination')
                        <a href="{{route('all_termination')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Termination</a>
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
            <div class="form-group row custom_row{{ $errors->has('reason') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Termination Reason:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="reason" value="{{old('reason') ?? $termination->reason ?? ''}}">
                    @if ($errors->has('reason'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('reason') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Branch Name:</label>
                <div class="col-md-7">
                    @php
                    $branches = App\Branch::where('status',1)->get();
                @endphp
                <select class="form-control" name="branch_id" required>
                    <option value="">Select Branch</option>
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id || ( isset($termination) && $termination->branch_id == $branch->id)) selected @endif>{{ $branch->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('branch_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('branch_id') }}</strong>
                </span>
                @endif
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Name:</label>
                <div class="col-md-7">
                    @php
                    if(isset($resignation)){
                        $employees = App\Employee::where('branch', $termination->branch_id)->get();
                    }
                @endphp
                <select class="form-control" name="employee_id" required>
                    @if(isset($termination))
                    @foreach ($employees as $item)
                    <option value="{{ $item->id }}" @if($item->id == $termination->employee_id) selected @endif>{{ $item->name }}</option>
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
            <div class="form-group row custom_row{{ $errors->has('notice_date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Notice Date:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="notice_date" value="{{ old('notice_date') ?? $termination->notice_date ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

                    @if ($errors->has('notice_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('notice_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('termination_date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Termination Date:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="termination_date" value="{{ old('termination_date') ?? $termination->termination_date ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

                    @if ($errors->has('termination_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('termination_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Termination :Description</label>
                <div class="col-md-7">
                    <textarea name="description" id="" class="form-control" cols="30" rows="7">{{old('description') ?? $termination->description ?? ''}}</textarea>
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


