
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>table bsb</title>
</head>

<body style="margin: 0; padding: 0;">
    <div style="width: 90%; margin: 50px auto;">
        <table width="100%" cellpadding="5" cellspacing="0" border="1" align="center">
            <tr>
                <td colspan="6" height="40" style="text-align: center">
                    <img src="http://bsb.uzzalbd.com/contents/admin/assets/media/logos/logo.png" alt="" style="vertical-align: middle; padding: 10px 0px;">
                </td>
            </tr>
            <tr>
                <td colspan="6" height="40" style="text-align: center">
                    <h4 style="margin: 0; color: #000; font-size: 30px; font-family: sans-serif; text-transform: capitalize;">Day Book of {{$date}}</h4>
                </td>
            </tr>
            <tr>
                <td height="auto" style="text-align: left" colspan="1" width="15%">
                    <h6 style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-bottom: 5px;">VOUCHER</h6>

                </td>
                <td height="auto" style="text-align: center" colspan="1" width="5%">
                    <h6 style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-bottom: 5px;">DATE</h6>
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="10%">
                    <h6 style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-bottom: 5px;">REFERENCE</h6>
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="50%">
                    <h6 style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-bottom: 5px;">DESCRIPTION</h6>
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="10%">
                    <h6 style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-bottom: 5px;">DEBIT</h6>
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="10%">
                    <h6 style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-bottom: 5px;">CREDIT</h6>
                </td>
            </tr>
            @forelse ($all as $item)
                
            <tr>

                <td height="auto" style="text-align: left" colspan="1" width="15%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-left: 10px; padding-bottom: 5px;">{{$item->referance}}</p>
                    @forelse ($item->journal_items as $jl_item)
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-left: 10px; padding-bottom: 5px;"> {{$jl_item->gl_info->code . ' ' . $jl_item->gl_info->name}}</p>
                        
                    @empty
                        
                    @endforelse

                </td>
                <td height="auto" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: right padding-bottom: 5px;">{{$item->gl_date}}</p>

                </td>
                <td height="auto" style="text-align: center" colspan="1" width="10%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: right padding-bottom: 5px;">{{$item->src_referance}}</p>
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="50%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: left; padding-bottom: 5px;">{{$item->memo}}</p>
                    @forelse ($item->journal_items as $jl_item)
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-left: 0px; text-align: left; padding-bottom: 5px;">{{$jl_item->memo}}</p>
                        
                    @empty
                        
                    @endforelse
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="10%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: right; padding-bottom: 5px;"></p>
                    @forelse ($item->journal_items as $jl_item)
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: right; padding-bottom: 5px">{{$jl_item->amount > 0 ? $jl_item->amount : ''}}</p>
                        
                    @empty
                        
                    @endforelse
                </td>
                <td height="auto" style="text-align: center" colspan="1" width="10%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: right; padding-bottom: 5px;"></p>
                    @forelse ($item->journal_items as $jl_item)
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; text-align: right; padding-bottom: 5px">{{$jl_item->amount < 0 ? ($jl_item->amount * (-1)) : ''}}</p>
                        
                    @empty
                        
                    @endforelse
                </td>
            </tr>
            @empty
            <tr>

                <td height="auto" style="text-align: left" colspan="6" width="100%">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize; padding-left: 10px; padding-bottom: 5px;">No Entries found!</p>

                </td>
            </tr>
            @endforelse
            
                        


        </table>
    </div>
</body>

</html>