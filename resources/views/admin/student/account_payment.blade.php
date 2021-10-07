@extends('layouts.admin')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .admission-form-title{
    margin-bottom: 5px;
    margin-top: 10px;
    background-color: #e4e4e4;
    padding-left: 10px;
    }
    p{
        font-family: 'Raleway', sans-serif;
    font-size: 14px;
    font-weight: normal;
    letter-spacing: 0;
    line-height: 28px;
    margin: 0;
    }
</style>
@endpush
@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('account_payment_received_store')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    Student Payment
                </h3>
            </div>
            {{-- <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{route('all_employee')}}"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Student List</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Student Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="row">
                <div class="col-md-12">
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                    {{-- @php
                    // $country = $student->interestcountryActiveStatus->country->id;
                    $country = $student->interestcountryActiveStatus->first();
                    // dd($country);
                    if(isset($country)){
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
                    @endphp --}}
                    <style>
                        .requsition th{
                            text-align: center;
                        }
                    </style>
                    <div class="row">
                        {{-- <div class="col-md-12 m-auto">
                            <table class="requsition" width="100%" cellpadding="0" cellspacing="0" border="1" align="center" style="margin-top: 10px;">
                                <tr>
                                    <th>SL</th>
                                    <th>Particulars</th>
                                    <th>Account Payable</th>
                                    <th>Previous Received</th>
                                    <th>Due</th>
                                    <th>Today Received</th>
                                    <th>Discount</th>
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
                                    <td><input class="form-control" @if(isset($rq->amount)) readonly @endif  name="amount[]" value="{{ $rq->amount ?? $re_am ?? "" }}"></td>
                                    <td><input class="form-control" @if(isset($rq->remark)) readonly @endif  name="remark[]" value="{{ $rq->remark ?? $re_re ?? "" }}"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                        <td>{{ $subreq->name }} </td>
                                        <td><input class="form-control" @if(isset($rqs->amount)) readonly @endif  name="amount[]" value="{{ $rqs->amount ?? $res_am ?? "" }}"><input type="hidden" name="requsition_id[]" value="{{ $subreq->id }}"></td>
                                        <td><input class="form-control" @if(isset($rqs->remark)) readonly @endif  name="remark[]" value="{{ $rqs->remark ?? $res_re ?? "" }}"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                                <td style="font-weight: bold" colspan="5">TOTAL</td>
                                <td style="font-weight: bold">Tk- {{ $total_price ?? "" }} </td>
                            </tr>
                            <tr>
                                <td colspan="8"><button type="submit" class="btn btn-primary btn-block">Update</button></td>
                            </tr>
                        </table>

                        </div> --}}


                        <div style="width: 100%;">
                            <table width="100%" cellpadding="5" cellspacing="0" border="1" align="center" style="margin-top: 15px;">
                                <tr>
                                    <td height="10" style="text-align: center" colspan="1" width="5%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">S/L</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="25%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">PARTICULARS</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Receivable</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Received</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Due</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Receive</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 16px; font-family: sans-serif; text-transform: capitalize;">Discount</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="20%">
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

                                @foreach ($requsitions as $key => $requsition)
                                @php
                                    $rq= App\CountryRequsition::where('country_id',$country_id)->where('requsition_id',$requsition->id)->first();
                                    $re_test= App\StudentRequsitionDetails::where('student_id',$student->id)->where('requsition_id',$requsition->id)->first();
                                    if(isset($re_test)){
                                        $re_am =$re_test->payable_amount;
                                        $re_re =$re_test->remark;
                                        $re_paid =$re_test->paid;
                                        $re_discount =$re_test->discount;
                                        if($re_am != ''){
                                            if ($re_test->discount != "") {
                                                    $dis_prices =$re_test->payable_amount - $re_test->discount ;
                                                    $re_due =$dis_prices - $re_test->paid;
                                                }
                                                else {
                                                    $re_due = $re_test->payable_amount - $re_test->paid;

                                                }
                                            }else{
                                                $re_due = '';
                                            }
                                    }else{
                                        $re_am = "";
                                        $re_re = "";
                                        $re_paid = "";
                                    }
                                    @endphp
                                <tr>
                                    <td height="10" style="text-align: center;" colspan="1" width="5%" >
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;  font-weight: bold;">{{ $key++ }}<input type="hidden" name="requsition_0[]" value="{{ $requsition->id }}"></p>
                                    </td>
                                    <td height="10" style="text-align: left;" colspan="1" width="25%; font-weight: bold;">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;  font-weight: bold;">{{ $requsition->name }}</p>
                                    </td>
                                    <td height="10" style="text-align: right;" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; ">{{ $rq->amount ?? $re_am}} <input type="hidden" value="{{ $rq->amount ?? $re_am}}" name="payable{{$requsition->id}}" class="payable{{ $requsition->id }}"></p>
                                    </td>
                                    <td height="10" style="text-align: right;" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; ">{{ $re_paid ?? ""}} <input type="hidden" value="{{ $re_paid ?? ""}}" name="paid{{ $requsition->id }}" class="paid{{ $requsition->id }}"></p>
                                    </td>
                                    <td height="10" style="text-align: right;" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; "> <input type="number" readonly value="{{ $re_due ?? ""}}" name="due{{ $requsition->id }}" class="due{{ $requsition->id }} form-control"></p>
                                    </td>
                                    <td height="10" style="text-align: right;" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; "><input @if($re_due == "") readonly @endif onchange="payment(this)" id="{{ $requsition->id }}" class="form-control" name="received_0[]" value=""></p>
                                    </td>
                                    <td height="10" style="text-align: right;" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; "><input @if($re_due == "") readonly @endif id="{{ $requsition->id }}" onchange="receive(this)" class="form-control" name="discount_0[]" value="{{ $re_discount ?? "" }}"></p>
                                    </td>
                                    <td height="10" style="text-align: center;" colspan="1" width="20%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize; "><input name="remark_0[]" value="" class="form-control"></p>
                                    </td>
                                </tr>

                                @if (count($requsition->subrequsitions)>0)
                                @foreach ($requsition->subrequsitions as $subreq)
                                @php
                                $rqs= App\CountryRequsition::where('country_id',$country_id)->where('requsition_id',$subreq->id)->first();
                                $res_test= App\StudentRequsitionDetails::where('student_id',$student->id)->where('requsition_id',$subreq->id)->first();
                                    if(isset($res_test)){
                                        $res_am =$res_test->payable_amount;
                                        $res_re =$res_test->remark;
                                        $res_paid =$res_test->paid;
                                        $res_discount =$res_test->discount;
                                        if($res_am != ''){
                                            if ($res_test->discount != "") {
                                                $dis_price = $res_test->payable_amount - $res_test->discount;
                                                $res_due =$dis_price - $res_test->paid;
                                            }
                                            else {
                                                $res_due = $res_test->payable_amount - $res_test->paid;

                                            }
                                        }else{
                                            $res_due = '';
                                        }
                                    }else{
                                        $res_am = "";
                                        $res_re = "";
                                    }
                                @endphp
                                <tr>
                                    <td height="10" style="text-align: center" colspan="1" width="5%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                                    </td>
                                    <td height="10" style="text-align: left" colspan="1" width="25%; ">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $subreq->name ?? "" }} <input type="hidden" name="requsition_{{ $key }}[]" value="{{ $subreq->id }}"></p>
                                    </td>
                                    <td height="10" style="text-align: right" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $subreq->amount ?? $res_am }}<input type="hidden" value="{{ $subreq->amount ?? $res_am}}" name="payable{{ $subreq->id }}" class="payable{{ $subreq->id }}"></p>
                                    </td>
                                    <td height="10" style="text-align: right" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">{{ $res_paid ?? "" }} <input type="hidden" value="{{ $res_paid ?? ""}}" name="paid{{ $subreq->id }}" class="paid{{ $subreq->id }}"></p>
                                    </td>
                                    <td height="10" style="text-align: right" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><input type="number" readonly value="{{ $res_due ?? ""}}" name="due{{ $subreq->id }}"  class="due{{ $subreq->id }} form-control"></p>
                                    </td>
                                    <td height="10" style="text-align: right" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><input @if($res_due == "") readonly @endif class="form-control" onchange="payment(this)" id="{{ $subreq->id }}" name="received_{{ $key }}[]" value=""></p>
                                    </td>
                                    <td height="10" style="text-align: right" colspan="1" width="10%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><input @if($res_due == "")  readonly @endif id="{{ $subreq->id }}" onchange="receive(this)" class="form-control" name="discount_{{ $key }}[]" value="{{ $res_discount ?? "" }}"></p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="1" width="20%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><input name="remark_{{ $key }}[]" value="" class="form-control"></p>
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
                                    <td height="10" style="text-align: left" colspan="1" width="20%; font-weight: bold;">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">TOTAL</p>
                                    </td>
                                    <td height="10" style="text-align: right" colspan="3" width="25%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;">Tk- {{ $total_cost }}</p>
                                    </td>
                                    <td height="10" style="text-align: center" colspan="3" width="20%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" style="text-align: center" colspan="8" width="5%">
                                        <p style="margin: 0; color: #000; font-size: 12px; font-family: sans-serif; text-transform: capitalize;"><button type="submit" class="btn-block btn btn-sm btn-primary">Add Payment</button></p>
                                    </td>
                                </tr>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        {{-- <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div> --}}
    </form>
</div>

@push('js')
<script>
   function receive(id){
       var payable = $('input[name="payable'+id.id+'"]').val();
       var due = $('input[name="due'+id.id+'"]').val();
       var paid = $('input[name="paid'+id.id+'"]').val();
       var discount = id.value;
       if(discount != ''){
          var price = payable - discount - paid;
          if(price >0){
          $('input[name="due'+id.id+'"]').val(price);
          }else{
              alert('Payable amount cross limit');
          }
       }
   }
   function payment(id){
        var payment = id.value;
        var due = parseInt($('input[name="due'+id.id+'"]').val());
        if(due >= payment){

        }else{
            $(id).val('');
            alert('payable amount cross limit');
        }
   }

</script>
@endpush
@endsection
