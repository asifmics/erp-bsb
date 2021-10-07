@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_employee')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/hr/employee/create'))
                    Add New Employee Information
                    @else
                    Edit Employee Information
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$employee->slug}}">
                    <input type="hidden" name="id" value="{{$employee->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @can('all_employee')
                        <a href="{{route('all_employee')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Employee</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Employee Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="form-group row custom_row{{ $errors->has('id_no') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee ID No:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" placeholder="Enter Employee Id No" name="id_no" value="{{old('id_no') ?? $employee->id_no ?? ''}}">
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
                    <input type="text" class="form-control" name="name" placeholder="Enter Employee Name" value="{{old('name') ?? $employee->name ?? ''}}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee E-mail:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="email" placeholder="Enter Employee Email" value="{{old('email') ?? $employee->email ?? ''}}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('shift_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Shift:</label>
                @php
                    $shift = App\Shift::where('status',1)->get();
                @endphp
                <div class="col-md-7">
                   <select name="shift_id" id="" class="form-control">
                    <option value="">Select Designation</option>
                    @foreach ($shift as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                   </select>
                    @if ($errors->has('shift_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('shift_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('designation_id') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Designation:</label>
                @php
                    $designation = App\Designation::where('status',1)->get();
                @endphp
                <div class="col-md-7">
                   <select name="designation_id" id="" class="form-control">
                       <option value="">Select Designation</option>
                    @foreach ($designation as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                   </select>
                    @if ($errors->has('designation_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('designation_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Joining Date:</label>
                <div class="col-md-7">
                <input type="text" class="form-control" readonly="readonly" name="joining_date" value="{{ old('date') ?? $employee->date ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">
                    @if ($errors->has('joining_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('joining_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('maturity_age') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Maturity Age:</label>

                <div class="col-md-7">
                    <input type="text" class="form-control" readonly="readonly" name="maturity_age" value="{{ old('maturity_age') ?? $employee->maturity_age ?? Carbon\Carbon::now()->format('Y-m-d')}}" id="kt_datepicker_3">
                    @if ($errors->has('maturity_age'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('maturity_age') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row{{ $errors->has('father_name') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Father's Name:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="father_name" placeholder="Enter Employee Father Name" value="{{old('father_name') ?? $employee->father_name ?? ''}}">
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
                    <input type="text" class="form-control" name="mother_name" placeholder="Enter Employee Mother Name" value="{{old('mother_name') ?? $employee->mother_name ?? ''}}">
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
                    <input type="text" class="form-control" name="religion" placeholder="Enter Employee Religion" value="{{old('religion') ?? $employee->religion ?? ''}}">
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
                    <input type="text" class="form-control" id="kt_datepicker_1" placeholder="Enter Employee Date of Birth" name="dob" value="{{old('dob') ?? $employee->dob ?? ''}}">
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
                    <input type="text" class="form-control" name="nationality" placeholder="Enter Employee Nationality" value="{{old('nationality') ?? $employee->nationality ?? ''}}">
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
            <div class="form-group row custom_row{{ $errors->has('emp_status') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Status:</label>
                <div class="col-md-7">
                    @php
                    $emp_status = App\EmpStatus::where('status',1)->get();
                    @endphp
                    <select class="form-control kt-select2" id="kt_select2_2" name="emp_status">
                        <option value="">Select Status</option>
                        @foreach($emp_status as $status)
                        <option value="{{$status->id}}" @if(old('emp_status') == $status->id || ( isset($employee) && $employee->emp_status == $status->id)) selected @endif>{{$status->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('emp_status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('emp_status') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row custom_row{{ $errors->has('present_address') ? ' has-error' : '' }}">
                <label class="col-md-3 col-form-label">Employee Present Address:</label>
                <div class="col-md-7">
                    <textarea class="form-control" name="present_address" placeholder="Enter Employee Present Address">{{old('present_address') ?? $employee->present_address ?? '' }}</textarea>
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
                    <textarea class="form-control" name="permanent_address" placeholder="Enter Employee Permanent">{{old('permanent_address') ?? $employee->permanent_address ?? '' }}</textarea>
                    @if ($errors->has('permanent_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('permanent_address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Upload Photo (Optional):</label>
				<div class="col-md-7">
					<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
							<div class="kt-avatar__holder" style="background-image: url({{asset('uploads')}}/avatar.png)"></div>
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="pic" accept=".png, .jpg, .jpeg">
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
							</span>
					</div>
					<span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
				</div>
			</div>


        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection
