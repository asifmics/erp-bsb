<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Official Information
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('official_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                                        <div class="form-group row custom_row{{ $errors->has('designation') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Designation:</label>
                        <div class="col-md-7">
                            @php
                            $salary_scales = \App\Designation::all();
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_1" name="designation">
                                <option value="">Select Designation</option>
                                @foreach($salary_scales as $status)
                                <option value="{{$status->id}}" @if(old('designation') == $status->id || ( isset($employee) && $employee->designation_id == $status->id)) selected @endif>{{$status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('designation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row custom_row{{ $errors->has('branch') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Branch:</label>
                        <div class="col-md-7">
                            @php
                            $branchs = \App\Branch::all();
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_3" name="branch">
                                <option value="">Select Branch</option>
                                @foreach($branchs as $status)
                                <option value="{{$status->id}}" @if(old('branch') == $status->id || ( isset($employee) && $employee->branch == $status->id)) selected @endif>{{$status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('branch'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('branch') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('department') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Department:</label>
                        <div class="col-md-7">
                            @php
                            $departments = \App\Department::all();
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_4"name="department">
                                <option value="">Select Department</option>
                                @foreach($departments as $status)
                                <option value="{{$status->id}}" @if(old('department') == $status->id || ( isset($employee) && $employee->department == $status->id)) selected @endif>{{$status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('marital_status'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('marital_status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('salary_scale') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Employee Salary Scale:</label>
                        <input type="hidden" name="slug" value="{{$employee->slug}}">
                        <input type="hidden" name="id" value="{{$employee->id}}">
                        <div class="col-md-7">
                            @php
                            $salary_scales = \App\SalaryScale::all();
                            @endphp
                            <select class="form-control kt-select2" id="kt_select2_2" name="salary_scale">
                                <option value="">Select Salary Scale</option>
                                <option value="0" @if(old('salary_scale') == 0 || ( isset($employee) && $employee->salary_scale == 0)) selected @endif>Custom</option>
                                @foreach($salary_scales as $status)
                                <option value="{{$status->id}}" @if(old('salary_scale') == $status->id || ( isset($employee) && $employee->salary_scale == $status->id)) selected @endif>{{$status->name}}  ( {{$status->amount}} )</option>
                                @endforeach
                            </select>
                            @if ($errors->has('salary_scale'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('salary_scale') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- Salary String Part --}}

                    @php
                        $salary_details =  \App\SalaryDetails::whereEmployeeId($employee->id)->get();
                        $salary = [];
                        $total_salary = 0;
                        foreach ($salary_details as $value) {
                            $salary[$value->string_id] = $value->amount;
                            $total_salary += $value->amount;
                        }
                        // dd();
                        $salary_strings = \App\SalaryString::all();
                    @endphp
                    @foreach ($salary_strings as $item)
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }} hid    e" @if (( isset($employee) && $employee->salary_scale != 0))
                       style="visibility: hidden;"
                    @endif>
                        <label class="col-md-3 col-form-label text-right">{{$item ->name}}:</label>
                        <div class="col-md-7">
                            <input type="number" class="form-control calculate" name="string[{{$item->id}}]" @if(!empty($salary)) value="{{array_key_exists($item->id,$salary) ? $salary[$item->id] : ''}}" @endif>
                        </div>
                    </div>
                    @endforeach
                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }} hide" @if (( isset($employee) && $employee->salary_scale != 0))
                        style="visibility: hidden;"
                     @endif>
                        <label class="col-md-3 col-form-label text-right">Total:</label>
                         <div class="col-md-7">
                            <input type="number" class="form-control" id="total" value="{{$total_salary}}">
                        </div>
                    </div>
                    {{-- Salary String Part --}}
                    <div class="kt-portlet__foot text-center">
                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>

<script>

    (function($) {
        $(document).ready(function(){

            $("#kt_select2_2").on("change", function() {
                var salary_scale = $(this).val();
                if(salary_scale === '0'){
                    console.log("It's Zero");
                    for (let el of document.querySelectorAll('.hide')) el.style.visibility = 'visible';
                }
                if(salary_scale !== '0'){
                    for (let el of document.querySelectorAll('.hide')) el.style.visibility = 'hidden';
                }
            });
            $(".calculate").on("change", function() {
                var total = 0;
                var salary_scale = $(this).val();
                for (let el of document.querySelectorAll('.calculate')){
                    total += +el.value;
                }

                $('#total').val(total)
            });
        });

    })(jQuery);

</script>
