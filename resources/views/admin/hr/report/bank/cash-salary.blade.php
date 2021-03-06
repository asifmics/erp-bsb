<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>table bsb</title>

</head>
<style>
    table thead tr th,
    table tbody tr td {
        white-space: nowrap !important;
        padding: 5px;
        vertical-align: middle;
    }
</style>

<body style="margin: 0; padding: 0;">
<div style="width: 90%; margin: 0 auto;text-align: center">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <td colspan="5" height="20" style="text-align: center">
                <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
            </td>
        </tr>
    </table>


    <table width="100%" cellpadding="2" cellspacing="0" border="1" align="center">
        <tr>
            <td colspan="5" height="" style="text-align: center">
                <h4 style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">All Cash Salary Sheet</h4>
            </td>
        </tr>
        <tr>
            <td height="" style="text-align: center" colspan="1" width="20%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">SL</p>
            </td>
            <td height="" style="text-align: center" colspan="1" width="25%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">EMP CODE</p>
            </td>
            <td height="" style="text-align: center" colspan="1" width="20%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Name of the Account Holder</p>
            </td>
            <td height="" style="text-align: center" colspan="1" width="20%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Account No.</p>
            </td>
            <td height="" style="text-align: center" colspan="1" width="5%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"> Amount (Taka) </p>
            </td>
        </tr>

        @foreach( $employees as $employee)
            <tr>
                <td height="" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $loop->iteration }}</p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $employee->id_no ?? ""  }}</p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                        {{ $employee->name ?? "" }}
                    </p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                        {{ $employee->account_no ?? '' }}
                    </p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                        {{ $employee->salary_scale_details->amount ?? '' }}
                    </p>
                </td>

            </tr>
        @endforeach

        <tr>
            <td height="" style="text-align: left" colspan="5" width="100%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Special Note -</p>
            </td>
        </tr>
    </table>
</div>
</body>

</html>
