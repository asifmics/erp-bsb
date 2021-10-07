<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 m-auto">

                <div class="row">
                   <div class="col-md-12 text-center" style="border: 1px dashed gray; line-height:7px">
                    <h5>Salary Sheet for The month of April</h5>
                   </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <table class="table table-bordered text-center">
                            <style>
                                 .theads th{
                                     font-size: 10px;
                                     padding: 0px;
                                     margin: 0px;
                                     vertical-align: middle;
                                    border-collapse:collapse;
                                    -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
                                    -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
                                    -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
                                    filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
                                    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
                                 }
                                .ok{
                                     font-size: 10px;
                                     padding: 0px;
                                     margin: 0px;
                                     vertical-align: middle;
                                    border-collapse:collapse;
                                    -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
                                    -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
                                    -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
                                    filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
                                    -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; IE8
                                 }
                            </style>
                            <thead>
                                <tr>
                                    <th rowspan="2" >SL</th>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2" class="ok">Designation</th>
                                    <th rowspan="2" class="ok">Wrk/mnt Day</th>
                                    <th colspan="9">Monthy salary & Allowance</th>
                                    <th colspan="5">Deducation</th>
                                    <th rowspan="2" class="ok">Gross Amount</th>
                                    <th rowspan="2" class="ok">Attendance Deduct</th>
                                    <th rowspan="2" class="ok">Net Payable</th>
                                    <th rowspan="2">A/C No</th>
                                </tr>
                                <tr class="theads">
                                    <th style="">Basic Salary</th>
                                    <th style="">House Rent</th>
                                    <th style="">Medical</th>
                                    <th style="">Conveyance</th>
                                    <th style="">Other Allowance</th>
                                    <th style="">Special Allowance</th>
                                    <th style="">SSP/OT</th>
                                    <th style="">Arrears</th>
                                    <th style="">Total</th>
                                    <th style="">EWF</th>
                                    <th style="">TDS</th>
                                    <th style="">Loan/Advance</th>
                                    <th style="">Others Deduction</th>
                                    <th style="">Total</th>

                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i =1;
                                    $date =date('my');

                                    $totalDay =Carbon\Carbon::now()->daysInMonth;
                                @endphp
                                @foreach ($data as $employee)
                                @php
                                     $working_day = App\EmployeeAttendance::where('attendanc', 'Present')->where('employee_id',$employee->id)->get()->count();
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->designation->name }}</td>
                                    <td>{{ $totalDay. '/' .$working_day}}</td>
                                    <td>{{ $employee->salary_scale_details->amount }}</td>
                                    <td>{{ $employee->salary_scale_details->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>

