@extends('layouts.admin')
@section('content')
@section('title' , '| Employee Loan Report List');
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Active Employee Loan Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{route('loan_report')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>New Search</a>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="example">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>Employee Name</th>
					<th>Loan Amount</th>
					<th>Paid Amount</th>
					<th>Loan Taken Date</th>
					<th>Duration</th>
					<th>Monthly Installment</th>
					<th>Given Installment</th>


				</tr>
			</thead>
			<tbody>
                @php
                    $i = 1;
                @endphp

                @forelse ($loans as $item)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->loan_amount }}</td>
					<td>{{ $item->paid_amount}}</td>
					<td>{{ \Carbon\Carbon::parse($item->loan_taken_date)->format('d M Y') }}</td>
					<td>{{ $item->duration.'  Year'}}</td>
					<td>{{ $item->monthly_installment}}</td>
					<td>{{ $item->given_installment}}</td>

				</tr>

				@empty
					<tr>
						<td colspan="7" class="text-center">No employees loan found</td>
					</tr>
				@endforelse

			</tbody>
		</table>
	</div>

</div>
@endsection
@push('js')
<script src="{{ asset('contents/admin/assets/js/pages/crud/datatables/extensions/buttons.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv',
            {
            extend: 'excel',
            text: 'Excel',
            titleAttr: 'EXCEL',
            title:  'BSB Global Network Employee Loan Report List'
            },
            {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            titleAttr: 'PDF',
            customize: function (doc) {

                doc.styles.tableHeader.color = 'black';
                doc.content[1].table.body[0].forEach(function (h) {
                h.fillColor = 'white';

            });
            alignment: 'center'
},
            title: 'BSB Global Network Employee Loan Report List'
            },

            'print'
        ]
    } );
} );
</script>
@endpush
