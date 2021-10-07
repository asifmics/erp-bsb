<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>table bsb</title>
    <style>

        table thead tr th,
        table tbody tr td {
            white-space: nowrap !important;
            padding: 5px;
            font-size: 16px;
            vertical-align: middle !important;
        }

    </style>
</head>

<body style="margin: 0; padding: 0;">
<div style="width: 90%; margin: 50px auto;">
    <table cellpadding="0" cellspacing="0" border="1" align="center" class="myTable" style=" border: 1px solid #000000; ">
        <tr>
            <td colspan="11" height="40" style="text-align: center; border: 1px solid #000000;">
                <h4 style="margin: 0; color: #000; font-size: 30px; font-family: sans-serif; text-transform: capitalize; ">
                    Record of Agentship Validity</h4>
            </td>
        </tr>
        <tr>
            <td colspan="11" height="30" style="text-align: center; border: 1px solid #000000;">
                <h6 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">
                    These are newly collaborated </h6>
            </td>
        </tr>
        <tr>
            <th style="text-align: center;border: 1px solid #000000; ">SL</th>
            <th style="text-align: center;border: 1px solid #000000; ">Institutional Agency</th>
            <th style="text-align: center;border: 1px solid #000000; ">Country Name</th>
            <th style="text-align: center;border: 1px solid #000000; ">Type</th>
            <th style="text-align: center;border: 1px solid #000000; ">Valid Form</th>
            <th style="text-align: center;border: 1px solid #000000; ">Valid To</th>
            <th style="text-align: center;border: 1px solid #000000; ">Certification</th>
            <th style="text-align: center;border: 1px solid #000000; ">Pdf</th>
            <th style="text-align: center;border: 1px solid #000000; ">Status</th>
            <th style="text-align: center;border: 1px solid #000000; ">Contact Details</th>
            <th style="text-align: center;border: 1px solid #000000; ">Commission</th>


        </tr>
        @foreach( $admissions as $admission)
            <tr>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ $loop->iteration ?? '' }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ $admission->universities->name ?? '' }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ $agent->country->name ?? '' }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;"> @if ( $agent->type == 1)
                        <span>Direct</span>
                    @else
                        <span>Indirect</span>
                    @endif</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ \Carbon\Carbon::parse($agent->valid_form)->format('d-m-Y') }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ \Carbon\Carbon::parse($agent->valid_to)->format('d-m-Y') }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ $agent->certification->name ?? '' }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">file</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;"> @if ( $agent->status == 1)
                        <span>Direct</span>
                    @else
                        <span>Indirect</span></td>
                @endif
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ $agent->contact_details ?? '' }}</td>
                <td height="30" style="text-align: center;border: 1px solid #000000;">{{ $agent->commission."%" ?? '' }}</td>

            </tr>
        @endforeach

    </table>
</div>
</body>

</html>
