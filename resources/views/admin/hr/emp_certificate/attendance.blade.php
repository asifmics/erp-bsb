<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Attendance Report</title>
  </head>
  <body>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 m-auto">

                <div class="row">
                   <div class="col-md-12 text-center" style="border: 1px dashed gray; line-height:7px">
                   <h3>Employee Attendance Report ({{ \Carbon\Carbon::parse($data->date)->format('F Y') }})</h3>
                   <p>Employee : ({{ $data->id_no }}), {{ $data->name }}</p>
                   <p>Designation : {{ $data->designation->name }}</p>

                   </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <table class="table table-bordered">
                            <thead >
                                <tr>
                                    <th style="width: 15%; padding: 0px 15px; vertical-align:middle">Date</th>
                                    <th style="width: 10%; padding: 0px 15px; vertical-align:middle">Day</th>
                                    <th style="width: 10%; padding: 0px 15px; vertical-align:middle">Enterance</th>
                                    <th style="width: 10%; padding: 0px 15px; vertical-align:middle">Egress</th>
                                    <th style="width: 10%; padding: 0px 15px; vertical-align:middle">Working Time (H:M:S)</th>
                                    <th style="width: 10%; padding: 0px 15px; vertical-align:middle">Status</th>
                                    <th style="width: 10%; padding: 0px 15px; vertical-align:middle">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalDay =Carbon\Carbon::now()->daysInMonth;

                                @endphp
                                @foreach ($data->attendances as $item)
                              @if (date('m') == Carbon\Carbon::parse($item->date)->format('m'))
                              <tr>
                                <td style="padding: 0px 15px; height:0px;">{{ \Carbon\Carbon::parse($item->date)->format('d-m-y') }}</td>
                                <td style="padding: 0px 15px; height:0px;">{{\Carbon\Carbon::parse($item->date)->format('l')}}</td>
                                @php
                                    $holiday = App\Holiday::where('date',$item->date)->first();
                                @endphp
                                @if ($holiday != '')
                                <td style="padding: 0px 15px; height:0px;">00</td>
                                <td style="padding: 0px 15px; height:0px;">00</td>

                                <td style="padding: 0px 15px; height:0px;">00</td>
                                <td style="padding: 0px 15px; height:0px;">Holiday</td>
                                <td style="padding: 0px 15px; height:0px;"></td>
                                @else
                                <td style="padding: 0px 15px; height:0px;">{{ $item->in_time ? : 00}}</td>
                                <td style="padding: 0px 15px; height:0px;">{{ $item->out_time ? : 00}}</td>
                                @php
                                    $start = Carbon\Carbon::parse($item->in_time);
                                    $end = Carbon\Carbon::parse($item->out_time);
                                    $seconds = $end->diffInSeconds($start);
                                @endphp
                                <td style="padding: 0px 15px; height:0px;">{{ gmdate("H:i:s", $seconds) }}</td>
                                <td style="padding: 0px 15px; height:0px;">{{ $item->attendanc ? : 'Not Attendance' }}</td>
                                <td style="padding: 0px 15px; height:0px;"></td>
                                @endif

                               </tr>
                              @endif
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

