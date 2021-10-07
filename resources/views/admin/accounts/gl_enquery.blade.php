@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('glInquiry.post')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    GL Inquiry
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        {{-- <a href="#"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Reconciles</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row custom_row">
                        <label class="col-md-3 col-form-label">From Date:</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="from_date" value="{{$from ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row custom_row">
                        <label class="col-md-3 col-form-label">To Date:</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="to_date" value="{{$to ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $gl_accounts = App\GlAccount::where('status',1)->get();
                @endphp
                <div class="col-md-4">
                    <div class="form-group row custom_row">
                        <label class="col-md-3 col-form-label">Account:</label>
                        <div class="col-md-7">
                            @php
                                $account_name = '';
                            @endphp
                            <select name="gl_id" class='form-control kt_select_1'>
                                @foreach ($gl_accounts as $account)
                                <option value="{{ $account->id }}" 
                                    @if (isset($gl_id_sel) && $gl_id_sel == $account->id)
                                        selected
                                        @php
                                            $account_name = $account->code . ' - ' . $account->name;
                                        @endphp
                                    @endif
                                    >{{ $account->code . ' - ' . $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-4">
                    <div class="form-group row custom_row">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <h3>{{$account_name}}</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Referance</th>
                                <th>Date</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Memo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($journals ?? false)

                            <tr>
                                <td colspan="2"> Opening Balance - {{$from}}</td>
                                @if ($opening_balance > 0)
                                <td>{{$opening_balance}}</td>
                                <td></td>
                                @else
                                <td></td>
                                <td>{{$opening_balance * (-1)}}</td>
                                @endif
                                <td></td>
                            </tr>
                            @php
                                $clossing_balance = $opening_balance;
                            @endphp
                            @foreach ($journals as $item)
                            <tr>
                                <td> <a href="{{route('gl.show', $item->journal_id)}}" target="_blank">{{$item->journal_info->referance}}</a> </td>
                                <td>{{$item->txn_date}}</td>
                                @if ($item->amount > 0)
                                <td>{{$item->amount}}</td>
                                <td></td>
                                @else
                                <td></td>
                                <td>{{$item->amount * (-1)}}</td>
                                @endif
                                <td>{{$item->memo}}</td>
                            </tr>
                            @php
                                $clossing_balance += $item->amount;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="2"> Closing Balance - {{$from}}</td>
                                @if ($clossing_balance > 0)
                                <td>{{$clossing_balance}}</td>
                                <td></td>
                                @else
                                <td></td>
                                <td>{{$clossing_balance * (-1)}}</td>
                                @endif
                                <td></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="7">No records Found</td>
                                
                            </tr>
                            @endif
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot text-center">
            {{-- <button type="submit" class="btn btn-md btn-brand">Reconcile All</button> --}}
        </div>
    </form>
</div>
@endsection