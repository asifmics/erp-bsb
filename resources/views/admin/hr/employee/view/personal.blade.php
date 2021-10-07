<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Personal Information
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_employee') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row custom_row{{ $errors->has('id_no') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee ID No:</label>
                        <div class="col-md-7">
                            <input type="hidden" name="slug" value="{{$employee->slug}}">
                            <input type="hidden" name="id" value="{{$employee->id}}">
                            <input type="text" class="form-control" name="id_no" value="{{old('id_no') ?? $employee->id_no ?? ''}}">
                            @if ($errors->has('id_no'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('id_no') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{old('name') ?? $employee->name ?? ''}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('father_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Father's Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="father_name" value="{{old('father_name') ?? $employee->father_name ?? ''}}">
                            @if ($errors->has('father_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('father_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('mother_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Mother's Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="mother_name" value="{{old('mother_name') ?? $employee->mother_name ?? ''}}">
                            @if ($errors->has('mother_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mother_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('religion') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Religion:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="religion" value="{{old('religion') ?? $employee->religion ?? ''}}">
                            @if ($errors->has('religion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('religion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('dob') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Date of Birth:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="kt_datepicker_1" name="dob" value="{{old('dob') ?? $employee->dob ?? ''}}">
                            @if ($errors->has('dob'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('nationality') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Nationality:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="nationality" value="{{old('nationality') ?? $employee->nationality ?? ''}}">
                            @if ($errors->has('nationality'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nationality') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Blood Group:</label>
                        <div class="col-md-7">
                            @php
                            $bloodGroup = ['A(+ve)', 'A(-ve)', 'B(+ve)', 'B(-ve)', 'AB(+ve)', 'AB(-ve)', 'O(+ve)', 'O(-ve)' ];
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_1" name="blood_group">
                                <option value="">Select Blood Group</option>
                                @foreach($bloodGroup as $group)
                                <option value="{{$group}}" @if(old('blood_group') == $group || ( isset($employee) && $employee->blood_group == $group)) selected @endif>{{$group}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('blood_group'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('blood_group') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('marital_status') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Marital Status:</label>
                        <div class="col-md-7">
                            @php
                            $marital_status = ['Single', 'Married', 'Divorced', 'Separete', 'Others' ];
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_2" name="marital_status">
                                <option value="">Select Marital Status</option>
                                @foreach($marital_status as $status)
                                <option value="{{$status}}" @if(old('marital_status') == $status || ( isset($employee) && $employee->marital_status == $status)) selected @endif>{{$status}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('marital_status'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('marital_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row custom_row{{ $errors->has('emp_status') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Status:</label>
                        <div class="col-md-7">
                            @php
                            $emp_status = App\EmpStatus::all();
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_2" name="emp_status">
                                <option value="">Select Employee Status</option>
                                @foreach($emp_status as $status)
                                <option value="{{$status->id}}" @if(old('emp_status') == $status || ( isset($employee) && $employee->employee_status->id == $status->id)) selected @endif>{{$status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('emp_status'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('emp_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Gender:</label>
                        <div class="kt-radio-inline col-md-7">
                            &nbsp;
                            &nbsp;
                            <label class="kt-radio">
                                <input type="radio" name="gender" @if(old('gender') == 'Male' || ( isset($employee) && $employee->gender == 'Male')) checked  @endif value="Male"> Male
                                <span></span>
                            </label>
                            <label class="kt-radio">
                                <input type="radio" name="gender" @if(old('gender') == 'Female' || ( isset($employee) && $employee->gender == 'Female')) checked  @endif value="Female"> Female
                                <span></span>
                            </label>
                            <label class="kt-radio">
                                <input type="radio" name="gender" @if(old('gender') == 'Others' || ( isset($employee) && $employee->gender == 'Others')) checked  @endif value="Others"> Others
                                <span></span>
                            </label>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="form-group row custom_row{{ $errors->has('present_address') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Present Address:</label>
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
                        <label class="col-md-3 col-form-label">Employee Permanent Address:</label>
                        <div class="col-md-7">
                            <textarea class="form-control" name="permanent_address">{{old('permanent_address') ?? $employee->permanent_address ?? '' }}</textarea>
                            @if ($errors->has('permanent_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('permanent_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="form-group row custom_row">
                        <label class="col-md-3 col-form-label">Upload Photo (Optional):</label>
                        <div class="col-md-7">
                            <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                @if ($employee->image == '')
                                <div class="kt-avatar__holder" style="background-image: url({{asset('uploads/avatar.png')}})"></div>
                                @else
                                <div class="kt-avatar__holder" style="background-image: url({{asset($employee->image)}})"></div>
                                @endif
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="pic" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="old_image" value="{{ $employee->image }}">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                    </span>
                            </div>
                            <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
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
