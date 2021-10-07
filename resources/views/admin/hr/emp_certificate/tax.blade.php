<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Tax Certificate</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 m-auto">
                {{-- <div class="row">
                    <div class="col-6">
                        <strong>Ref No:</strong> <span style="font-weight: 550">CAM/SC/0320/0825</span>
                    </div>
                    <div class="col-6 offset-6">
                        <div class="" style="float: right">
                            <strong class="">Date:</strong> <span style="font-weight: 550;">18/03/2020</span>
                        </div>
                    </div>
                </div> --}}
                {{-- <br><br> --}}
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2 class="text-center"><u>To Whom It May Concern</u></h2>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-11 m-auto text-left">
                        <p>
                            This is to certify that <strong>{{ $data->name }}</strong>, <strong>{{ $data->designation->name }}</strong>, <strong>{{ $data->department_details->name }}</strong> of Cambrian College has drawn salary and allowance for the financial year 2017-2018 (<strong>July-2017</strong> to <strong>June-2018</strong>) under following manner:
                        </p>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col-md-10 m-auto text-center">
                        <table class="table table-bordered" style="margin-top: 100px; " >
                            <thead>
                                <tr>
                                <th>Particulars</th>
                                <th>Taka</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->salary_details as $item)
                                <tr>
                                    <th class="text-left">{{ $item->string_details->name }}</th>
                                    <td>{{ $item->amount * 12 }}</td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <th class="text-left">House Rent</th>
                                    <td>{{ $data->salary_scale_details->amount * 12 / 100 * 50 }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Medical Allowance</th>
                                    <td>{{ $data->salary_scale_details->amount * 12  / 100 * 5 }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Coanveyance Allowance</th>
                                    <td>{{ $data->salary_scale_details->amount * 12  / 100 * 5}}</td>
                                </tr> --}}
                                {{-- <tr>
                                    <th class="text-left">Post/ SSA Allowance</th>
                                    <td>280.00</td>
                                </tr> --}}
                                {{-- <tr>
                                    <th class="text-left">Others Allowance</th>
                                    <td>405,600.00</td>
                                </tr> --}}
                                @php
                                $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                $digit_text = $digit->format($data->salary_details->sum('amount') * 12);
                                @endphp
                                <tr>
                                    <th class="text-left"><STRong>Total Taka</STRong></th>
                                    <td>{{ $data->salary_details->sum('amount') * 12 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-left"><strong style="text-transform: capitalize"> In Word: TAKA {{ $digit_text }} ONLY.</strong></p>
                        <br>
                        <p class="text-left">
                            <strong>Note:</strong> Tax deducation at source is not mentioned here. Treasure Chalan of TDS payment is attached.
                        </p>

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
