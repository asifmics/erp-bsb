@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_experience')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/experience/create'))
                    Add New Experience
                    @else
                    Edit Experience
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$experience->slug}}">
                    <input type="hidden" name="id" value="{{$experience->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{route('all_experience')}}"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Experience</a>
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

            <div class="form-group row custom_row{{ $errors->has('copmany_name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Copmany Name:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" value="{{old('copmany_name') ?? $experience->company_name ?? ''}}">
                    {{-- <input type="text" class="form-control" name="copmany_name" value="{{old('copmany_name') ?? $experience->copmany_name ?? ''}}"> --}}
                    @if ($errors->has('copmany_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('copmany_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('designation') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Designation:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="{{old('designation') ?? $experience->designation ?? ''}}">
                    {{-- <input type="text" class="form-control" name="designation" value="{{old('designation') ?? $experience->designation ?? ''}}"> --}}
                    @if ($errors->has('designation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('designation') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('date_from') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Form:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="date_from" value="{{ old('date_from') ?? $experience->date_from ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

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
                    <input type="text" class="form-control" readonly="readonly" name="date_to" value="{{ old('date_to') ?? $experience->date_to ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

                    @if ($errors->has('date_to'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date_to') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Description:</label>
                <div class="col-md-7">
                    <textarea name="description" id="" cols="30" rows="6" class="form-control">
                        {{old('description') ?? $experience->description ?? ''}}
                    </textarea>
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
{{-- <script>
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
</script> --}}
@endpush


