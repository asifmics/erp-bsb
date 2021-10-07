@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action=""
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    
                    @if (Request::is('dashboard/accounts/transfer'))
                    Add New Transfer Information
                    @else
                    Edit Transfer Information
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$department->slug}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="#"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Transfers</a>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" id="kt_datepicker_1" value="{{old('name') ?? $department->name ?? ''}}" autocomplete="off">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Referance:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{old('name') ?? $department->name ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $bank_accounts = App\BankAccount::all();
                @endphp
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">From:</label>
                        <div class="col-md-7">
                            <select name="bank_id" class='form-control kt_select2'>
                                @foreach ($bank_accounts as $account)
                                <option value="{{ $account->id }}" 
                                    @if ($payment->bank_id ?? '' == $account->id)
                                        selected
                                    @endif
                                    >{{ $account->account_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('bank_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">To:</label>
                        <div class="col-md-7">
                            <select name="bank_id" class='form-control kt_select2'>
                                @foreach ($bank_accounts as $account)
                                <option value="{{ $account->id }}" 
                                    @if ($payment->bank_id ?? '' == $account->id)
                                        selected
                                    @endif
                                    >{{ $account->account_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('bank_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Amount:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{old('name') ?? $department->name ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Bank Charge:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{old('name') ?? $department->name ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Memo:</label>
                        <div class="col-md-7">
                            <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection