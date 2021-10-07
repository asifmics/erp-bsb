<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Receptionist Wish Visitor Information</title>
<style>
     @page { size: 8.3in 11.7in; margin:0.1in 0.2in 0.3in 0.2in; }
</style>
</head>

<body style="margin: 0; padding: 0;">
   <div style="width: 100%; margin: 0px auto;">
   <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
       <tr>
            <td colspan="7" style="text-align: center">
                <span style="font-size: 16px; font-weight: bold">BSB Global Network</span>
               {{-- <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;"> --}}
            </td>
        </tr>
       <tr>
            <td colspan="7" height="20" style="text-align: center; ">
                <span style="font-size: 12px; font-weight: bold; margin: 15px;">All visitor Information</span>
               {{-- <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;"> --}}
            </td>
        </tr>
    </table>

    <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center">
        {{-- @foreach ($receptionists as $receptionsit) --}}
        <tr>
            <td colspan="7" height="20" style="text-align: center">
                <span style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Name: {{ $receptionist->name }} || EMP-ID: {{ $receptionist->id_no }}</span>
            </td>
        </tr>
        <tr>
            <th height="15" style="text-align: center" colspan="1" width="5%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">SL</p>
            </th>
             <th height="15" style="text-align: center" colspan="1" width="10%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Employee ID</p>
            </th>
            <th height="15" style="text-align: center" colspan="1" width="37%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Name</p>
            </th>
             <th height="15" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Mobile No</p>
            </th>
            <th height="15" style="text-align: center" colspan="1" width="12%">
                 <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">E-mail</p>
            </th>
            <th height="15" style="text-align: center" colspan="1" width="15%">
                 <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Purpose</p>
            </th>
            <th height="15" style="text-align: center" colspan="1" width="12%">
              <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Visit Date</p>
            </th>
        </tr>

        @if ($receptionist->receptionist_student != "")
        @php
            $i = 1;
        @endphp
        @foreach ($receptionist->receptionist_student as $student)
          <tr>
            <td height="15" style="text-align: center" colspan="1" width="5%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $i++ }}</p>
            </td>
             <td height="15" style="text-align: center" colspan="1" width="10%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $student->visitor_id ?? "" }}</p>
            </td>
            <td height="15" style="text-align: center" colspan="1" width="37%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $student->name ?? "" }}</p>
            </td>
             <td height="15" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $student->phone ?? "" }}</p>
            </td>
            <td height="15" style="text-align: center" colspan="1" width="12%">
                 <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $student->email ?? "" }}</p>
            </td>
            <td height="15" style="text-align: center" colspan="1" width="15%">
                 <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                    @if ($student->purpose_study == 1)
                    Study
                    @endif
                    @if($student->purpose_ielts == 1)
                    / Ilts
                    @endif
                    @if($student->purpose_visit == 1)
                     / Visit
                     @endif

                    @if($student->purpose_others == 1)
                    / Others
                    @endif</p>
            </td>
            <td height="15" style="text-align: center" colspan="1" width="12%">
              <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $student->guest_date ?? "" }}</p>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" height="20" style="text-align: center">
                <span style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Not Data Avaiable</span>
            </td>
        </tr>
        @endif
        {{-- @endforeach --}}
    </table>
    </div>
</body>

</html>
