@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    Jornal Information
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('gl.entry.all') }}" class="btn btn-brand btn-elevate btn-icon-sm"><i
                                class="fa fa-th"></i>All Jornal Entries</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            @if (Session::has('success'))
                <script type="text/javascript">
                    swal({
                        title: "Success!",
                        text: "New journal Added Successfully.",
                        icon: "success",
                        button: "OK",
                        timer: 5000,
                    });

                </script>
            @endif
            @if (Session::has('error'))
                <script type="text/javascript">
                    swal({
                        title: "Opps!",
                        text: "Error! Please try again",
                        icon: "error",
                        button: "OK",
                        timer: 5000,
                    });

                </script>
            @endif
            <div class="row">
                <div class="col-md 4">
                    <p>Date: <b> {{ $journal->gl_date }}</b></p>
                </div>
                <div class="col-md 4">
                    <p>Referance: <b> {{ $journal->referance }}</b></p>
                </div>
                <div class="col-md 4">
                    <p>Source Referance: <b> {{ $journal->src_referance }}</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md 4">
                    <p>Created By: <b> {{ $journal->creator->name }}</b></p>
                </div>
                @if ( $journal->updator->name )
                <div class="col-md 4">
                    <p>Updated By: <b> {{ $journal->updator->name }}</b></p>
                </div>
                @endif
            </div>

<br><br>
            <table class="table table-striped table-bordered table-hover table-checkable custom_table">
                <thead class="thead-dark">
                    <tr>
                        <th>Account</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $credit = 0;
                        $debit = 0;
                    @endphp
                    @foreach ($journal->journal_items as $item)
                    <tr>
                        <td>{{$item->gl_info->name}}</td>
                        @if ($item->amount > 0)
                        @php
                            $debit += $item->amount;
                        @endphp
                        <td>{{$item->amount}}</td>
                        <td></td>
                        @else
                        @php
                            $credit += $item->amount  * (-1);
                        @endphp
                        <td></td>
                        <td>{{$item->amount * (-1)}}</td>
                        @endif
                        <td>{{$item->memo}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>{{$debit}}</td>
                        <td>{{$credit}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            memo: {!! nl2br($journal->memo)!!}
                        </td>
                    </tr>
                </tfoot>
            </table>

        </div>
        <div class="kt-portlet__foot text-center">

        </div>
    </div>
@endsection
