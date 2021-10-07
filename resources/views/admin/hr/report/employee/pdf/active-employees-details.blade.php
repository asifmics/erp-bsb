<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>table bsb</title>
</head>

<body style="margin: 0; padding: 0;">
<div style="width: 90%; margin: 50px auto;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <td colspan="7" height="40" style="text-align: center">
                <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
            </td>
        </tr>
    </table>

    <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center">
        <tr>
            <td colspan="13" height="40" style="text-align: center">
                <h4 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">Active Employees Details</h4>
            </td>
        </tr>
        <tr>
            <td height="30" style="text-align: center" colspan="1" width="5%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">SL</p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="10%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Employee ID</p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="37%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Name</p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">Designation</p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="15%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Deptment </p>
            </td>

            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Joining Date</p>
            </td>

            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Mobile No</p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Gross Salary</p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Branch </p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> NID </p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> TIN </p>
            </td>

            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> DOB </p>
            </td>
            <td height="30" style="text-align: center" colspan="1" width="12%">
                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> Gender </p>
            </td>

        </tr>
        @foreach ( $employees as $employee)
            <tr>
                <td height="30" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $loop->iteration  }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="10%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $employee->id_no ?? '---' }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="37%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $employee->name ?? "---" }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{  $employee->designation->name ?? '---' }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="15%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->department_details->name ?? '---' }}  </p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->joining_date ?? '---' }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->phone ?? "---" }}</p>
                </td>

                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->salary_scale_details->amount  ?? "---" }}</p>
                </td>

                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->branch_details->name ?? "---" }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->nid ?? "---" }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->tin ?? "---" }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->dob ?? "---" }}</p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="12%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"> {{ $employee->gender ?? "---" }}</p>
                </td>

            </tr>
        @endforeach

    </table>
</div>
</body>

</html>
