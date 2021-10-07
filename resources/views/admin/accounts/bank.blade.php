@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <form class="kt-form kt-form--label-right" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">

                        @if (Request::is('dashboard/accounts/bank'))
                            Bank Account
                        @else
                            Edit Bank Account
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $bankAccount->id }}">
                        @endif
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            {{-- <a href="#" class="btn btn-brand btn-elevate btn-icon-sm"><i
                                    class="fa fa-th"></i>All Reconciles</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                @if (Session::has('success'))
                    <script type="text/javascript">
                        swal({
                            title: "Success!",
                            text: "{{Session::get('success')}}",
                            icon: "success",
                            button: "OK",
                            timer: 5000,
                        });

                    </script>
                @endif
                @if (Session::has('error'))
                    <script type="text/javascript">
                        swal({
                            title: "Opps!",
                            text: "{{Session::get('error')}}",
                            icon: "error",
                            button: "OK",
                            timer: 5000,
                        });

                    </script>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Account Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name') ?? ($bankAccount->account_name ?? '') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Bank Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="bank_name"
                                    value="{{ old('bank_name') ?? ($bankAccount->bank_name ?? '') }}">
                                @if ($errors->has('bank_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Account Number:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="account_number"
                                    value="{{ old('account_number') ?? ($bankAccount->account_number ?? '') }}">
                                @if ($errors->has('account_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Bank Address:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="address"
                                    value="{{ old('address') ?? ($bankAccount->bank_address ?? '') }}">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Account Type:</label>
                            <div class="col-md-7">
                                @php
                                $bloodGroup = ['Savings Account', 'Current Account', 'Credit Account', 'Cash Account'];
                                @endphp
                                <select class="form-control kt-select2" id="kt_select2_3" name="type">
                                    <option value="">Select Type</option>
                                    @foreach ($bloodGroup as $key => $group)
                                        <option value="{{ $key }}" @if (old('type') == $key || (isset($bankAccount) && $bankAccount->type == $key))
                                            selected
                                    @endif>{{ $group }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('account_gl') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Account GL:</label>
                            <div class="col-md-7">
                                <select class="form-control kt-select2" id="kt_select2_2" name="account_gl">
                                    <option value="">Select Account GL</option>
                                    @foreach ($glAccount as $group)
                                    @if (isset($bankAccount) && $group->id != $bankAccount->id)    
                                    <option value="{{ $group->id }}" @if (old('account_gl') == $group->id || (isset($bankAccount) && $bankAccount->account_gl_id == $group->id))
                                        selected
                                    @endif>{{ ($group->code ?? '-----') . ' - ' . $group->name }}</option>
                                    @else
                                    <option value="{{ $group->id }}" @if (old('account_gl') == $group->id || (isset($bankAccount) && $bankAccount->account_gl_id == $group->id))
                                        selected
                                    @endif>{{ ($group->code ?? '-----') . ' - ' . $group->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('account_gl'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_gl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row custom_row{{ $errors->has('charge_gl') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Charge GL:</label>
                            <div class="col-md-7">
                                <select class="form-control kt-select2" id="kt_select2_1" name="charge_gl">
                                    <option value="">Select Charge GL</option>
                                    @foreach ($glAccount as $class)
                                        <option value="{{ $class->id }}" @if (old('charge_gl') == $class->id || (isset($bankAccount) && $bankAccount->charge_gl_id == $class->id))
                                            selected
                                    @endif>{{ ($class->code ?? '-----') . ' - ' . $class->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('charge_gl'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('charge_gl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        
                            @if (Request::is('dashboard/accounts/bank'))
                                <button class="btn btn-primary">Save</button>
                            @else
                                <button class="btn btn-primary">Update</button>
                            @endif
                        
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot text-center">
                {{-- <button type="submit" class="btn btn-md btn-brand">Reconcile All</button>
                --}}
            </div>
        </form>
    </div>

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-form kt-form--label-right">
            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Bank Address</th>
                                    <th>Account Type</th>
                                    <th>Account GL</th>
                                    <th>Charge GL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banks as $item)    
                                <tr>
                                    <td>{{$item->account_name}}</td>
                                    <td>{{$item->bank_name}}</td>
                                    <td>{{$item->account_number}}</td>
                                    <td>{{$item->bank_address}}</td>
                                    <td>{{$item->getTtype()}}</td>
                                    <td>{{$item->accountGl->code . ' - ' . $item->accountGl->name}}</td>
                                    <td>{{$item->chargeGl->code . ' - ' . $item->chargeGl->name}}</td>
                                    <td>
                                        <a href="{{route('edit_acc_bank', $item->id)}}" class="text-info" title="edit"><i
                                                class="fa fa-pen-square fa-2x"></i></a>
                                        <a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start-->
    <div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('softdelete_acc_bank') }}">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header alert_modal_header">
                        <h5 class="modal-title"><i class="fab fa-gg-circle"></i> Confirm Message</h5>
                    </div>
                    <div class="modal-body alert_modal_body">
                        Are you sure you want to delete?
                        <input type="hidden" id="modal_id" name="modal_id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                        <button type="button" class="btn btn-sm btn-brand" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
