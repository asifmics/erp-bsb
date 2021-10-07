<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Provident Fund Information
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                @if ($employee->eligible_status == 'Yes')
                <form action="{{ route('providentfund_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('company_provident') ? ' has-error' : '' }}">
                        <label class="col-md-5 col-form-label">Copmany Provident:</label>
                        <input type="hidden" name="slug" value="{{$employee->slug}}">
                        <input type="hidden" name="id" value="{{$employee->id}}">
                        <div class="col-md-6">
                         <input type="text" name="company_provident" class="form-control" placeholder="Company Provident Fund" value="{{old('company_provident') ?? $employee->provident->company_provident ?? ''}}">
                            @if ($errors->has('company_provident'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company_provident') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('employee_provident') ? ' has-error' : '' }}">
                        <label class="col-md-5 col-form-label">Employee Provident:</label>
                        <div class="col-md-6">
                         <input type="text" name="employee_provident" class="form-control" placeholder="Company Provident Fund" value="{{old('employee_provident') ?? $employee->provident->employee_provident ?? ''}}">
                            @if ($errors->has('employee_provident'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('employee_provident') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="kt-portlet__foot text-center">
                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                    </div>
                </form>
                @else
                <h5>Not eligible provident fund</h5>
                @endif

            </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>
