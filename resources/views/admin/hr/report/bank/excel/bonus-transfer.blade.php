<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>table bsb</title>

</head>

<body style="margin: 0; padding: 0;">
<div style="width: 90%; margin: 0 auto;text-align: center">

    <table width="100%" cellpadding="2" cellspacing="0" border="1" align="center">
        <tr>
            <td colspan="5" height="40px" width="100%" style="text-align: center; border: 1px solid #000000">
                <h4 style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">All Bonus Transfer Sheet</h4>
            </td>
        </tr>
        <tr>
            <td height="40px" width="20px" style="text-align: center; border: 1px solid #000000" >
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">SL</p>
            </td>
            <td height="40px" width="20px" style="text-align: center; border: 1px solid #000000"  >
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">EMP CODE</p>
            </td>
            <td height="40px" width="20px" style="text-align: center; border: 1px solid #000000"  >
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Name of the Account Holder</p>
            </td>
            <td height="40px" width="20px" style="text-align: center; border: 1px solid #000000" >
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Account No.</p>
            </td>
            <td height="40px" style="text-align: center; border: 1px solid #000000" width="20px">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"> Amount (Taka) </p>
            </td>
        </tr>

        @foreach( $employees as $employee)
            <tr>
                <td height="40px" style="text-align: center; border: 1px solid #000000" width="20px" >
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $loop->iteration }}</p>
                </td>
                <td height="40px" style="text-align: center; border: 1px solid #000000" width="20px" >
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $employee->id_no ?? ""  }}</p>
                </td>
                <td height="40px" style="text-align: center;border: 1px solid #000000" width="20px" >
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                        {{ $employee->name ?? "" }}
                    </p>
                </td>
                <td height="40px" style="text-align: center;border: 1px solid #000000" width="20px" >
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                        {{ $employee->account_no ?? '' }}
                    </p>
                </td>
                <td height="40px" style="text-align: center;border: 1px solid #000000" width="20px" >
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                        {{ $employee->salary_scale_details->amount ?? '' }}
                    </p>
                </td>

            </tr>
        @endforeach

        <tr>
            <td height="40px" style="text-align: left;border: 1px solid #000000" colspan="5" width="100%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Special Note -</p>
            </td>
        </tr>
    </table>
</div>
</body>

</html>
