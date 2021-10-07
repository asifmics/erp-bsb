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
<div style="width: 90%; margin: 0px auto;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <td colspan="5" height="20" style="text-align: center">
                <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
            </td>
        </tr>
    </table>

    @php
        $requestDate = '';
            $aDates = array();
            if ($slug)   {
                $requestDate =  \Carbon\Carbon::createFromFormat('m-Y', $slug)->format("Y-m") ;
            }
            $oStart = new DateTime("$requestDate");
     $oEnd = clone $oStart;
     $oEnd->add(new DateInterval("P1M"));

     while ($oStart->getTimestamp() < $oEnd->getTimestamp()) {
         $aDates[] = $oStart->format('jS F ,y');
         $oStart->add(new DateInterval("P1D"));
     }
    @endphp

    <table width="100%" cellpadding="2" cellspacing="0" border="1" align="center">
            <tr>
                <td colspan="5" height="" style="text-align: center">
                    <h4 style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Month Working Days Information for the Month of {{ ($slug) ? $date = \Carbon\Carbon::createFromFormat('m-Y', $slug)->format("F'Y") : '' }}</h4>
                </td>
            </tr>
            <tr>
                <td height="" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Date</p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Day</p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Day Details</p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Days Information</p>
                </td>
                <td height="" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"> Remarks </p>
                </td>
            </tr>
            @php
                $i = 0;
                $holidayCount = 0
            @endphp
            @foreach( $aDates as $day)
                <tr>
                    <td height="" style="text-align: center" colspan="1" width="20%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ $day }}</p>
                    </td>
                    <td height="" style="text-align: center" colspan="1" width="25%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">{{ \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") }}</p>
                    </td>
                    <td height="" style="text-align: center" colspan="1" width="20%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">

                            @php
                                $dayf = \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format('Y-m-d');
                                $holiday = \App\Holiday::where('date',$dayf)->first();
                                if (($holiday)){
                                echo $holiday->reason ??  '' ;
                                }else{
                                echo \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? 'Off Day' : 'Normal Working Day';
                                }

                            @endphp
                        </p>
                    </td>
                    <td height="" style="text-align: center" colspan="1" width="20%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                            @php
                                $dayf = \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format('Y-m-d');
                                $holiday = \App\Holiday::where('date',$dayf)->first();
                                if (($holiday)){
                                echo $holiday->reason ??  '' ;
                                }else{
                                echo \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? 'Off Day' : 'Normal Working Day';
                                }

                            @endphp
                        </p>
                    </td>
                    <td height="" style="text-align: center" colspan="1" width="5%">
                        <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">
                            @php
                                $dayf = \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format('Y-m-d');
                                $holiday = \App\Holiday::where('date',$dayf)->first();
                                if (($holiday)){
                                echo 0 ??  '' ;
                                $holidayCount += 1;
                                }else{
                                echo \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? '0' : 1;
                                }

                            @endphp
                        </p>
                    </td>
                    @php
                        $i +=  \Carbon\Carbon::createFromFormat('jS F ,y', $day)->format("l") == 'Friday' ? '0' : 1
                    @endphp
                </tr>
            @endforeach
            <tr>
                <td height="15" style="text-align: center" colspan="1" width="20%">
                    <p style="margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">

                    </p>
                </td>
                <td height="15" style="text-align: center" colspan="3" width="75%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: 600">Total Working days for the month of {{ ($slug) ? $date = \Carbon\Carbon::createFromFormat('m-Y', $slug)->format("F'Y") : ''  }}</p>
                </td>
                <td height="15" style="text-align: center"  width="5%">
                    <h5 style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">{{ $i - $holidayCount }}</h5>
                </td>
            </tr>
            <tr>
                <td height="" style="text-align: left" colspan="5" width="100%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Special Note -</p>
                </td>
            </tr>
        </table>
</div>
</body>

</html>
