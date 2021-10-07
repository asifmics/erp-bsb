                                <!--begin:: Widgets/Trends-->
                                <style>
                                    .kt-portlet__head-title{
                                        margin-left: 10px;
                                        margin-bottom: 10px;
                                    }
                                </style>
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Requsitions Slip
                                        </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">

                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                                         <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                            <form method="post" action="{{ route('save_requsition_details') }}">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $student->id }}">

                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr class="bg-dark text-light">
                                                            <td>SN</td>
                                                            <td>Particulars</td>
                                                            <td>Account Payable</td>
                                                            <td>Fixed Amount</td>
                                                            <td>Paid</td>
                                                            <td>Remarks</td>
                                                        </tr>
                                                        @php
                                                            $i =1;
                                                            $requsitions =App\StudentRequsition::where('status',1)->Where('country_id',$student->country->id)->orWhere('country_id',null)->get();

                                                            @endphp
                                                        @if ( count($student->requsition) != 0)
                                                        {{-- @foreach ($requsitions as $item) --}}
                                                        @foreach ($student->requsition as $rq)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ $rq->item->name }}</td>
                                                                <td><input type="text" disabled value="{{ $rq->item->payable_amount }}" class="form-control"> </td>
                                                                <input type="hidden" name="requsition_id[]" value="{{ $rq->item->id }}">
                                                                <td><input type="text" disabled class="form-control" value="{{ old('payable_amount') ?? $rq->payable_amount ?? '' }}" name="payable_amount[]"></td>
                                                                <td><input type="text" class="form-control" value="{{ old('paid') ?? $rq->paid ?? ''   }}" name="paid[]" disabled></td>
                                                                <td><input type="text" class="form-control" value="{{ old('remark') ?? $rq->remark ?? '' }}" name="remark[]"></td>
                                                            </tr>
                                                        @endforeach
                                                        {{-- @endforeach --}}
                                                        @else
                                                        @foreach ($requsitions as $item)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->payable_amount }}</td>
                                                            <input type="hidden" name="requsition_id[]" value="{{ $item->id }}">
                                                            <td><input type="text" class="form-control" value="" name="payable_amount[]"></td>
                                                            <td><input type="text" class="form-control" value="" name="paid[]" disabled></td>
                                                            <td><input type="text" class="form-control" value="" name="remark[]"></td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-primary btn-sm offset-5">Add Account Payable</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h3 class="kt-portlet__head-title">
                                        Money Receipt List
                                    </h3>
                                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                                        <div class="row">
                                           <div class="col-md-12 col-lg-12">
                                           <form method="post" action="{{ route('save_requsition_details') }}">
                                               @csrf
                                               <input type="hidden" name="student_id" value="{{ $student->id }}">

                                               <table class="table table-striped table-bordered" style="width: 615px; margin:auto;">
                                                  <thead>
                                                    <tr class="bg-dark text-light">
                                                        <th style="width: 25%">SN</th>
                                                        <th style="width: 25%">Date</th>
                                                        <th style="width: 25%">Amount</th>
                                                        <th style="width: 25%">Action</th>
                                                     </tr>
                                                  </thead>
                                                    <tbody>
                                                        @php
                                                           $i =1;
                                                           $money_receipts =App\StudentMoneyReceipt::where('status',1)->get();
                                                       @endphp
                                                       @if(count($student->monyreceipt) > 0)
                                                           @foreach ($student->monyreceipt as $item)
                                                           @php
                                                               // $date = Carbon\Carbon::createFromFormat('Y-M-D', $item->date);
                                                               $date =  date('d M Y', strtotime($item->date))
                                                           @endphp
                                                           <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{  $date}}</td>
                                                                <td>{{ $item->amount }}</td>
                                                                <td style="display: flex"><a href="{{ route('download_money_receipt',$item->id) }}" class="btn btn-sm btn-primary">Download</a><a href="{{ route('pdf_money_receipt',$item->id) }}" class="btn btn-sm btn-info ml-3">PDF</a></td>
                                                           </tr>
                                                           @endforeach

                                                       @else
                                                       <tr><td colspan="4" ><p class="text-center">No Money Receipt available here </p></td></tr>
                                                       @endif
                                                   </tbody>
                                               </table>
                                           </form>
                                           </div>
                                       </div>
                                   </div>
                                    <br><br>
                                    <h3 class="kt-portlet__head-title">
                                        Payment Details
                                    </h3>
                                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                                         <div class="row">
                                            <div class="col-md-12 col-lg-12 m-auto" >
                                            <form method="post" action="{{ route('save_money_receipt') }}">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                <div class="maindocument">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                                            <div class="item form-group">
                                                                @php
                                                                    $requsitions = $student->requsition->where('payable_amount' ,'!=', 0);
                                                                @endphp
                                                                <label for="type_id">Requsitions</label>
                                                                {{-- <input type="text" class="form-control" name="requsition_id[]" placeholder="Enter Rqusition Name"> --}}
                                                                <div class="requsition_field">
                                                                    <select name="requsition_id[]" onchange="requsition(this)" class="form-control requsition">
                                                                        @foreach ($requsitions as $rq)
                                                                            {{-- @if ($rq->parent_id = Null AND count($rq->mainrequsition) >0) --}}
                                                                                <option data-id="{{ $rq->payable_amount - $rq->paid }}" value="{{ $rq->item->id }}">{{ $rq->item->name }}</option>
                                                                        {{-- @endif --}}
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-6">
                                                            <div class="item form-group">
                                                                <label for="class_id">Due<span class="required"></span>
                                                                </label>
                                                                <input type="text" class="form-control" name="due[]" placeholder="Due " disabled>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                                            <div class="item form-group" >
                                                                <label for="group_id">Remark</label>
                                                                <input type="text" class="form-control" name="remark[]" placeholder="Remark">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                                            <div class="item form-group" >
                                                                <label for="group_id">Payment</label>
                                                                <div class="btn_ok" style="display:flex">
                                                                    <input type="text" class="form-control" name="payment[]" placeholder="Payment">
                                                                    <button type="button" id="Adddocument" class="btn btn-dark btn-sm adddocument" style="margin-left:10px">+</button>
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="copydocument">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm offset-5">Payment</button>

                                            </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end:: Widgets/Trends-->
                                @push('js')
                                <script>
                                    var i =1;
                                    $('#Adddocument').on('click',function(){
                                        var account = $('.requsition_field').html();
                                    var last = i++;
                                        var html = '<div class="maindocument'+last+'">'+
                                                               '<div class="row">'+
                                                                    '<div class="col-md-3 col-sm-3 col-xs-6">'+
                                                                        '<div class="item form-group">'+
                                                                           ' <label for="type_id"></label>'+
                                                                            account+
                                                                            '<div class="help-block"></div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-2 col-sm-2 col-xs-12">'+
                                                                        '<div class="item form-group">'+
                                                                            '<label for="class_id"><span class="required"></span>'+
                                                                           '</label>'+
                                                                           '<input type="text" class="form-control" name="due[]" disabled required placeholder="Enter Due">'+
                                                                            '<div class="help-block"></div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-4 col-sm-4 col-xs-6">'+
                                                                    '<div class="item form-group" >'+
                                                                '<label for="group_id">Remark</label>'+
                                                                '<input type="text" class="form-control" name="remark[]" placeholder=" Remark">'+
                                                                '<div class="help-block"></div></div></div>'+
                                                                    '<div class="col-md-3 col-sm-3 col-xs-6">'+
                                                                        '<div class="item form-group" style="display:flex">'+
                                                                            '<label for="group_id"></label>'+
                                                                            '<input type="texts" class="form-control mt-4" name="payment[]" required placeholder="payment">'+
                                                                            '<button class=" btn btn-danger removedocument btn-sm mt-4 ml-2" data-id="'+last+'">X</button>'+
                                                                            '<div class="help-block"></div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>';
                                        $('#copydocument').append(html);
                                        $(document).on('click','.removedocument',function(){
                                            var id = $(this).data('id');
                                            $('.maindocument'+id+'').remove();
                                        })
                                    })
                                     function requsition(id){
                                         var check =$(id).find(':selected').data('id');
                                         $('input[name="due[]"]').val(check);
                                    };
                                    </script>
                                @endpush
