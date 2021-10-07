<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Money Receipt</title>
  </head>
  <body>
    <style>
        .table_tr{
            margin: 0%;
            padding: 0%;
            line-height: 1px;

        }
        @page { size: 4.1in 5.8in; margin:0.3in 0.6in 0.3in 0.6in; }
    </style>



        <style>
            .particular th{
                margin: 0px;
                padding: 0px;
                font-size: 15px;
            }
            .details td{
                margin: 0px;
                padding: 0px;
                font-size: 13px;
            }
        </style>


      <style>
       .bank td{
                  padding: 0px;
                  margin: 0px;
                  font-size: 11px;
              }
              #visit_info td{
                font-size: 11px;
                padding: 2px !important;
              }
              #visit_info th{
                font-size: 13px;
                width: 40%;
                font-weight: normal !important;
                padding: 2px !important;
              }

      </style>



    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">
            <span style="font-size: 20px; font-weight: bold">BSB Global Network</span>
            <span style="font-size: 16px; font-weight: bold"><u>Visitor Information</u></span>
            {{-- <img src="{{ asset('contents/admin/assets/media/logos/logo.png') }}" alt="" width="100"> --}}

        </div>
    </div>

    <table id="visit_info" width="100%" cellpadding="0" cellspacing="0" border="" align="center" style="margin-top: 10px;">
        <tr style="margin-bottom: 20px;">
            <td colspan="2" class="text-right"><b>Date:</b> {{ $visitinfo->guest_date ?? "" }}</td>
        </tr>
        <tr>
            <th>Visitor ID</th>
            <td>: &nbsp; {{ $visitinfo->visitor_id ?? ""}}</td>
        </tr>
        <tr>
            <th>Contact By</th>
            <td>: &nbsp; {{ $visitinfo->contact_by ?? "Physical"}}</td>
        </tr>
        <tr>
            <th>Name </th>
            <td>: &nbsp; {{ $visitinfo->name ?? ""}}</td>
        </tr>
        <tr>
            <th>Father </th>
            <td>: &nbsp; {{ $visitinfo->father_name ?? ""}}</td>
        </tr>
        <tr>
            <th>E-mail </th>
            <td>: &nbsp; {{ $visitinfo->email ?? ""}}</td>
        </tr>
        <tr>
            <th>Phone </th>
            <td>: &nbsp; {{ $visitinfo->phone ?? ""}}</td>
        </tr>
        <tr>
            <th>Purpose</th>
            <td>: &nbsp;
                @if ($visitinfo->purpose_study == 1)
                Study
                @endif
                @if($visitinfo->purpose_ielts == 1)
                / Ilts
                @endif
                @if($visitinfo->purpose_visit == 1)
                 / Visit
                 @endif

                @if($visitinfo->purpose_others == 1)
                / Others
                @endif
            </td>
        </tr>
        <tr>
            <th>Hear BSB</th>
            <td>: &nbsp; {{ $visitinfo->hearbsb->name }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>: &nbsp; {{ $visitinfo->present_address ?? ""}}</td>
        </tr>
        <tr>
            <th>Front Desk Officer</th>
            <td>: &nbsp; {{ $visitinfo->receptionist->name ?? ""}}</td>
        </tr>
        <tr>
            <th>Asst. Counsellor</th>
            <td>: &nbsp; {{ $visitinfo->asstantcounsellor->name ?? "" }}</td>
        </tr>
        <tr>
            <th>Counsellor</th>
            <td>: &nbsp; {{ $visitinfo->counsellorganerate->name ?? "" }}</td>
        </tr>



    </table>
<p style="float: right; margin-top: 50px; font-size: 14px;"><span style="border-top: 1px solid black;">Signiture</span></p>




    {{-- <div class="container"> --}}

    {{-- </div> --}}

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
