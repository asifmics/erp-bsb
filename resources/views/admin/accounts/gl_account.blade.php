@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <form class="kt-form kt-form--label-right" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">

                        @if (Request::is('dashboard/accounts/gl-account'))
                            GL Account
                        @else
                            Edit GL Account
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $glAccount->id }}">
                        @endif
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
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
                    <div class="col-md-5">
                        <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name') ?? ($glAccount->name ?? '') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row custom_row{{ $errors->has('group') ? ' has-error' : '' }}">
                            <label class="col-md-5 col-form-label">Account Group:</label>
                            <div class="col-md-7">
                                <select class="form-control kt-select2" id="kt_select2_1" name="group">
                                    <option value="">Select group</option>
                                    @foreach ($accgroup as $group)
                                        <option value="{{ $group->id }}" @if (old('group') == $group->id || (isset($glAccount) && $glAccount->group_id == $group->id))
                                            selected
                                    @endif>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('group'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <div class="form-group row custom_row{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Code:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="code"
                                    value="{{ old('code') ?? ($glAccount->code ?? '') }}">
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row custom_row{{ $errors->has('opening_balance') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-form-label">Opening Balance:</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="opening_balance"
                                    value="{{ old('opening_balance') ?? ($glAccount->opening_balance ?? '') }}" step="0.01">
                                @if ($errors->has('opening_balance'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('opening_balance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                            @if (Request::is('dashboard/accounts/gl-account'))
                                <button class="btn btn-primary">Save</button>
                            @else
                                <button class="btn btn-primary">Update</button>
                            @endif
                        </div>
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
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Group Name</th>
                                    <th>Opening Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($glAccounts as $item)    
                                <tr>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->groupDetails->name}}</td>
                                    <td>{{$item->opening_balance ?? 00}}</td>
                                    <td>
                                        <a href="{{route('edit_acc_gl', $item->id)}}" class="text-info" title="edit"><i
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
            <form method="post" action="{{ route('softdelete_acc_gl') }}">
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
