@extends('layouts.admin')
@section('content')
@push('css')
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Day Wish Attendanc Mangement</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <a href="{{route('employee.daywishattendanc')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>New DayWishAttendance</a>
                </div>
            </div>
        </div>
    </div>

	<div class="kt-portlet__body">

    <br>

		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="example">
			<thead class="thead-dark">
				<tr>
					<th>Sl.</th>
					<th>Employee ID</th>
					<th>Employee Name</th>
					<th>Status</th>
					<th>In time</th>
					<th>Out time</th>
					{{-- <th>Desgination Name</th> --}}

				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
                @foreach ($employees as $item)
                @php
                    $attendanc = App\EmployeeAttendance::where('date',$attendanc_date)->where('employee_id',$item->id)->first();
                @endphp
				<tr>
					<td><div class="alert">{{ $i++ }}</div></td>
					<td><div class="alert">{{ $item->id_no }}</div></td>
                    <td><div class="alert">{{ $item->name }}</div></td>
                    <td>
                        @if ($attendanc != '')
                        @if($attendanc->attendanc == 'Present')
                        <div class="btn btn-success text-light">Present </div>
                        @elseif($attendanc->attendanc == 'Absent')
                        <div class="btn btn-warning text-light">Absent </div>
                        @endif
                        @else
                        <div class="alert ">Not Attendanc</div>
                        @endif
                    </td>
					<td>
                        @if ($attendanc != '')
                        {{ $attendanc->in_time ? : 'Not Abailable' }}
                        @else
                        <div class="alert ">Not Abailable</div>
                        @endif
                    </td>
					<td>
                        @if ($attendanc != '')
                        {{ $attendanc->out_time ? : 'Not Abailable' }}
                        @else
                        <div class="alert ">Not Abailable</div>
                        @endif
                    </td>
                </tr>
                @endforeach
			</tbody>
		</table>
	</div>
  <div class="kt-portlet__foot">
    ...
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
            title:  'BSB Global Network Day wish attendance Liste'
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
            title: 'BSB Global Network Day wish attendance Liste'
            },

            'print'
        ]
    } );
} );
</script>
@endpush

