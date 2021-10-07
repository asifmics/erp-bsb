@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Installment Details</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('all_installment_details')
                    <a href="{{route('all_installment')}}"  class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Installment</a>
                    @endcan
                </div>
            </div>
        </div>

	</div>
	<div class="kt-portlet__body">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-hover table-striped table-bordered custom_view_table">
                  <tr>
                      <td>Employee Name</td>
                      <td>:</td>
                      <td>{{$loan->ban_title}}</td>
                  </tr>
                  <tr>
                      <td>Loan Amount</td>
                      <td>:</td>
                      <td>{{$loan->loan_amount}}</td>
                  </tr>
                  <tr>
                      <td>Loan Paid Amount</td>
                      <td>:</td>
                      <td>{{$loan->ban_btn}}</td>
                  </tr>
                  <tr>
                      <td>Loan Taken Date</td>
                      <td>:</td>
                      <td>{{ \Carbon\Carbon::parse($loan->loan_taken_date)->format('d M Y') }}</td>
                  </tr>
                  <tr>
                      <td>Loan Duration (Year)</td>
                      <td>:</td>
                      <td>{{ $loan->duration }}</td>
                  </tr>
                  <tr>
                      <td>Monthly Installment</td>
                      <td>:</td>
                      <td>{{ $loan->monthly_installment }}</td>
                  </tr>
                  <tr>
                      <td>Given Installment</td>
                      <td>:</td>
                      <td>{{ $loan->given_installment }}</td>
                  </tr>

              </table>
            </div>
            <div class="col-md-2"></div>

        </div>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

@endsection
