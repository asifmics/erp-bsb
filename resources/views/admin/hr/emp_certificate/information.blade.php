<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Employe Information</title>
  </head>
  <body>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 m-auto">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6 text-center">
                        <h4 style="line-height: 2px;">BSB Global Network</h4>
                        <h6 style="line-height: 4px;">Employee Information</h6>
                        <h6 style="line-height: 8px">{{ $data->name }} ({{ $data->id_no }})</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-bordered">
                                <style>
                                    .dt td{
                                        height: 0px;
                                        padding: 2px;
                                        font-size: 10px;


                                    }
                                    .dh th {
                                        height: 0%;
                                        padding: 0px;
                                        vertical-align:top ;
                                        font-size: 11px;
                                        text-align: center;
                                    }
                                </style>
                                <thead>
                                    <tr class="dh">
                                        <th>Date Of Birth</th>
                                        <th>Present Address</th>
                                        <th>Parmanent Address</th>
                                        <th>Father's Name</th>
                                        <th>Mother's Name</th>
                                        <th>Blood Group</th>
                                        <th>Religion</th>
                                        <th>Gender</th>
                                        <th>Maritial Status</th>
                                        <th>Nationality</th>
                                    </tr>
                                </thead>
                            <tbody>

                                <tr class="dt">
                                <td>{{ $data->dob }}</td>
                                <td>{{ $data->present_address }}</td>
                                <td>{{ $data->permanent_address }}</td>
                                <td>{{ $data->father_name }}</td>
                                <td>{{ $data->mother_name }}</td>
                                <td>{{ $data->blood_group }}</td>
                                <td>{{ $data->religion }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->maritial_status }}</td>
                                <td>{{ $data->nationality }}</td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>
                <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <div class="row">
                            <table class="table">
                                <style>
                                    .details td {
                                        float: left;
                                        height: 0;
                                        font-size: 11px;
                                        text-align: left
                                    }
                                    .details td b{
                                        font-size: 11px;
                                    }
                                    .details tr{
                                        border-bottom: 1px solid gray;
                                        line-height: 5px;
                                    }
                                </style>
                                <tbody class="details">
                                    <tr>
                                        <td colspan="2"><b>Designation:</b>{{ $data->designation->name }}</td><td colspan="2"> <b>Department:</b> {{ $data->department_details->name }}</td><td colspan="2"> <b>Posting Place:</b> Faruk Haidar</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Shift Code: </b>{{ $data->shift->name }}</td> <td colspan="2"><b>Joining Date: </b>{{ \Carbon\Carbon::parse($data->date)->format('d M Y') }}</td><td colspan="2"><b>Nature Of Employement: </b> ---</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Passport No: </b>---</td><td colspan="2"><b>Bank Account No: </b>---</td> <td colspan="2"> <b>Bank:</b>---</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Employee Status: </b>{{ $data->employee_status->name }}</td> <td colspan="2"> <b>Pay Type:</b>---</td><td colspan="2"><b>Salary Scale:</b>{{ $data->salary_scale_details->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <b style="font-size: 13px">Education:</b>
                <div class="row">

                     <div class="col-md-12 col-lg-12">
                        <div class="row">

                            <table class="table table-bordered">
                                <style>
                                    .ed td{
                                        height: 0px;
                                        padding: 2px;
                                        font-size: 13px;
                                    }
                                    .edd td{
                                        height: 0px;
                                        padding: 1px;
                                        font-weight: 550;
                                        font-size: 13px;
                                    }
                                </style>
                                <thead>
                                    <tr class="ed">
                                        <td>Course</td>
                                        <td>Qualifying Year</td>
                                        <td>Institute</td>
                                        <td>Subject</td>
                                        <td>Board</td>
                                        <td>Result</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->academics as $item)
                                    <tr class="edd">
                                        <td>{{ $item->exam }}</td>
                                        <td>{{ $item->pass_year }}</td>
                                        <td>{{ $item->institut }}</td>
                                        <td>{{ $item->group }}</td>
                                        <td>{{ $item->board }}</td>
                                        <td>{{ $item->grade }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <b style="font-size: 13px;">Experiance:</b>
                <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <div class="row">

                            <table class="table table-bordered">
                                <style>
                                    .ep td{
                                        height: 0px;
                                        padding: 2px;
                                        font-weight: 550;
                                        font-size: 13px;
                                    }
                                    .epd td{
                                        height: 0px;
                                        padding: 1px;
                                        font-size: 13px;
                                    }
                                </style>
                                <thead>
                                    <tr class="ep">
                                        <td>Company Name</td>
                                        <td>Designation Year</td>
                                        <td>From Date</td>
                                        <td>Duration</td>
                                        <td>To Date</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->experience as $item)
                                    <tr class="epd">
                                        <td>{{ $item->company_name }}</td>
                                        <td>{{ $item->designation }}</td>
                                        @php
                                            $date1 = new DateTime($item->date_from);
                                            $date2 = new DateTime($item->date_to);
                                            $interval = $date1->diff($date2);
                                        @endphp
                                        <td>{{ $item->date_from }}</td>
                                        <td>{{ $interval->y.' Year '.$interval->m.' Month '.$interval->d .'  Day'}}</td>
                                        <td>{{$item->date_to }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <b style="font-size: 13px;">Training:</b>
                <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <div class="row">

                            <table class="table table-bordered">
                                <style>
                                    .ep td{
                                        height: 0px;
                                        padding: 2px;
                                        font-weight: 550;
                                        font-size: 13px;
                                    }
                                    .epd td{
                                        height: 0px;
                                        padding: 1px;
                                        font-size: 13px;
                                    }
                                </style>
                                <thead>
                                    <tr class="ep">
                                        <td>Training Name</td>
                                        <td>Training Institute</td>
                                        <td>Training Type</td>
                                        <td>Pass Year</td>
                                        <td>Duration</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->trainings as $item)
                                    <tr class="epd">
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->Institut }}</td>
                                        <td>{{ $item->topic }}</td>
                                        <td>{{ $item->pass_year }}</td>
                                        <td>{{ $item->duration }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
