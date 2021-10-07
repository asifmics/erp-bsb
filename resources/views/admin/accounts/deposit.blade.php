@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('deposit')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    
                    @if (Request::is('dashboard/accounts/deposit/create'))
                    Add New Deposit Information
                    @else
                    Edit Deposit Information
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$deposit->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{route('deposit.index')}}"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Deposits</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Diposit Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="date" id="kt_datepicker_1" value="{{old('date') ?? $deposit->date ?? ''}}">
                            @if ($errors->has('date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $bank_accounts = App\BankAccount::all();
                @endphp
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">TO:</label>
                        <div class="col-md-7">
                            <select name="bank_id" class='form-control kt_select2'>
                                @foreach ($bank_accounts as $account)
                                <option value="{{ $account->id }}"
                                    @if ($deposit->bank_id ?? '' == $account->id)
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
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('referance') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Referance:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="referance" value="{{old('referance') ?? $deposit->referance ?? ''}}">
                            @if ($errors->has('referance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('referance') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row custom_row{{ $errors->has('order_of') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">To the Order of:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="order_of" value="{{old('order_of') ?? $deposit->order_of ?? ''}}">
                            @if ($errors->has('order_of'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('order_of') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> <h2>Payment Items</h2> </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        @php
                        $gl_accounts = App\GlAccount::where('status',1)->get();
                        @endphp
                        <tbody>
                            @if (Request::is('dashboard/accounts/deposit/create'))
                            <tr>
                                <td class="account_code">
                                    <select name="account[]" class='form-control kt_select2'>
                                        @foreach ($gl_accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="amount[]"></td>
                                <td><input type="text" class="form-control" name="desc[]"></td>
                                <td><button type="button" class="btn btn-sm btn-warning AddItem">Add Item</button></td>
                            </tr>
                            @else
                            @foreach ($deposit->details as $item)
                            <tr>
                                <td class="account_code">
                                    <select name="account[]" class='form-control'>
                                        @foreach ($gl_accounts as $account)
                                        <option value="{{ $account->id }}" @if ($item->gl_id == $account->id)
                                            selected
                                        @endif>{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control debit" value="{{ $item->amount }}" name="amount[]"></td>
                                <td><input type="text" class="form-control" value="{{ $item->description }}" name="desc[]"></td>
                                <td><button type="button" class="btn btn-sm btn-warning AddItem">Add Item</button></td>
                            </tr>
                            @endforeach

                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <textarea name="memo" class="form-control" id="" cols="30" rows="10" placeholder="Memo">{{$deposit->memo ?? ''}}</textarea>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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
    var i =1;
    $('.AddItem').on('click',function(){
        var account = $('.account_code').html();
    var last = i++;
        var html =  '<tr class="additeamnew'+last+'">'+
                        '<td>'+account+'</td>'+
                        '<td><input type="text" class="form-control" name="amount[]"></td>'+
                        '<td><input type="text" class="form-control" name="desc[]"></td>'+
                        '<td><button type="button" class="btn btn-sm btn-danger remove_item" data-id="'+last+'">Remove Item</button></td>'+
                    '</tr>';
    $('table tbody').append(html);
    $(document).on('click','.remove_item',function(){
        var id = $(this).data('id');
        $('.additeamnew'+id+'').remove();
    });
    });
</script>
@endpush