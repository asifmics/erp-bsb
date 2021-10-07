<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>table bsb</title>
<style>@page { size: 8.3in 11.7in; margin:0.1in 0.2in 0.3in 0.2in; }</style>
</head>

<body style="margin: 0; padding: 0;" onload="window.print()">
    <div style="width: 100%;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="margin-bottom: 15px;">
            <tr>
                <td colspan="1" height="30" style="text-align: left; width: 33.333%;">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">STU ID: <span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->id_no ?? ""}}</span></p>
                </td>
                <td colspan="1" height="30" style="text-align: center; width: 33.333%;">
                    <h3 style="margin: 0; padding: 10px 15px; border-radius: 50%; background: #003bac;"><span style=" margin: 0; color: #fff; font-size: 22px; font-family: sans-serif; text-transform: capitalize;">Requisition Slip</span></h3>
                </td>
                <td colspan="1" height="30" style="text-align: right; width: 33.333%;">
                    <p style="margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">Date: <span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->guest_date ?? "" }}</span></p>
                </td>
            </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            <tr>
                <td colspan="1" height="20" style="text-align: left; width: 33.333%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width:40%">
                                <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Session / Year:</p>
                            </td>
                            <td colspan="1" height="20" style="text-align: left;">
                                <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 10px; font-family: sans-serif; text-transform: capitalize;">..................................................</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 33.333%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 15%;">
                                <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Subject:</p>
                            </td>
                            <td colspan="1" height="20" style="text-align: left;">
                                <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">..................................................</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 33.333%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 15%;">
                                <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Country:</p>
                            </td>
                            <td colspan="1" height="20" style="text-align: left; width:85%;">
                                <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->interestcountryActiveStatus->first()->country->name }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            <tr>
                <td colspan="1" height="20" style="text-align: left; width: 60%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Applicants Name: </p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->name ?? ".............................................................................."}}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 40%;">

                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Counselor: </p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->counsellorganerate->name ?? "......................................................" }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
             <tr>
                <td colspan="1" height="20" style="text-align: left; width: 60%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Fathers Name: </p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left; width: 80%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->father_name ?? ".............................................................................." }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 40%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Asst. Counselor: </p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left; ">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->asstantcounsellor->name ?? "......................................................" }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="1" height="20" style="text-align: left; width: 60%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Mothers Name:  </p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->mother_name ?? ".............................................................................." }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 40%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">NID No:</p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->nid ?? "......................................................" }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="1" height="20" style="text-align: left; width: 60%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Legal Guardians Name: </p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">..............................................................................</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 40%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Contact No:</p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->phone ?? "......................................................" }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="1" height="20" style="text-align: left; width: 60%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Contacts Address:</p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">{{ $student->present_address ?? ".............................................................................." }}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="1" height="20" style="text-align: left; width: 40%;">
                    <table width="100%">
                        <tr>
                            <td colspan="1" height="20" style="text-align: left; width: 30%;">
                                 <p style="margin: 0; color: #000; font-size: 13px; font-family: sans-serif; text-transform: capitalize;">Contact No:</p>
                            </td>
                           <td colspan="1" height="20" style="text-align: left;">
                                 <p style="margin: 0; color: #000; font-size: 13px; font-family: sans-serif; text-transform: capitalize;"><span style="text-decoration: underline; margin: 0; color: #000; font-size: 14px; font-family: sans-serif; text-transform: capitalize;">......................................................</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" cellpadding="5" cellspacing="0" border="1" align="center" style="margin-top: 15px;">
            <tr>
                <td height="10" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">S/L</p>
                </td>
                <td height="10" style="text-align: center" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">PARTICULARS</p>
                </td>
                <td height="10" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">AMOUNT</p>
                </td>
                <td height="10" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">REMARK</p>
                </td>
            </tr>

            @php
            // $country = $student->interestcountryActiveStatus->country->id;
            $country = $student->interestcountryActiveStatus->first();
            // dd($country);
            if($country != null){
                $country_id = $country->country_id;
                $total_c_price = App\CountryRequsition::where('country_id',$country->country_id)->sum('amount');
            }else{
                $country_id = null;
                $total_c_price = 0;
            }
            // $country_id = $country->country_id ?? null;
            // dd($country->country_id);
                $requsitions = App\StudentRequsition::where('status',1)->where('parent_id',null)->get();
                $key =1;
            @endphp

            @foreach ($requsitions as $requsition)
            @php
                $rq= App\CountryRequsition::where('country_id',$country_id)->where('requsition_id',$requsition->id)->first();
                $re_am= App\StudentRequsitionDetails::where('student_id',$student->id)->where('requsition_id',$requsition->id)->first()->payable_amount;
            @endphp
            <tr>
                <td height="10" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $key++ }}</p>
                </td>
                <td height="10" style="text-align: left" colspan="1" width="45%; font-weight: bold;">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $requsition->name }}</p>
                </td>
                <td height="10" style="text-align: right" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $rq->amount ?? $re_am}}</p>
                </td>
                <td height="10" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $rq->remark }}</p>
                </td>
            </tr>
            @if (count($requsition->subrequsitions)>0)
            @foreach ($requsition->subrequsitions as $subreq)
            @php
            $rqs= App\CountryRequsition::where('country_id',$country_id)->where('requsition_id',$subreq->id)->first();
            $res_am= App\StudentRequsitionDetails::where('student_id',$student->id)->where('requsition_id',$subreq->id)->first()->payable_amount;

            @endphp
            <tr>
                <td height="10" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
                <td height="10" style="text-align: left" colspan="1" width="45%; ">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $subreq->name ?? "" }}</p>
                </td>
                <td height="10" style="text-align: right" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $subreq->amount ?? $res_am }}</p>
                </td>
                <td height="10" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $subreq->remark ?? "" }}</p>
                </td>
            </tr>
            @endforeach
            @endif

            @endforeach
            @php
                $total_cost = App\StudentRequsitionDetails::where('student_id',$student->id)->sum('payable_amount')
            @endphp
            <tr>
                <td height="10" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
                <td height="10" style="text-align: left" colspan="1" width="45%; font-weight: bold;">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">TOTAL</p>
                </td>
                <td height="10" style="text-align: right" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Tk- {{ $total_cost }}</p>
                </td>
                <td height="10" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
            </tr>
            {{-- <tr>
                <td height="15" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">1</p>
                </td>
                <td height="15" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Registration Free / File Opening </p>
                </td>
                <td height="15" style="text-align: right" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
                <td height="15" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
            </tr> --}}
             {{-- <tr>
                <td height="15" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">2</p>
                </td>
                <td height="15" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Service Charge / Counselling fee Opening </p>
                </td>
                <td height="15" style="text-align: right" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
                <td height="15" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
            </tr> --}}
            {{-- <tr>
                <td height="15" style="text-align: center" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">3</p>
                </td>
                <td height="15" style="text-align: left" colspan="1" width="45%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Commission</p>
                </td>
                <td height="15" style="text-align: right" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
                <td height="15" style="text-align: center" colspan="1" width="25%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                </td>
            </tr> --}}
        </table>

         <table width="100%" cellpadding="5" cellspacing="0" border="0" align="center" style="margin-top: 25px;">
            <tr>
                <td height="15" style="text-align: left" colspan="1" width="5%">
                    <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Note:</p>
                </td>
                <td height="15" style="text-align: left" colspan="1" width="95%">
                    <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">....................................................................................................................................................................................................................</p>
                </td>
            </tr>

        </table>

         <table width="100%" cellpadding="5" cellspacing="0" border="0" align="center" style="margin-top: 25px;">
            <tr>
                <td height="15" style="text-align: center" colspan="1" width="30%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; border-top: 1px solid #000;">Applicant / Guardian s Signature</p>
                </td>
                 <td height="15" style="text-align: left" colspan="1" width="40%">
                </td>
                <td height="15" style="text-align: center" colspan="1" width="30%">
                    <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; border-top: 1px solid #000;">Concern Authority</p>
                </td>
            </tr>

        </table>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
       window.onload = function() { window.print(); }


    </script> --}}
</body>

</html>
