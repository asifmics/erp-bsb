@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Active Employee</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				{{-- <div class="kt-portlet__head-actions">
                    @can('insert_employee')
					<a href="{{route('add_employee')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Employee</a>
                    @endcan
				</div> --}}
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="example">
			<thead class="thead-dark">
				<tr>
					<th>Employee ID</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Designation</th>
					<th>Department</th>
					<th>Joinig Date</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($employees as $employee)
				<tr>
					<td>{{ $employee->id_no }}</td>
					<td>{{ $employee->name }}</td>
					<td>{{ $employee->phone ?? '---' }}</td>
					<td>{{ $employee->designation->name ?? '---' }}</td>
					<td>{{ $employee->department_details->name ?? '---' }}</td>
					<td>{{ $employee->joining_date ?? '---' }}</td>
				</tr>
				@empty
					<tr>
						<td colspan="7">No employees found</td>
					</tr>
				@endforelse

			</tbody>
		</table>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="{{route('softdelete_employee')}}">
					@csrf

	        <div class="modal-content">
	            <div class="modal-header alert_modal_header">
	                <h5 class="modal-title"><i class="fab fa-gg-circle"></i> Confirm Message</h5>
	            </div>
	            <div class="modal-body alert_modal_body">
									Are you sure you want to delete?
									<input type="hidden" id="modal_id" name="modal_id">
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
									<button type="button" class="btn btn-sm btn-brand" data-dismiss="modal">Close</button>
	            </div>
	        </div>
				</form>
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
            title:  'BSB Global Network Employee Report List'
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
            title: 'BSB Global Network Employee Report List'
            },

            'print'
        ]
    } );
} );
</script>
@endpush
