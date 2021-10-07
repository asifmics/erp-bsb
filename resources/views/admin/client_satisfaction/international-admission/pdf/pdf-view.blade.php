<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>table bsb</title>
    <style>

        table thead tr th,
        table tbody tr td {
           /* white-space: nowrap !important;*/
            padding: 5px;
            font-size: 16px;

        }

    </style>
</head>

<body style="margin: 0; padding: 0;">
<div style="width: 100%; margin: 50px auto;">
    <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center" class="myTable" style=" border: 1px solid #000000; ">
        <tr>
            <td colspan="13" height="40" style="text-align: center; border: 1px solid #000000;">
                <h4 style="margin: 0; color: #000; font-size: 30px; font-family: sans-serif; text-transform: capitalize; ">
                    Record of International Admission Validity</h4>
            </td>
        </tr>
        <tr>
            <td colspan="13" height="30" style="text-align: center; border: 1px solid #000000;">
                <h6 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">
                    These are newly collaborated </h6>
            </td>
        </tr>
        <tr>
            <th style="text-align: center;border: 1px solid #000000; ">SL</th>
            <th style="text-align: center;border: 1px solid #000000; ">F.O.DATE</th>
            <th style="text-align: center;border: 1px solid #000000; ">STU ID</th>
            <th style="text-align: center;border: 1px solid #000000; ">STUDENT NAME</th>
            <th style="text-align: center;border: 1px solid #000000; ">COUNTRY</th>
            <th style="text-align: center;border: 1px solid #000000; ">INSTITUTION</th>
            <th style="text-align: center;border: 1px solid #000000; ">COUNSELOR</th>
            <th style="text-align: center;border: 1px solid #000000; ">EXPENSE PARTICULARS</th>
            <th style="text-align: center;border: 1px solid #000000; ">EXPENSE AMOUNT</th>
            <th style="text-align: center;border: 1px solid #000000; ">PAYMENT METHOD</th>
            <th style="text-align: center;border: 1px solid #000000; ">CARD HOLDER</th>
            <th style="text-align: center;border: 1px solid #000000; ">STATUS</th>
            <th style="text-align: center;border: 1px solid #000000; ">Remark</th>

        </tr>
        @foreach( $admissions as $admission)
            <tr>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $loop->iteration ?? '' }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->f_o_date ?? ''}}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->student->id_no ?? '' }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->student->name ?? '' }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->student->country->name ?? '' }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->student->interestcountryActiveStatus[0]->university->name ?? '' }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->student->counsellorganerate->name ?? '' }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->ex_particulars }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->ex_amount }}</td>
                <td style="text-align: center;border: 1px solid #000000; ">
                    @if ( ($admission->pay_method) == 1)
                        <span class="text-primary" style="font-weight: 600">CARD</span>
                    @elseif( $admission->pay_method == 2)
                        <span class="text-danger" style="font-weight: 600">BANK</span>
                    @elseif( $admission->pay_method == 3)
                        <span class="text-danger" style="font-weight: 600">CHECk</span>
                    @elseif( $admission->pay_method == 4)
                        <span class="text-danger" style="font-weight: 600">MASTER CARD</span>
                    @elseif( $admission->pay_method == 5)
                        <span class="text-danger" style="font-weight: 600">CREDIT CARD</span>
                    @elseif( $admission->pay_method == 6)
                        <span class="text-danger" style="font-weight: 600">VISA CARD</span>
                    @else
                        <span class="text-danger" style="font-weight: 600"></span>

                    @endif
                </td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->card_holder ?? '' }}</td>

                <td style="text-align: center;border: 1px solid #000000; ">@if ( $admission->status == 1)
                        <span class="text-success" style="font-weight: 600">Active</span>
                    @else
                        <span class="text-danger" style="font-weight: 600">Inactive</span>
                    @endif
                </td>
                <td style="text-align: center;border: 1px solid #000000; ">{{ $admission->remark ?? '' }}</td>
            </tr>
        @endforeach

    </table>
</div>
</body>

</html>
