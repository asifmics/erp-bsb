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
                    
                    @if (Request::is('dashboard/accounts/reconcile'))
                    Add New Reconcile Information
                    @else
                    Edit Reconcile Information
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$department->slug}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="#"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Reconciles</a>
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
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" id="kt_datepicker_1" value="{{old('name') ?? $department->name ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Account:</label>
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
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Bank Statement:</label>
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
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Beginning Balance:</label>
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
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Ending Balance:</label>
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
            </div>
            <div class="row">
                <div class="col-md-12"> <h2>Reconcile Items</h2> </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Referance</th>
                                <th>Date</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7">No records Found</td>
                                
                            </tr>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">Reconcile All</button>
        </div>
    </form>
</div>
@endsection