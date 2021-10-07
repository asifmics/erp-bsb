<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Contact Information
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('contact_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  
                    <input type="hidden" name="slug" value="{{$employee->slug}}">
                    <input type="hidden" name="id" value="{{$employee->id}}">
                    <div class="form-group row custom_row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">E-mail:</label>
                        <div class="col-md-7">
                            <input type="email" class="form-control" name="email" value="{{old('email') ?? $employee->email ?? '' }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Phone:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $employee->phone ?? '' }}">
                           
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Whatsapp:</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="whatsapp">{{old('whatsapp') ?? $employee->whatsapp ?? '' }}</textarea>
                            @if ($errors->has('whatsapp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('whatsapp') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('present_address') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Present Address:</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="present_address">{{old('present_address') ?? $employee->present_address ?? '' }}</textarea>
                            @if ($errors->has('present_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('present_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('permanent_address') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Permanent Address:</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="permanent_address">{{old('permanent_address') ?? $employee->permanent_address ?? '' }}</textarea>
                            @if ($errors->has('permanent_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('permanent_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="kt-portlet__foot text-center">
                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>
