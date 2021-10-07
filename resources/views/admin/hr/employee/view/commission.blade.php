<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Comission Information
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                @if ($employee->designation_id == 1 or $employee->designation_id == 2)
                <form action="{{ route('commission_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('comission_type') ? ' has-error' : '' }}">
                        <label class="col-md-5 col-form-label">Commission Type:</label>
                        <input type="hidden" name="slug" value="{{$employee->slug}}">
                        @php
                            $types = ['fixed' => 'Fixed','parcent'=>'Parcent'];
                        @endphp
                        <div class="col-md-6">
                            <select name="commission_type" id="" class="form-control">
                                <option value="">Please Select Type</option>
                            @foreach ($types as $key =>$type)
                            <option value="{{ $key }}" @if(old('commission_type') == $key || ( isset($employee) && $employee->commission_type == $key)) selected @endif>{{ $type }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('comission_type'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('comission_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('commission') ? ' has-error' : '' }}">
                        <label class="col-md-5 col-form-label">Commission:</label>
                        <div class="col-md-6">
                         <input type="text" name="commission" class="form-control" placeholder="Comission" value="{{old('commission') ?? $employee->commission ?? ''}}">
                            @if ($errors->has('commission'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('commission') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="kt-portlet__foot text-center">
                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                    </div>
                </form>
                @else
                <h5>Not eligible Commission</h5>
                @endif

            </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>
