@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_installment')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/installment-details/create'))
                    Add New Installment
                    @else
                    Edit Installment
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$installment->slug}}">
                    <input type="hidden" name="paid" value="{{$installment->loan->paid_amount}}">
                    <input type="hidden" name="id" value="{{$installment->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{route('all_installment')}}"
                        @can('all_installment_details')
                        class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Installment</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Installment Added Successfully.", icon: "success", button: "OK", timer:5000,});
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
                        <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id || ( isset($installment) && $installment->loan->employee->branch == $branch->id)) selected @endif>{{ $branch->name }}</option>
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
                    if(isset($installment)){
                        $employees = App\Employee::where('branch', $installment->loan->employee->branch)->get();
                    }
                @endphp
                <select class="form-control" name="employee_id" required>
                    @if(isset($installment))
                    @foreach ($employees as $item)
                    <option value="{{ $item->id }}" @if($item->id == $installment->loan->employee_id) selected @endif>{{ $item->name }}</option>
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

            <div class="form-group row custom_row{{ $errors->has('loan_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Loan Details:</label>
                <div class="col-md-7">
                    @php
                    if(isset($installment)){
                        $loans = App\LoanDetails::where('employee_id', $installment->loan->employee_id)->get();
                    }
                @endphp
                    <select class="form-control" name="loan_id" required>
                        @if (isset($installment))
                        @foreach ($loans as $item)
                            <option value="{{ $item->id }}" @if($item->id == $installment->loan->id) selected @endif>{{ 'Amount-  '.$item->loan_amount. '/  Date-  '.$item->loan_taken_date }}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('loan_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('loan_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('installment_amount') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Installment Amount:</label>
                <div class="col-md-7">
                   <input type="text" class="form-control" name="installment_amount" placeholder="Enter Installment Amount" value="{{old('installment_amount') ?? $installment->installment_amount ?? ''}}">
                    @if ($errors->has('installment_amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('installment_amount') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Payment Date:</label>
                <div class="col-md-7">
                    <div class="input-group date payment_date">
                        <input type="text" class="form-control" readonly="readonly" name="payment_date" value="{{ old('payment_date') ?? $installment->payment_date ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">
                        <div class="input-group-append">	<span class="input-group-text">
                        <i class="la la-calendar"></i>
                        </span>
                        </div>
                    </div>
                    @if ($errors->has('payment_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('payment_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('received_by') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Recevied By:</label>
                <div class="col-md-7">
                    <div class="input-group date received_by">
                        <input type="text" class="form-control" name="received_by" value="{{ old('received_by') ?? $installment->received_by ?? ''}}">
                    </div>
                    @if ($errors->has('received_by'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('received_by') }}</strong>
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
<script>
    $('select[name="employee_id"]').on('change',function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });
                if(id != '')
                {
                    var id =$(this).val();
                    $.ajax({
                        url: '{{ route('loan.getAjax') }}',
                        method: "POST",
                        data: {id:id},
                        dataType: "JSON",
                        success:function(data){
                            console.log(data);
                            if(data != ''){
                            var d =$('select[name="loan_id"]').empty();
                            var html ='';
                            html +='<option label="Select Loan Details"></option>';
                            $.each(data, function(key, loan){
                                html += '<option value="'+ loan.id +'">'+ 'Amount-' + loan.loan_amount +'  /  Date:'+ loan.loan_taken_date+'</option>'
                                })
                                $('select[name="loan_id"]').html(html);
                            }else{
                                var d =$('select[name="loan_id"]').empty();
                            }
                     }
                    })
                }

            })
</script>
@endpush



