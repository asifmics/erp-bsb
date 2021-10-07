<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Loan Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr class="bg-dark text-light">
                            <td>Loan Amount</td>
                            <td>Loan Paid Amount</td>
                            <td>Loan Taken Date</td>
                            <td>Loan Duration (Year)</td>
                            <td>Monthly Installment</td>
                            <td>Given Installment</td>
                            {{-- <td>Action</td> --}}
                        </tr>
                        @if (count($employee->loans) > 0)

                        @foreach ($employee->loans as $item)
                        <tr>
                            <td>{{ $item->loan_amount }}</td>
                            <td>{{ $item->paid_amount }}</td>
                            <td>{{ $item->loan_taken_date }}</td>
                            <td>{{ $item->duration }} year</td>
                            <td>{{ $item->monthly_installment }}</td>
                            <td>{{ $item->given_installment }}</td>
                            {{-- <td>
                                <a href="{{route('edit_training', $training->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="{{route('delete_training', $training->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
                            </td> --}}
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="6"><p class="text-center">No Loan available here</p></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Installment Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr class="bg-dark text-light">
                            <td>Loan Amount</td>
                            <td>Installment Amount</td>
                            <td>Payment Date</td>
                            <td>Received By</td>
                        </tr>
                        @if (count($employee->loans) > 0)

                        @foreach ($employee->loans as $item)
                        @if (count($item->installments) > 0)
                        @foreach ($item->installments as $install)
                        <tr>
                            <td>{{ $item->loan_amount }}</td>
                            <td>{{ $install->installment_amount }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->payment_date)->format('d M Y') }}</td>
                            <td>{{ $item->received_by }}</td>
                        </tr>
                        @endforeach
                        @endif
                        @endforeach
                        @else
                        <tr><td colspan="6"><p class="text-center">No Installment available here</p></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>



