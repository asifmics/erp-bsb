<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>table bsb</title>
</head>

<body style="margin: 0; padding: 0;">
    <div style="width: 100%; margin: 10px auto;">
        <table width="100%" cellpadding="0" cellspacing="0" border="1" align="center">
            <tr>
                <td colspan="6" height="25" style="text-align: center">
                    <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
                </td>
            </tr>
            <tr>
                <td colspan="6" height="25" style="text-align: center">
                    <h4 style="margin: 0; color: #000; font-size:20px; font-family: sans-serif; text-transform: capitalize;">Cashflow Statement</h4>
                </td>
            </tr>
            <tr>
                <td colspan="6" height="20" style="text-align: center">
                    <h6 style="margin: 0; color: #000; font-size: 15px; font-family: sans-serif; text-transform: capitalize;">01.07.2020 to 31.07.2020</h6>
                </td>
            </tr>
            <tr>
                <td height="30" style="text-align: center" colspan="3" width="50%">
                    <h6 style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Inflow</h6>
                </td>
                <td height="30" style="text-align: center" colspan="3" width="50%">
                    <h6 style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Outflow</h6>
                </td>
            </tr>
            @php
                $total_inflow = 0;
                $total_outflow = 0;
            @endphp

            <tr>
                <td colspan="3" style="width: 50%" >
                    <table cellpadding ="5" cellspacing = "0" style="width: 100%;"  align="center">

                        @foreach ($inflow as $item)
                        <tr>
                            <td height="" style="text-align: left;  border-right: solid black 1px;" width="30%">
                                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                                    {!! $item[0]->gl_info->groupDetails->classDetails->name !!}</p>
                            </td>
                            <td height="" style="text-align: right;  border-right: solid black 1px;" width="10%">
                                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"></p>
                            </td>
                            <td height="" style="text-align: right;"  width="10%">
                                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                                    {{$item['sum'] * (-1)}}
                                    @php
                                        $total_inflow += $item['sum'] * (-1);
                                    @endphp
                                </p>
                            </td>
                        </tr>
                            @foreach ($item as $key => $group)
                            <tr>
                                <td height="" style="text-align: left;  border-right: solid black 1px;" width="30%">
                                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                                        {{ ($group->gl_info->name ?? '')}}
                                    </p>
                                </td>
                                <td height="" style="text-align: right;  border-right: solid black 1px;" width="10%">
                                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                                        {{ $group->amount ?? false ? $group->amount * (-1) : '' }}
                                    </p>
                                </td>
                                <td height="" style="text-align: right;"  width="10%">
                                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                                    </p>
                                </td>
                            </tr>
                            @endforeach

                        @endforeach
                        <tr>
                            <td colspan="2" height="" style="text-align: left;  border-right: solid black 1px; border-top: solid black 1px;" width="40%"> <b>Total</b> </td>
                            <td height="" style="text-align: right; border-top: solid black 1px;"  width="10%"> {{$total_inflow}} </td>
                        </tr>
                    </table>
                </td>
                <td colspan="3"  style="width: 50%" >
                    <table style="width: 100%;" align="center" cellspacing = "0" cellpadding ="5">
                        @foreach ($outflow as $item)
                        <tr>
                            <td height="" style="text-align: left;  border-right: solid black 1px;" width="30%">
                                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                                    {!! $item[0]->gl_info->groupDetails->classDetails->name !!}</p>
                            </td>
                            <td height="" style="text-align: right;  border-right: solid black 1px;" width="10%">
                                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;"></p>
                            </td>
                            <td height="" style="text-align: right;"  width="10%">
                                <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                                    {{$item['sum']}}
                                    @php
                                        $total_outflow += $item['sum'];
                                    @endphp
                                </p>
                            </td>
                        </tr>
                            @foreach ($item as $key => $group)
                            <tr>
                                <td height="" style="text-align: left;  border-right: solid black 1px;" width="30%">
                                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                                        {{ ($group->gl_info->name ?? '')}}
                                    </p>
                                </td>
                                <td height="" style="text-align: right;  border-right: solid black 1px;" width="10%">
                                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                                        {{ $group->amount ?? '' }}
                                    </p>
                                </td>
                                <td height="" style="text-align: right;"  width="10%">
                                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" height="" style="text-align: left;  border-right: solid black 1px; border-top: solid black 1px;" width="40%"> <b>Total</b> </td>
                                <td height="" style="text-align: right; border-top: solid black 1px;"  width="10%"> {{$total_outflow}} </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"  style="width: 50%">
                    <p>Net Inflow: {{$total_inflow - $total_outflow}}</p>
                </td>
                <td colspan="3"  style="width: 50%">
                    
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
