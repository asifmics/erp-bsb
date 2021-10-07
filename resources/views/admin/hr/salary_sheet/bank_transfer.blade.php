@extends('layouts.admin')
@section('content')
@section('title' , '| Employee Report List');
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Bank Transfer Sheet</h3>
		</div>
		{{-- <div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{route('employee_report')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>New Search</a>
				</div>
			</div>
		</div> --}}
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="example">
			<thead class="thead-dark">
				<tr>
					<th>SL</th>
					<th>EMP CODE</th>
					<th>Name Of the Account Holder</th>
					<th>Account No</th>
					<th>Amount (Taka)</th>

				</tr>
			</thead>
			<tbody>
                @php
                    $i = 1;
                @endphp
				@forelse ($employees as $employee)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $employee->id_no }}</td>
					<td>{{ $employee->name }}</td>
					<td>{{ $employee->account_no}}</td>
					<td>{{ $employee->salary_scale_details->amount}}</td>

				</tr>
				@empty
					<tr>
						<td colspan="7" class="text-center">No employees found</td>
					</tr>
				@endforelse

			</tbody>
		</table>
	</div>
  {{-- <div class="kt-portlet__foot">
        <a href="#" class="btn btn-info waves-effect">PRINT</a>
        <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
        <a href="#" class="btn btn-success waves-effect">PDF</a>
	</div> --}}
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
            title:  'BSB Global Network Bank Transfer Sheet'
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
            title: 'BSB Global Network Bank Transfer Sheet'
            },
            'print'
            ]
    } );
} );
</script>
@endpush
