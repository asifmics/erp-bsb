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
        @page { size: 6in 9in; margin:0.1in 0.1in 0.3in 0.3in; }
    </style>
      <table class="table table-light">
          <tbody>
              <tr>
                  <td class="text-left" style="width: 25%">
                      <img src="{{ asset('contents/admin/assets/media/logos/logo.png') }}" alt="" width="100">
                  </td>
                  <td class="text-center" style="width: 50%">
                        <strong class="" style="font-size: 14px;">Plot # 22 Gulshan Circle-2 Dhaka</strong>
                        <p style="font-size: 12px;">Tel: 0222226178994, 01823055302/307</p>
                        <p style="font-size: 12px; line-height:3px">E-mail: bsb@bsdbd, www.bsbbd.com</p>
                    </td>
                  <td class="text-right" style="width: 25%">
                      <h5 class="" style="border: 1px solid gray;font-size: 15px;">Applicant Copy</h5>
                  </td>
              </tr>
              <tr class="table_tr">
                  <td  class="text-left" style="width: 30%"><strong style="font-size: 12px">MR No:</strong> <span style="font-size: 10px;">{{ $data->money_receipt }}</span></td>
                  <td class="text-center" style="width: 40%"><h5 style="font-size: 23px"><u>Money Receipt</u></h5></td>
                  <td  class="text-right" style="width: 30%"><strong style="font-size: 12px">Date:</strong> <span style="font-size: 10px;">{{ $data->date }}</span></td>
              </tr>
              <tr class="table_tr">
                  <td class="text-center" colspan="3"><strong style="font-size: 16px"><u>BSB ID:</u></strong> <span style="font-size: 10px;">{{ $data->student->id_no }}</span></td>
              </tr>
          </tbody>
      </table>
      <table class="table table-light">
          <style>
              .details tr td{
                  padding: 0px;
                  margin: 0px;
              }


          </style>
          <tbody class="details">
              <tr class="table_tr">
                  <td><strong><u>Counsellor:</u></strong> <span class="ml-3">Testtesttestest</td>
                  <td class="text-right"><strong><u>Asst. Counsellor:</u></strong> <span class="ml-3">Testtesttestest</td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Session/ Year:</strong><span class="ml-3">2020-2022</span></td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Country:</strong><span class="ml-3">Bangladesh</span></td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Applicant's Name:</strong><span class="ml-3">{{ $data->student->name }}</span></td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Father's / Spouse Name:</strong><span class="ml-3">{{ $data->student->father_name }}</span></td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Mother Name:</strong><span class="ml-3">{{ $data->student->mother_name }}</span></td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Legal Gardian:</strong><span class="ml-3">{{ $data->student->father_name }}</span></td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left"><strong>Contact Address:</strong><span class="ml-3">{{ $data->student->present_address }}</span></td>
              </tr>
              <tr>
                  <td class="text-left"><span class="ml-3">----------------------------</span></td>
                  <td class="text-left"><strong>Contact No:</strong><span class="ml-3">{{ $data->student->phone }}</span></td>
              </tr>
          </tbody>
      </table>


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
      <table class="table table-bordered table-striped">
          <thead>
              <tr class="particular">
                  <th>S/L</th>
                  <th>MainHead</th>
                  <th>Particulars</th>
                  <th>Amount</th>
                  <th>Remarks</th>
              </tr>
          </thead>
          @php
              $i =1;
          @endphp
          <tbody>
              @foreach ($data->items as $item)
                <tr class="details">
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->details->item->mainrequsition->name ?? ""}}</td>
                    <td>{{ $item->details->item->name}}</td>
                    <td>{{ $item->paid }}</td>
                    <td>{{ $item->remark }}</td>
                </tr>

                @endforeach
          </tbody>
      </table>
      @php
          $digit = new NumberFormatter("en", \NumberFormatter::SPELLOUT);
                $digit_text = $digit->format($data->amount);
      @endphp
      <style>
       .bank td{
                  padding: 0px;
                  margin: 0px;
                  font-size: 15px;
              }

      </style>
      <table class="table table-light" style="font-size: 15px; width:100%">
          <tbody >
              <tr class="bank">
                  <td colspan="4"  style="text-transform: capitalize"><strong>Amounts In Word:</strong><u >{{ $digit_text }}</u></td>
              </tr>
              <tr >
                <td><Strong>By:</Strong></td>
                <td><Strong>No:</Strong></td>
                <td><Strong>Bank:</Strong></td>
                <td class="text-left"><Strong>Date:</Strong></td>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Speical Note:______________________________________________________________</strong>

                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <strong>____________________________________________________________________________</strong>
                </td>
            <tr>
                <td colspan="2" style="font-size: 13px; width:40%">
                    <div class="ok" style="">
                        <strong style="margin-top: 1px solid gray; font-size:13px;float: left;">Applicant /Guardian's Signature</strong>
                    <p style="width: 50px; border:1px solid gray; border-radius: 25px; float: right; padding:5px">Office Seal</p>
                    </div>
                </td>
                <td>
                    <strong style="margin-top: 1px solid gray; font-size:13px; width:20%">Cashir /Accountant</strong>
                </td>
                <td>
                    <strong style="margin-top: 1px solid gray; font-size:13px; width:40%">Asst. Manager / (Accountant)</strong>
                </td>
            </tr>
          </tbody>
      </table>

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
