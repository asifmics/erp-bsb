@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <form class="kt-form kt-form--label-right" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">

                        @if (Request::is('dashboard/accounts/class'))
                            Account Class
                        @else
                            Edit Account Class
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $accountClass->id }}">
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
                    <div class="col-md-5">
                        <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name') ?? ($accountClass->name ?? '') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row custom_row{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-form-label">Type:</label>
                            <div class="col-md-7">
                                @php
                                $bloodGroup = ['Assets', 'Liabilities', 'Income', 'Expense'];
                                @endphp
                                <select class="form-control kt-select2" id="kt_select2_1" name="type">
                                    <option value="">Select Type</option>
                                    @foreach ($bloodGroup as $group)
                                        <option value="{{ $group }}" @if (old('type') == $group || (isset($accountClass) && $accountClass->type == $group))
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
                    <div class="col-md-2">
                        <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                            @if (Request::is('dashboard/accounts/class'))
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
                                    <th>Class Name</th>
                                    <th>Class Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accclass as $item)    
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        <a href="{{route('edit_acc_class', $item->id)}}" class="text-info" title="edit"><i
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
            <form method="post" action="{{ route('softdelete_acc_class') }}">
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
