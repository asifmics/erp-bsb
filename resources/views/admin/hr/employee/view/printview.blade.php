@extends('layouts.admin')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content" style="padding:0px">

        <!-- begin:: Subheader -->

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="padding:0px">

            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop " style="padding:0px">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 m-auto" style="">
                                <div class="text-center " style="background: rgba(66, 155, 214, 0.281); padding:10px; border: 2px solid #5d78ff; color:#5d78ff">
                                    <div class="row d-flex">
                                        <div class="col-md-2"> <a href="#"><div class="back text-bold text-primary"> <i class="fas fa-angle-left"></i> <b>Back</b> </div></a></div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-2"><a onclick="window.print()" style="cursor:pointer"><div class="print text-bold text-primary"> <b> Print</b> <i class="fa fa-print"></i></div></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <style>
                            .title{
                                background: rgba(66, 155, 214, 0.281); 
                                text-align: right; 
                                padding: 10px;
                                margin: 5px 0px 10px 10px;
                                font-size: 20px ;
                                color: black;
                                font-weight: 700 !important;
                        
                            }
                            .details{
                                border:1px solid #5d78ff;
                                text-align: left; 
                                padding: 10px;
                                margin: 5px 0px 10px 10px;
                            }
                            .test{
                                margin-bottom: 0px;
                            }
                            .info_table {
                                margin-top: 15px;
                            }
                            .info_table thead{
                                background: rgba(66, 155, 214, 0.281);
                                text-align: center;
                                font-weight: 700 !important;
                                color: black !important;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-11 m-auto">
                                <div class="text-center " style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>General Information ({{ $employee->id_no }})</b></h5>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right" style="margin-top: 10px">Name:</label>
                                    <input id="my-input" class="form-control col-md-7 details" style="margin-top: 10px" disabled type="text" name="" value="{{ $employee->name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Father Name:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->father_name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Mother Name:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->mother_name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Religion:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->religion }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Date of Birth:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->dob }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Nationality:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->nationality }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Blood Group:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->blood_group }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Marital Status:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->marital_status }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Status:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->employee_status->name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Gender:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->gender }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Gender:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->gender }}">
                                </div>
                               
                            </div>
                           
                            <div class="col-md-11 m-auto">
                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Contact Information</b></h5>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right" style="margin-top: 10px">E-mail:</label>
                                    <input id="my-input" class="form-control col-md-7 details" style="margin-top: 10px" disabled type="text" name="" value="{{ $employee->email }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Phone:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->phone }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Whatsapp:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->whatsapp }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Present Address:</label>
                                    {{-- <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->present_address }}"> --}}
                                    <textarea id="my-input" class="form-control col-md-7 details" disabled type="text" cols="30" rows="3">
                                        {{ $employee->present_address }}
                                    </textarea>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Permanent Address:</label>
                                    {{-- <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->permanent_address }}"> --}}
                                    <textarea id="my-input" class="form-control col-md-7 details" disabled type="text" cols="30" rows="3">
                                        {{ $employee->permanent_address }}
                                    </textarea>
                                </div>

                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Official Information</b></h5>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right" style="margin-top: 10px">Designation:</label>
                                    <input id="my-input" class="form-control col-md-7 details" style="margin-top: 10px" disabled type="text" name="" value="{{ $employee->designation->name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Branch:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->branch_details->name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Department:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->department_details->name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Salary Scale</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $employee->salary_scale_details->name }}">
                                </div>

                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Academic Information</b></h5>
                                </div>
                                <table class="table info_table table-bordered">
                                    <thead >
                                        <tr style="font-weight: bold;">
                                            <th>Exam Name</th>
                                            <th>Institut Name</th>
                                            <th>Group/Department</th>
                                            <th>Board</th>
                                            <th>Grade</th>
                                            <th>Passing Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employee->academics as $item)
                                        <tr>
                                            <td>{{ $item->exam }}</td>
                                            <td>{{ $item->institut }}</td>
                                            <td>{{ $item->group }}</td>
                                            <td>{{ $item->board }}</td>
                                            <td>{{ $item->grade }}</td>
                                            <td>{{ $item->pass_year }}</td>
                                        </tr>
                                        @empty 
                                        <tr><td colspan="5" class="text-center">Academics data not available</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Training Information</b></h5>
                                </div>
                                <table class="table info_table table-bordered">
                                    <thead >
                                        <tr style="font-weight: bold;">
                                            <th>Training Title</th>
                                            <th>Institut Name</th>
                                            <th>Topics</th>
                                            <th>Board</th>
                                            <th>Passing year</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employee->trainings as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->institut }}</td>
                                            <td>{{ $item->topic }}</td>
                                            <td>{{ $item->board }}</td>
                                            <td>{{ $item->pass_year }}</td>
                                            <td>{{ $item->duration }}</td>
                                        </tr>
                                        @empty 
                                        <tr><td colspan="5" class="text-center">Training data not available</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            
                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Experiance Information</b></h5>
                                </div>
                                <table class="table info_table table-bordered">
                                    <thead >
                                        <tr style="font-weight: bold;">
                                            <th style="width: 20%">Company Name</th>
                                            <th style="width: 10%">Designation</th>
                                            <th style="width: 13%">Date From</th>
                                            <th style="width: 13%">Date To</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employee->experience as $item)
                                        <tr>
                                            <td>{{ $item->company_name }}</td>
                                            <td>{{ $item->designation }}</td>
                                            <td>{{ $item->date_from }}</td>
                                            <td>{{ $item->date_to }}</td>
                                            <td>{{ $item->description }}</td>
                                        </tr>
                                        @empty 
                                        <tr><td colspan="5" class="text-center">Experiance data not available</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!--End::App-->
        </div>
        <!-- end:: Content -->
    </div>
@endsection
@push('js')
<script>
    $("#month_only").datepicker( {
    format: "mm",
    viewMode: "months",
    minViewMode: "months"
    });
    $("#year_only").datepicker( {
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
    });
</script>
@endpush
