<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Salary Certificate</title>
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
                        <strong>Ref No:</strong> <span style="font-weight: 550">CAM/SC/{{ $date }}/0825</span>
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
                        <h2 class="text-center"><u>To Whom It May Concern</u></h2>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-11 m-auto text-left">
                        <p>This is to certify that <strong>{{ $data->name }}</strong> has been working at Cambrian School & College as an <strong>{{ $data->designation->name }}</strong> in the Department <strong>{{ $data->department_details->name }}</strong> since <span>{{ $data->joining_date }}</span>.
                            He is permanent employee. His employee ID is <strong>{{ $data->id_no }}</strong>. As per our service rules/term of employment his date retirement is not applicable. His salary and allowances are given below:</p>
                    </div>
                </div>
                <br><br>
                <div class="row">

                    <div class="col-md-8 m-auto text-center">
                        <table class="table table-bordered" style="margin-top: 100px; " >
                            <tbody>
                                @foreach ($data->salary_details as $item)
                                <tr>
                                    <th class="text-left">{{ $item->string_details->name }}</th>
                                    <td>{{ $item->amount }}</td>
                                </tr>

                                @endforeach

                                <tr>
                                    <th class="text-left">Gross</th>
                                    <td>{{ $data->salary_details->sum('amount') }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left"> PF Deducation</th>
                                    <td>
                                        @if (!empty($data->provident))
                                            {{  $data->provident->company_provident }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left"><STRong>Tax Deducation</STRong></th>
                                    <td>300.00</td>
                                </tr>
                                <tr>
                                    <th class="text-left"><STRong>Net Amount</STRong></th>
                                    <td>{{ $data->salary_details->sum('amount') - $data->provident->company_provident - 300 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @php
                            $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                            $digit_text = $digit->format($data->salary_details->sum('amount') - $data->provident->company_provident - 300);
                        @endphp
                        <p class="text-left" style="text-transform: capitalize"><strong>  In Word:</strong> Taka {{ $digit_text }} Only</p>

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
