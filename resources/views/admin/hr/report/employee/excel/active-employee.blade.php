<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>table bsb</title>
</head>

<body style="margin: 0; padding: 0;">
<div style="width: 90%; margin: 50px auto;">

    <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center" style="border: 1px solid #000000">
        <tr>
            <td colspan="7" height="40" style="text-align: center; border: 1px solid #000000">
                <h4 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">Active Employees Details</h4>
            </td>
        </tr>
        <tr>
            <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="5px">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">SL</p>
            </td>
            <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="10px">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Employee ID</p>
            </td>
            <td height="30" style="text-align: center;border: 1px solid #000000" colspan="1" width="37px">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Name</p>
            </td>
            <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="12px">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> mobile No</p>
            </td>
            <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="12px">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Designation</p>
            </td>
            <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="15px">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Department </p>
            </td>
            <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Joining Date</p>
            </td>

        </tr>
        @foreach ( $employees as $employee)
            <tr>
                <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="5px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $loop->iteration  }}</p>
                </td>
                <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="10px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $employee->id_no ?? '' }}</p>
                </td>
                <td height="30" style="text-align: center; border: 1px solid #000000" colspan="1" width="37px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $employee->name ?? "" }}</p>
                </td>
                <td height="30" style="text-align: center;border: 1px solid #000000" colspan="1" width="12px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->phone ?? "---" }}</p>
                </td>
                <td height="30" style="text-align: center;border: 1px solid #000000" colspan="1" width="12px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{  $employee->designation->name ?? '---' }}</p>
                </td>
                <td height="30" style="text-align: center;border: 1px solid #000000" colspan="1" width="15px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->department_details->name ?? '---' }}  </p>
                </td>
                <td height="30" style="text-align: center;border: 1px solid #000000" colspan="1" width="12px">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->joining_date ?? '---' }}</p>
                </td>
            </tr>
        @endforeach

    </table>
</div>
</body>

</html>
