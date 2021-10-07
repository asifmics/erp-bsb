<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>table bsb</title>
    <style>
        /*        .rote{
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
            margin: 0;
            padding: 0;
            line-height: 1;
        }*/
        /*.myTable thead tr th,
          .myTable tbody tr  {
              white-space: nowrap !important;
              padding: 3px;
              vertical-align: center;
          }*/
        .myTable thead tr th,
        .myTable tbody tr td {
            /*white-space: nowrap !important;*/
            padding: 5px;
            font-size: 16px;
            /*vertical-align: middle;*/
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
<div style="width: 90%; margin: 50px auto;">
    <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center" class="myTable">
        <tr>
            <td colspan="11" height="40" style="text-align: center">
                <h4 style="margin: 0; color: #000; font-size: 30px; font-family: sans-serif; text-transform: capitalize;">
                    Record of Agentship Validity</h4>
            </td>
        </tr>
        <tr>
            <td colspan="11" height="30" style="text-align: center">
                <h6 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">
                    These are newly collaborated </h6>
            </td>
        </tr>
        <tr>
            <th>SL</th>
            <th>Institutional Agency</th>
            <th>Country Name</th>
            <th>Type</th>
            <th>Valid Form</th>
            <th>Valid To</th>
            <th>Certification</th>
            <th>Pdf</th>
            <th>Status</th>
            <th>Contact Details</th>
            <th>Commission</th>


        </tr>
        @foreach( $agents as $agent)
            <tr>
                <td height="30" style="text-align: center">{{ $loop->iteration ?? '' }}</td>
                <td height="30" style="text-align: center">{{ $agent->universities->name ?? '' }}</td>
                <td height="30" style="text-align: center">{{ $agent->country->name ?? '' }}</td>
                <td height="30" style="text-align: center"> @if ( $agent->type == 1)
                        <span>Direct</span>
                    @else
                        <span>Indirect</span>
                    @endif</td>
                <td height="30" style="text-align: center">{{ \Carbon\Carbon::parse($agent->valid_form)->format('d-m-Y') }}</td>
                <td height="30" style="text-align: center">{{ \Carbon\Carbon::parse($agent->valid_to)->format('d-m-Y') }}</td>
                <td height="30" style="text-align: center">{{ $agent->certification->name ?? '' }}</td>
                <td height="30" style="text-align: center"></td>
                <td height="30" style="text-align: center"> @if ( $agent->status == 1)
                        <span>Active</span>
                    @else
                        <span>Inactive</span></td>
                @endif
                <td height="30" style="text-align: center">{{ $agent->contact_details ?? '' }}</td>
                <td height="30" style="text-align: center">{{ $agent->commission."%" ?? '' }}</td>

            </tr>
        @endforeach



    </table>
</div>
</body>

</html>
