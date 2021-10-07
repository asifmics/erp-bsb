<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Advance Salary Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_advance_salary') }}" method="POST" enctype="multipart/form-data">
                    @if (Request::is("dashboard/hr/employee/details/$employee->slug/advancesalary"))
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Add New Advance Salary Information</h3>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Edit Advance Salary Information</h3>
                            </div>
                        </div>
                        <input type="hidden" name="slug" value="{{ $advance->slug }}">
                        <input type="hidden" name="id" value="{{ $advance->id }}">
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('advance') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Advance Salary:</label>
                        <div class="col-md-7">
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                            <input type="number" class="form-control" name="advance"
                                value="{{ old('advance') ?? ($advance->advance ?? '') }}" placeholder="Enter Advance Salary">
                            @if ($errors->has('advance'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('advance') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="form-group row custom_row{{ $errors->has('reason') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Advance Reason:</label>
                        <div class="col-md-7">
                           <input type="text" class="form-control" name="reason" placeholder="Enter Advance Reason" value="{{old('reason') ?? $advance->reason ?? ''}}">
                            @if ($errors->has('reason'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="form-group row custom_row{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="date" value="{{ old('date') ?? $advance->date ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">

                            @if ($errors->has('date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row custom_row{{ $errors->has('month') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Month:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control month_only" readonly="readonly" name="month" value="{{ old('month') ?? $advance->month ?? Carbon\Carbon::now()->format('m')}}" id="month_only">
                            @if ($errors->has('month'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('month') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Year:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="year" value="{{ old('year') ?? $advance->year ?? Carbon\Carbon::now()->format('Y')}}" id="year_only">

                            @if ($errors->has('year'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('year') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="kt-portlet__foot text-center">
                        @if (Request::is("dashboard/hr/employee/details/$employee->slug/advancesalary"))
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
$advances = $employee->advance_salary;
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr class="bg-dark text-light">
                                <td>Advance Salary</td>
                                <td>Date</td>
                                <td>Month</td>
                                <td>Year</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($advances as $advance)
                                <tr>
                                    <td>{{ $advance->advance }}</td>
                                    <td>{{ Date('d M Y', strtotime($advance->date)) }}</td>
                                    <td>{{ date("F", mktime(null, null, null, $advance->month))}}</td>
                                    <td>{{ $advance->year }}</td>
                                    <td>
                                        <a href="{{route('edit_advance_salary', $advance->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{route('delete_advance_salary', $advance->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
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

</script>
