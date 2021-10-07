<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Increment Letter</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-lg-11 col-xl-11 m-auto">
                <div class="row">
                    <div class="col-6">
                        @php
                            $date =date('my');
                            $now =date('d-m-y');
                        @endphp
                        <strong>Ref No:</strong> <span style="font-weight: 550">BSB/HR/IL01/{{ $date }}/0825</span>
                    </div>
                    <div class="col-6 offset-6">
                        <div class="" style="float: right">
                            <strong class="">Date:</strong> <span style="font-weight: 550;">{{ $now }}</span>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h5 class="text-center"><u>Increment Letter</u></h5>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <style>
                        .ok tr td{
                            line-height: 0px;
                            font-size: 16px;
                        }
                    </style>
                    <table class="table table-light" class="">
                        <tbody class="ok">
                            <tr class="dd">
                                <td style="width: 40%">Employee Id:</td>
                                <td>{{ $data->id_no }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Employee Name:</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td  style="width: 40%">Employee Designation</td>
                                <td>{{ $data->designation_details->name }}</td>
                            </tr>
                            <tr>
                                <td  style="width: 40%">Employee Department</td>
                                <td>{{ $data->department_details->name }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        <span>Dear sir / Madam,</span>
                        <p style="">

                            Congratulations!!! The competent Authority of the BSB Foundation is pleased to accord of your salary totaling TK. 3,000.00 with effect from 01.09.19 and re-fixes your pay and allowances as per the following details:
                        </p>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8 m-auto text-left">
                        <style>
                            .hed th{
                                line-height: 0;
                                font-size: 14px;

                            }
                            .dd tr th{
                                line-height: 0;
                                font-size: 14px;
                            }
                            .dd tr td{
                                line-height: 0;
                                font-size: 14px;
                            }
                        </style>
                        <table class="table table-bordered" >
                            <thead>
                                <tr class="hed">
                                    <th>Particulars</th>
                                    <th>Taka</th>
                                </tr>
                            </thead>
                            <tbody class="dd">
                                @foreach ($data->salary_details as $item)
                                <tr>
                                    <th class="text-left">{{ $item->string_details->name }}</th>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th class="text-left">Gross</th>
                                    <td>{{ $data->salary_details->sum('amount')  }}</td>
                                </tr>

                            </tbody>
                        </table>
                        @php
                            $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                            $digit_text = $digit->format($data->salary_details->sum('amount'));
                        @endphp
                        <p class="text-left" style="text-transform: capitalize; font-size:15px;"><strong>  In Word:</strong> <strong>Taka {{ $digit_text }} Only</strong></p>
                        <p style="text-align: left">In Case of any inconsistency in the calculation, please contact HR & Payroll Department for neccessary correction.</p>
                        <p style="text-align: left">The authority deserves utmost sincerity in discharging your assigned responsibilities in future</p>
                        <br>
                        <br>
                        ---------- <br>
                        <strong>Chairman</strong>

                        <p>copy to: <br> . HR & Payroll department</p>

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
