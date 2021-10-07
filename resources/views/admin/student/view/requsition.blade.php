<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Student Requsition
                </h3>
            </div>
            <a href="{{ route('print_student_requsition',$student->slug) }}" class="btn btn-brand btn-elevate btn-icon-sm" style="height: 40px; margin-top:10px" style="float: right !important"> <i class="fa fa-print"></i> Print</a>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_requsition_details') }}" method="POST">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
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
                <style>
                    .requsition th{
                        text-align: center;
                    }
                </style>
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <table class="requsition" width="100%" cellpadding="0" cellspacing="0" border="1" align="center" style="margin-top: 10px;">
                            <tr>
                                <th>SL</th>
                                <th>Particulars</th>
                                <th>Amount</th>
                                <th>Remark</th>
                            </tr>
                            @foreach ($requsitions as $requsition)
                            @php
                                $rq= App\CountryRequsition::where('country_id',$country_id)->where('requsition_id',$requsition->id)->first();
                                $re_test= App\StudentRequsitionDetails::where('student_id',$student->id)->where('requsition_id',$requsition->id)->first();
                            if(isset($re_test)){
                                $re_am =$re_test->payable_amount;
                                $re_re =$re_test->remark;
                            }else{
                                $re_am = "";
                                $re_re = "";
                            }
                            @endphp
                            <tr>
                                <td class="text-center">{{ $key++ }}</td>
                                <td style="font-weight: bold">{{ $requsition->name }} <input type="hidden" name="requsition_id[]" value="{{ $requsition->id }}"> </td>
                                <td><input type="text" class="form-control" @if(isset($rq->amount)) readonly="readonly @endif  name="amount[]" value="{{ $rq->amount ?? $re_am ?? "" }}"></td>
                                <td><input type="text" class="form-control" @if(isset($rq->remark)) readonly="readonly @endif  name="remark[]" value="{{ $rq->remark ?? $re_re ?? "" }}"></td>
                            </tr>
                            @if (count($requsition->subrequsitions)>0)
                            @foreach ($requsition->subrequsitions as $subreq)
                            @php
                            $rqs= App\CountryRequsition::where('country_id',$country_id)->where('requsition_id',$subreq->id)->first();
                             $res_test= App\StudentRequsitionDetails::where('student_id',$student->id)->where('requsition_id',$subreq->id)->first();
                            if(isset($res_test)){
                                $res_am =$res_test->payable_amount;
                                $res_re =$res_test->remark;
                            }else{
                                $res_am = "";
                                $res_re = "";
                            }
                            @endphp
                            <tr>
                                <td></td>
                                <td>{{ $subreq->name }}</td>
                                <td><input type="text" class="form-control" @if(isset($rqs->amount)) readonly="readonly @endif  name="amount[]" value="{{ $rqs->amount ?? $res_am ?? "" }}"><input type="hidden" name="requsition_id[]" value="{{ $subreq->id }}"></td>
                                <td><input type="text" class="form-control" @if(isset($rqs->remark)) readonly="readonly @endif  name="remark[]" value="{{ $rqs->remark ?? $res_re ?? "" }}"></td>
                            </tr>
                            @endforeach
                            @endif
                        @endforeach
                        <tr>
                            @php
                                $st_req = App\StudentRequsitionDetails::where('student_id',$student->id)->get();
                                if($st_req != null){
                                    $total_price = $st_req->sum('payable_amount');
                                }else{
                                    $total_price = $total_c_price;
                                }
                            @endphp
                            <td></td>
                            <td style="font-weight: bold">TOTAL</td>
                            <td style="font-weight: bold">Tk- {{ $total_price ?? "" }} </td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="submit" class="btn btn-primary btn-block">Update</button></td>
                        </tr>
                    </table>

                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

