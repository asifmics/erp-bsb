@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{ route('gl.entry.update') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                    @if (Request::is('dashboard/accounts/gl/entry'))
                    Add New Jornal Entry Information
                    @else
                    Edit Jornal Entry Information
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{$journal->id}}">
                    @endif
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('gl.entry.all') }}"
                            class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Jornal Entries</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New journal Added Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('gl_date') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="gl_date" id="kt_datepicker_1" value="{{old('gl_date') ?? $journal->gl_date ?? ''}}">
                            @if ($errors->has('gl_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gl_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('referance') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Referance:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="referance" value="{{old('referance') ?? $journal->referance ?? ''}}">
                            @if ($errors->has('referance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('referance') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row custom_row{{ $errors->has('src_referance') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Source Ref:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="src_referance" value="{{old('src_referance') ?? $journal->src_referance ?? ''}}">
                            @if ($errors->has('src_referance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('src_referance') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> <br><br> <h4>Jornal Entry Items</h4> <br> </div>
            </div>
            <div class="row">
                <div class="col-md 12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        @php
                        $gl_accounts = App\GlAccount::where('status',1)->get();
                         @endphp
                        <tbody>
                            @if (Request::is('dashboard/accounts/gl/entry'))
                            <tr>
                                <td class="account_code">
                                    <select name="account[]" class='form-control kt_select2'>
                                        @foreach ($gl_accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control debit" name="debit[]"></td>
                                <td><input type="text" class="form-control credit" name="credit[]"></td>
                                <td><input type="text" class="form-control" name="desc[]"></td>
                                <td><button type="button" id="" class="btn btn-sm btn-warning AddItem">Add Item</button></td>
                            </tr>
                            @else
                            @foreach ($journal->journal_items as $item)
                            <tr>
                                <td class="account_code">
                                    <select name="account[]" id="" class='form-control'>
                                        @foreach ($gl_accounts as $account)
                                        <option value="{{ $account->id }}" @if ($item->gl_id == $account->id)
                                            selected
                                        @endif>{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control debit" value="{{ ($item->amount > 0 ? $item->amount : '') }}" name="debit[]"><input type="hidden" name="id[]" value="{{ $item->id }}"></td>
                                <td><input type="text" class="form-control credit" value="{{ ($item->amount < 0 ? ($item->amount * (-1)) : '') }}" name="credit[]"></td>
                                <td><input type="text" class="form-control" value="{{ $item->memo }}" name="desc[]"></td>
                                <td><button type="button" id="" class="btn btn-sm btn-warning AddItem">Add Item</button></td>
                            </tr>
                            @endforeach

                            @endif



                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td>Total Debit <input type="text" readonly class="form-control" name="totalldebit"></td>
                                <td>Total Credit <input type="text" readonly class="form-control" name="totallcredit"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <textarea name="memo" class="form-control" id="" cols="30" rows="10" placeholder="Memo">{{old('memo') ?? $journal->memo ?? ''}}</textarea>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand save">SAVE</button>
        </div>
    </form>
</div>
@endsection
@push('js')
<script>

    var i =1;
    $('.AddItem').on('click',function(){
        var account = $('.account_code').html();
    var last = i++;
        var html =   '<tr class="additeamnew'+last+'">'+
                        '<td>'+account+'</td>'+
                        '<td><input type="text" class="form-control debit" name="debit[]"></td>'+
                        '<td><input type="text" class="form-control credit" name="credit[]"></td>'+
                        '<td><input type="text" class="form-control" name="desc[]"></td>'+
                        '<td><button type="button" class="btn btn-sm btn-danger remove_item" data-id="'+last+'">Remove Item</button></td>'+
                    '</tr>';
    $('table tbody').append(html);
    $(document).on('click','.remove_item',function(){
            var id = $(this).data('id');
            $('.additeamnew'+id+'').remove();
            var sum = 0;
            $(".debit").each(function(){
                sum += +$(this).val();
            });
            $('input[name="totalldebit"]').val(sum);
            var sum = 0;
            $(".credit").each(function(){
                sum += +$(this).val();
            });
            $('input[name="totallcredit"]').val(sum);
            });
    })

    $(document).on("blur", ".debit", function() {
        var sum = 0;
        $(".debit").each(function(){
            sum += +$(this).val();
        });
        $('input[name="totalldebit"]').val(sum);
    });
    $(document).on("blur", ".credit", function() {
        var sum = 0;
        $(".credit").each(function(){
            sum += +$(this).val();
        });
        $('input[name="totallcredit"]').val(sum);
    });
    var sum = 0;
    $(".debit").each(function(){
        sum += +$(this).val();
    });
    $('input[name="totalldebit"]').val(sum);
    var sum = 0;
    $(".credit").each(function(){
        sum += +$(this).val();
    });
    $('input[name="totallcredit"]').val(sum);

    $(document).on("submit", ".kt-form", function() {
        let debit = $('input[name="totalldebit"]').val();
        let credit = $('input[name="totallcredit"]').val();
        if(debit != credit || debit == 0){
            alert('Please make the debit and credit amount equal.');
            return false
        }
    })
    </script>
@endpush
