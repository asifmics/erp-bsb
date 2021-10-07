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
                <td colspan="3" height="40" style="text-align: center">
                    <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
                </td>
            </tr>
            <tr>
                <td colspan="3" height="40" style="text-align: center">
                    <h4 style="margin: 0; color: #000; font-size: 30px; font-family: sans-serif; text-transform: capitalize;">Income Expense</h4>
                </td>
            </tr>
            <tr>
                <td height="30" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">topic </p>
                </td>
                   <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Amount in Taka {{$first_date}}</p>
                </td>
                <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 18px; font-family: sans-serif; text-transform: capitalize;">Amount in Taka {{$secound_date}}</p>
                </td>
            </tr>
            @php
                $total_1st = 0;
                $total_2nd = 0;
            @endphp
            @foreach ($data as $type => $item)    
            <tr>
              <td height="30" style="text-align: left" colspan="1" width="45%">
                  <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">{{$type}}</p>
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
               <td height="30" style="text-align: left" colspan="1" width="22.5%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                    @if (array_key_exists('1st', $detail))    
                    {{$detail['1st']['sum']}}
                    @php
                        $total_1st += $detail['1st']['sum'];
                    @endphp
                    @else
                    -
                    @endif
                </p>
            </td>
            <td height="30" style="text-align: left" colspan="1" width="22.5%">
                <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;font-weight: bold;">
                    @if (array_key_exists('2nd', $detail))
                    {{$detail['2nd']['sum']}}
                    @php
                        $total_2nd += $detail['2nd']['sum'];
                    @endphp
                        
                    @else
                        -
                    @endif
                </p>
            </td>
        </tr>
            @foreach ($detail as $group_name => $gl_detail)
            @if ($group_name != '1st' && $group_name != '2nd')
            <tr>
                <td height="30" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">{{$group_name}} </p>
                </td>
                   <td height="30" style="text-align: center" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                        @if (array_key_exists('1st', $gl_detail))
                        {{$gl_detail['1st']['sum']}}
                            
                        @else
                            -
                        @endif
                    </p>
                </td>
                <td height="30" style="text-align: center" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; font-weight: bold;">
                        @if (array_key_exists('2nd', $gl_detail))
                        {{$gl_detail['2nd']['sum']}}
                            
                        @else
                            -
                        @endif
                    </p>
                </td>
            </tr>
            @foreach ($gl_detail as $gl_name => $amount)
            @if ($gl_name != 'sum' && $gl_name != '1st' && $gl_name != '2nd')
                
            <tr>
                <td height="30" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{$gl_name}} </p>
                </td>
                   <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">
                        @if (array_key_exists('1st', $amount))
                        {{array_sum( (array) $amount['1st'])}}
                            
                        @else
                            -
                        @endif
                    </p>
                </td>
                <td height="30" style="text-align: right" colspan="1" width="22.5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">
                        @if (array_key_exists('2nd', $amount))
                        {{array_sum( (array) $amount['2nd'])}}
                            
                        @else
                            -
                        @endif
                    </p>
                </td>
            </tr>
            @endif
            
            @endforeach
            @endif
            
            @endforeach
            @if(!$loop->last)
            <tr>
                <td height="30" style="text-align: left" colspan="3" width="100%"></td>
            </tr>
            @endif
          @endforeach
          <tr>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="45%"> Total {{$type}} </td>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="22.5%"> 
                {{$total_1st}} 
                @php
                    $total_1st = 0;
                @endphp
            </td>
            <td height="30" style="text-align: left; text-transform: uppercase; font-weight: bold;" colspan="1" width="22.5%">
            
                {{$total_2nd}} 
                @php
                    $total_2nd = 0;
                @endphp

            </td>
        </tr>
        <tr>
            <td height="30" style="text-align: left" colspan="3" width="100%"></td>
        </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
