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
                                        <div class="col-md-2"> <a href="{{ route('all_student') }}"><div class="back text-bold text-primary"> <i class="fas fa-angle-left"></i> <b>Back</b> </div></a></div>
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
                            .info_table{
                                margin-top: 15px;
                            }
                            .info_table thead{
                                background: rgba(66, 155, 214, 0.281);
                                text-align: center;
                                font-weight: 700 !important;
                                color: black !important;
                            }
                        </style>
                        <div class="row" id="student_data">
                            <div class="col-md-11 m-auto">
                                <div class="text-center " style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>General Information ({{ $student->id_no }})</b></h5>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right" style="margin-top: 10px">Name:</label>
                                    <input id="my-input" class="form-control col-md-7 details" style="margin-top: 10px" disabled type="text" name="" value="{{ $student->name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Father Name:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->father_name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Mother Name:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->mother_name }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Religion:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->religion }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Date of Birth:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->dob }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Nationality:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->country->name }}">
                                </div>
                            </div>

                            <div class="col-md-11 m-auto">
                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Contact Information</b></h5>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right" style="margin-top: 10px">E-mail:</label>
                                    <input id="my-input" class="form-control col-md-7 details" style="margin-top: 10px" disabled type="text" name="" value="{{ $student->email }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Phone:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->phone }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Whatsapp:</label>
                                    <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->whatsapp }}">
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Present Address:</label>
                                    {{-- <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->present_address }}"> --}}
                                    <textarea id="my-input" class="form-control col-md-7 details" disabled type="text" cols="30" rows="3">
                                        {{ $student->present_address }}
                                    </textarea>
                                </div>
                                <div class="form-group test row">
                                    <label for="my-input" class="title col-md-4 float-right">Permanent Address:</label>
                                    {{-- <input id="my-input" class="form-control col-md-7 details" disabled type="text" name="" value="{{ $student->permanent_address }}"> --}}
                                    <textarea id="my-input" class="form-control col-md-7 details" disabled type="text" cols="30" rows="3">
                                        {{ $student->permanent_address }}
                                    </textarea>
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
                                        @forelse ($student->academics as $item)
                                        <tr>
                                            <td>{{ $item->exam }}</td>
                                            <td>{{ $item->institut }}</td>
                                            <td>{{ $item->department }}</td>
                                            <td>{{ $item->board }}</td>
                                            <td>{{ $item->grade }}</td>
                                            <td>{{ $item->pass_year }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="6" class="text-center">Academics data not available</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br><br>
                                <div class="text-center" style="background: rgba(66, 155, 214, 0.281); padding:10px; color:black;">
                                    <h5><b>Visa Information</b></h5>
                                </div>
                                <table class="table info_table table-bordered">
                                    <thead >
                                        <tr style="font-weight: bold;">
                                            <th>Place</th>
                                            <th>Date of issue</th>
                                            <th>Expire date</th>
                                            <th>Duration</th>
                                            <th>Passport Number</th>
                                            <th>Date of Birth</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($student->visas as $item)
                                        <tr>
                                            <td>{{ $item->place }}</td>
                                            <td>{{ $item->issue_date }}</td>
                                            <td>{{ $item->expire_date }}</td>
                                            <td>{{ $item->duration }}</td>
                                            <td>{{ $item->passport_number }}</td>
                                            <td>{{ $item->dob }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="6" class="text-center">Training data not available</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>  --}}
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


    {{--  $(document).ready(function () {
            $('#printData').on('click',function () {
                window.frames["print_frame"].document.body.innerHTML = document.getElementById("student_data").innerHTML;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            });
        });  --}}

</script>
@endpush
