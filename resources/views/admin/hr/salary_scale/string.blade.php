@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">All Salary String Information</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_salary_string')
                        <a href="{{route('all_salary_scale')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Salary Scale</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
                <thead class="thead-dark">
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($strings as $salary)
                        <tr>
                            <td>{{ $salary->id }}</td>
                            <td>{{ $salary->name }}</td>
                            <td>{{ $salary->amount }}</td>
                            <td>{{ $salary->type }}</td>
                            <td>
                                <a href="#" class="text-info" title="edit"><i class="fa fa-pen-square fa-2x"></i></a>
                                <a href="#" class="text-danger" title="delete"><i class="fa fa-trash fa-2x"></i></a>
                            </td>
                        </tr>

                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="kt-portlet__foot">
            ...
        </div>
    </div>

    <div class="kt-portlet kt-portlet--mobile">
        <form class="kt-form kt-form--label-right" method="post" action="{{ route('add_salary_string') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">Add New Salary String Information</h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                @if (Session::has('success'))
                    <script type="text/javascript">
                        swal({
                            title: "Success!",
                            text: "New Salary Scale Added Successfully.",
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
                            text: "Error! Please try again",
                            icon: "error",
                            button: "OK",
                            timer: 5000,
                        });

                    </script>
                @endif
                <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-3 col-form-label">Salary String Name:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row custom_row{{ $errors->has('amount') ? ' has-error' : '' }}">
                    <label class="col-md-3 col-form-label">Salary String Amount:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
                        @if ($errors->has('amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row custom_row{{ $errors->has('type') ? ' has-error' : '' }}">
					<label class="col-md-3 col-form-label">Salary String Type:</label>
					<div class="col-md-7">
						@php
						$bloodGroup = ['Fixed', 'Persent'];
						@endphp
						<select class="form-control kt-select2" id="kt_select2_1" name="type">
							<option value="">Select String Type</option>
							@foreach($bloodGroup as $group)
							<option value="{{$group}}">{{$group}}</option>
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
            <div class="kt-portlet__foot text-center">
                <button type="submit" class="btn btn-md btn-brand">SAVE</button>
            </div>
        </form>
    </div>
@endsection
