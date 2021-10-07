<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Experiance Certificate</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-lg-11 col-xl-11 m-auto">
                <div class="row">
                    <div class="col-6">
                        <strong>Ref No:</strong> <span style="font-weight: 550">200</span>
                    </div>
                    @php
                    $date =date('my');
                    $now =date('d-m-y');
                @endphp
                    <div class="col-6 offset-6">
                        <div class="" style="float: right">
                            <strong class="">Date:</strong> <span style="font-weight: 550;">{{ $now }}</span>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2 class="text-center"><u>TO WHOM IT MAY CONCERN</u></h2>
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-md-11 m-auto text-left">
                        <p>This is to certify that grobinda chandra Roy, S/O: Late. Upendra Chandra Roy & Late.
                             Tagor Bala Roy, Garden Roadn(Grand Floor) West Kawranbazar, Farmgate, Dhaka worked as an Principal in
                            the department of ICT in our Institution from {{ $data->joining_date}} up to present.
                        </p><br>
                        <p>@if ($data->gender == 'female') She @else He @endif was always found to be very sincere to his/her job responsibilities,
                                extremely dutiful, honest & very hard working throughout his/her total service period in
                            this institutiin. @if ($data->gender == 'female') She @else He @endif is also a very good behaving personality to @if ($data->gender == 'female') his @else him @endif Colleagues,
                            senoir & junior officials.
                        </p><br>
                        <p>
                            To the best of my knowlede, her/she bears a good moral character.
                            @if ($data->gender == 'female') She @else He @endif did not take part in any activity subversive of the state or of discipline.
                        </p>
                        <p><br>
                            I wish @if ($data->gender == 'female') him @else his @endif all the very best in his future endeavors.
                        </p><br>
                        <p>-----------------------------------------------------------</p><br><br>
                        <p><strong>Cambrian School and College</strong></p>
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
