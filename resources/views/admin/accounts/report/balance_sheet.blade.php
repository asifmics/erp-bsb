<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>table bsb</title>
</head>

<body style="margin: 0; padding: 0;">
    <div style="width: 98%; margin: 50px auto;">
        <table width="100%" cellpadding="5" cellspacing="0" border="1" align="center">
            <tr>
                <td colspan="4" height="40" style="text-align: center">
                    <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
                </td>
            </tr>
            <tr>
                <td colspan="4" height="40" style="text-align: center">
                    <h4 style="margin: 0; color: #000; font-size: 30px; font-family: sans-serif; text-transform: capitalize;">Statement of Financial Position</h4>
                </td>
            </tr>
            <tr>
                <td colspan="4" height="30" style="text-align: center">
                    <h6 style="margin: 0; color: #000; font-size: 20px; font-family: sans-serif; text-transform: capitalize;">01.07.2020 to 31.07.2020</h6>
                </td>
            </tr>
            <tr>
                <td height="30" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">topic </p>
                </td>
                <td height="30" style="text-align: right" colspan="1" width="10%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Notes</p>
                </td>
                   <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Amount in Taka 30-Sep-20</p>
                </td>
                <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Amount in Taka 30-Jun-20</p>
                </td>
            </tr>
            @php
                $total = 0;
            @endphp
            @foreach ($data as $type => $item)    
            <tr>
              <td height="30" style="text-align: left" colspan="1" width="45%">
                  <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">{{$type}}</p>
              </td>
              <td height="30" style="text-align: right" colspan="1" width="10%">
                  <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"></p>
              </td>
                 <td height="30" style="text-align: right" colspan="1" width="22.5%">
                  <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"></p>
              </td>
              <td height="30" style="text-align: right" colspan="1" width="22.5%">
                  <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;"></p>
              </td>
          </tr>
          @foreach ($item as $name => $detail)
          <tr>
            <td height="30" style="text-align: left" colspan="1" width="45%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">{{$name}} </p>
            </td>
            <td height="30" style="text-align: right" colspan="1" width="10%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">-</p>
            </td>
               <td height="30" style="text-align: right" colspan="1" width="22.5%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                    {{$detail['sum']}}
                    @php
                        $total += $detail['sum'];
                    @endphp
                </p>
            </td>
            <td height="30" style="text-align: right" colspan="1" width="22.5%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">-</p>
            </td>
        </tr>
            @foreach ($detail as $gl_name => $amount)
            @if ($gl_name != 'sum')    
            <tr>
                <td height="30" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{$gl_name}} </p>
                </td>
                <td height="30" style="text-align: right" colspan="1" width="10%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">-</p>
                </td>
                   <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{array_sum( (array) $amount)}}</p>
                </td>
                <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">-</p>
                </td>
            </tr>
            @endif
            @endforeach
            @if(!$loop->last)
            <tr>
                <td height="30" style="text-align: left" colspan="4" width="100%"></td>
            </tr>
        @endif
          @endforeach
          <tr>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="45%"> Total {{$type}} </td>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="10%"> </td>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="22.5%"> 
                {{$total}} 
                @php
                    $total = 0;
                @endphp
            </td>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="22.5%"> </td>
        </tr>
        <tr>
            <td height="30" style="text-align: left" colspan="4" width="100%"></td>
        </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
