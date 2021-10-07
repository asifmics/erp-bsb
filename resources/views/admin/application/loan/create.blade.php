@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_loan')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/loan/application'))
                    Application New Loan
                    @else
                    Edit Loan
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$loan->slug}}">
                    <input type="hidden" name="id" value="{{$loan->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        {{--  @can('all_loan')
                        <a href="{{route('all_loan_details')}}"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Loan</a>
                        @endcan  --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Loan Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            {{--
            <div class="form-group row custom_row{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Branch Name:</label>
                <div class="col-md-7">
                    @php
                    $branches = App\Branch::where('status',1)->get();
                @endphp
                <select class="form-control" name="branch_id" required>
                    <option value="">Select Branch</option>
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id || ( isset($loan) && $loan->employee->branch == $branch->id)) selected @endif>{{ $branch->name }}</option>
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
                    if(isset($loan)){
                        $employees = App\Employee::where('branch', $loan->employee->branch)->get();
                    }
                @endphp
                <select class="form-control" name="employee_id" required>
                    @if(isset($loan))
                    @foreach ($employees as $item)
                    <option value="{{ $item->id }}" @if($item->id == $loan->employee_id) selected @endif>{{ $item->name }}</option>
                    @endforeach
                    @endif
                </select>
                    @if ($errors->has('employee_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('employee_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  --}}

            @php
                $user = Auth::user()->email;
                $emp = App\Employee::where('email',$user)->first();

            @endphp

            @if(isset($emp))
            <div class="form-group row custom_row{{ $errors->has('loan_amount') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Loan Amount:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="loan_amount" placeholder="Enter loan amount" value="{{old('loan_amount') ?? $loan->loan_amount ?? ''}}">
                    @if ($errors->has('loan_amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('loan_amount') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('loan_taken_date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Loan Taken Date:</label>
                <div class="col-md-7">
                    <div class="input-group date loan_taken_date">
                        <input type="text" class="form-control" readonly="readonly" name="loan_taken_date" value="{{ old('date_from') ?? $loan->loan_taken_date ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">
                        <div class="input-group-append">	<span class="input-group-text">
                        <i class="la la-calendar"></i>
                        </span>
                        </div>
                    </div>
                    @if ($errors->has('loan_taken_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('loan_taken_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('duration') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Loan Duration (Year):</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="duration" placeholder="Enter duration" value="{{old('duration') ?? $loan->duration ?? ''}}">
                    @if ($errors->has('duration'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('duration') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('monthly_installment') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Monthly Installment:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="monthly_installment" placeholder="Enter Monthly Installment" value="{{old('monthly_installment') ?? $loan->monthly_installment ?? ''}}">
                    @if ($errors->has('monthly_installment'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('monthly_installment') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            {{-- <div class="form-group row custom_row{{ $errors->has('given_installment') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Given Installment:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="given_installment" placeholder="Enter Given installment" value="{{old('given_installment') ?? $loan->given_installment ?? ''}}">
                    @if ($errors->has('given_installment'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('given_installment') }}</strong>
                    </span>
                    @endif
                </div>
            </div> --}}


        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
        @else
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="alert alert-warning" role="alert">
                    Your Data not find in employee table
                </div>
            </div>
        </div>

        @endif
    </form>
</div>
@endsection
@push('js')
<script src="{{asset('contents/admin')}}/assets/js/pages/crud/file-upload/dropzonejs.js" type="text/javascript"> </script>

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



