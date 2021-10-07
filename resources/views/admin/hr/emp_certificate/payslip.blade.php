<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Employee Paylslip</title>
  </head>
  <body>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 m-auto">
                <h4 class="text-center mt-5">Payslip Ledger of September 2020</h4>
                <hr>
                <table class="table table-light" >
                    <tbody style="border: 1px solid gray;">
                        <tr>
                            <th style="width: 20%">Name:</th>
                            <td style="width: 30%"">{{ $data->name }}</td>
                            <th style="border-left: 1px solid gray; width: 20%">Desgination</th>
                            <td style="width: 30%"">{{ $data->designation->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%">Employee ID:</th>
                            <td style="width: 30%"">{{ $data->id_no }}</td>
                            <th style="border-left: 1px solid gray; width: 20%">Gross Salary: </th>
                            <td style="width: 30%"">{{ $data->salary_scale_details->amount }}</td>
                        </tr>
                        <tr>
                            <th style="width: 20%">Bank Name:</th>
                            <td style="width: 30%">Islamia Bank</td>
                            <th style="border-left: 1px solid gray; width: 20%">Account No: </th>
                            <td style="width: 30%""> 253456345645645645</td>
                        </tr>
                    </tbody>
                </table>
                <style>
                    table tr td{
                        font-size: 15px;
                    }
                </style>
                <table class="table table-bordered">

                        <thead>
                           <tr>
                            <th colspan="2" class="text-center">Earning</th>
                            <th colspan="2" class="text-center">Deducation</th>
                           </tr>
                            <tr>
                                <th style="width: 35%" >Description</th>
                                <th style="width: 15%"> Amount</th>
                                <th style="width: 35%">Description</th>
                                <th style="width: 15%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->salary_details as $key => $item)
                            <tr>
                                <td>{{ $item->string_details->name }}</td>
                                <td>{{ $item->amount }}</td>
                                @if ($key == 0)
                                <td>Provident Fund </td>
                                <td>
                                    @if (!empty($data->provident))
                                    {{  $data->provident->company_provident }}
                                    @endif
                                </td>
                                @elseif($key == 1)
                                <td>Tax </td>
                                <td>2000</td>
                                @elseif($key == 2)
                                <td>Loan/Advance </td>
                                <td>00</td>
                                @elseif($key == 3)
                                <td>Other/Deducation </td>
                                <td>00</td>
                                @elseif($key == 4)
                                <td>-------------</td>
                                <td>00</td>
                                @elseif($key == 5)
                                <td>-------------</td>
                                <td>00</td>
                                @elseif($key == 6)
                                <td>-------------</td>
                                <td>00</td>
                                @endif
                            </tr>
                            @endforeach

                            @php
                                $salary = $data->salary_scale_details->amount;
                                $totalDay =Carbon\Carbon::now()->daysInMonth;
                                $per_day = $salary / $totalDay;
                                $absent= App\EmployeeAttendance::where('attendanc','Absent')->where('employee_id',$data->id)->get()->count();
                                $attendance_deduct =intval($per_day * $absent);

                            @endphp
                            <tr>
                                <td>----------</td>
                                <td>----------</td>
                                <td>Attendance Deduct</td>
                                <td> {{ $attendance_deduct}}
                                </td>
                            </tr>
                            <tr>
                                <td>----------</td>
                                <td>----------</td>
                                <td>Total Deducation</td>
                                <td> @if (!empty($data->provident))
                                    {{  $data->provident->company_provident + 2000 + $attendance_deduct }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="text-bold">Total Earning</td>
                                <td class="text-bold">{{ $data->salary_details->sum('amount') }}</td>
                                <td class="text-bold">Net Payable</td>
                                <td class="text-bold">
                                    @if (!empty($data->provident))
                                    {{  $data->salary_details->sum('amount') - $data->provident->company_provident - 2000 - $attendance_deduct }}
                                    @endif
                                </td>
                            </tr>


                    </tbody>
                </table>
                @php

                $digit = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
                $digit_text = $digit->format($data->salary_details->sum('amount') - $data->provident->company_provident - 2000 - $attendance_deduct);
                @endphp
                <strong>In Word (Net Salary):</strong> <span style="text-transform: capitalize"> {{ $digit_text }}</span>
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
