<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Experience Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_experience') }}" method="POST" enctype="multipart/form-data">
                    @if (Request::is("dashboard/hr/employee/details/$employee->slug/experience"))
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Add New Experience Information</h3>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Edit Experience Information</h3>
                            </div>
                        </div>
                        <input type="hidden" name="slug" value="{{ $exp->slug }}">
                        <input type="hidden" name="id" value="{{ $exp->id }}">
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('company_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Company Name:</label>
                        <div class="col-md-7">
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                            <input type="text" class="form-control" name="company_name"
                                value="{{ old('company_name') ?? ($exp->company_name ?? '') }}" placeholder="Enter Company Name">
                            @if ($errors->has('company_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('designation') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Designation:</label>
                        <div class="col-md-7">
                           <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="{{old('designation') ?? $exp->designation ?? ''}}">
                            {{-- <input type="text" class="form-control" name="designation" value="{{old('designation') ?? $experience->designation ?? ''}}"> --}}
                            @if ($errors->has('designation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row custom_row{{ $errors->has('date_from') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Form:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="date_from" value="{{ old('date_from') ?? $exp->date_from ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

                            @if ($errors->has('date_from'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_from') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('date_to') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">To:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="date_to" value="{{ old('date_to') ?? $exp->date_to ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">

                            @if ($errors->has('date_to'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_to') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row custom_row{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Description:</label>
                        <div class="col-md-7">
                            <textarea name="description" id="" cols="30" rows="6" class="form-control" placeholder="Enter Experience Description">
                                {{old('description') ?? $exp->description ?? ''}}
                            </textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="kt-portlet__foot text-center">
                        @if (Request::is("dashboard/hr/employee/details/$employee->slug/experience"))
                            <button type="submit" class="btn btn-md btn-brand">Save</button>
                        @else
                            <button type="submit" class="btn btn-md btn-brand">Update</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@php
$experience = $employee->experience;
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr class="bg-dark text-light">
                                <td>Company Name</td>
                                <td>Designation</td>
                                <td>Date From</td>
                                <td>Date To</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($experience as $exp)
                                <tr>
                                    <td>{{ $exp->company_name }}</td>
                                    <td>{{ $exp->designation }}</td>
                                    <td>{{ Date('d M Y', strtotime($exp->from)) }}</td>
                                    <td>{{ Date('d M Y', strtotime($exp->to)) }}</td>
                                    <td>{{ Str::limit($exp->description, 50)}}</td>

                                    <td>
                                        <a href="{{route('edit_experience', $exp->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{route('delete_experience', $exp->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
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
