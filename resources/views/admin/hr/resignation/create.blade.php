@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_resignation')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/resignation/create'))
                    Add New Resignation
                    @else
                    Edit Resignation
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$resignation->slug}}">
                    <input type="hidden" name="id" value="{{$resignation->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_resignation')
                        <a href="{{route('all_resignation')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Resignation</a>
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
            <div class="form-group row custom_row{{ $errors->has('resignation_for') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Resignation For:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="resignation_for" value="{{old('resignation_for') ?? $resignation->resignation_for ?? ''}}">
                    @if ($errors->has('resignation_for'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('resignation_for') }}</strong>
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
                    <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id || ( isset($resignation) && $resignation->branch_id == $branch->id)) selected @endif>{{ $branch->name }}</option>
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
                    if(isset($resignation)){
                        $employees = App\Employee::where('branch', $resignation->branch_id)->get();
                    }
                @endphp
                <select class="form-control" name="employee_id" required>
                    @if(isset($resignation))
                    @foreach ($employees as $item)
                    <option value="{{ $item->id }}" @if($item->id == $resignation->employee_id) selected @endif>{{ $item->name }}</option>
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
                    <input type="text" class="form-control" readonly="readonly" name="notice_date" value="{{ old('notice_date') ?? $resignation->notice_date ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">

                    @if ($errors->has('notice_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('notice_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('resignation_date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Resignation Date:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="resignation_date" value="{{ old('resignation_date') ?? $resignation->resignation_date ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">

                    @if ($errors->has('resignation_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('resignation_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('reason') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Resignation Reason:</label>
                <div class="col-md-7">
                    <textarea name="reason" id="" class="form-control" cols="30" rows="7">{{old('reason') ?? $resignation->reason ?? ''}}</textarea>

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


