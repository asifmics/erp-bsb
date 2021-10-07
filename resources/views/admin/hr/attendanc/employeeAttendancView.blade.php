@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="{{route('employee.wishattendanc')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>New Attendance Management</a>
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
					<th>Date</th>
					<th>Status</th>
					<th>In time</th>
					<th>Out time</th>
					<th>Working Time</th>
					<th>Leave Type</th>
					{{-- <th>Desgination Name</th> --}}

				</tr>
			</thead>
			<tbody>
                @php
                    $i =1;
                @endphp
                @foreach ($employees as $item)

				<tr>
					<td><div class="alert">{{ $i++ }}</div></td>
                    <td><div class="alert">{{ $item->date ? : 'No avaibale'}}</div></td>
                    <td>
                        @if($item->attendanc == 'Present')
                        <div class="btn btn-success text-light">Present </div>
                        @elseif($item->attendanc == 'Absent')
                        <div class="btn btn-warning text-light">Absent </div>
                        @endif

                    </td>
					<td>

                        {{ $item->in_time ? : 'Not Abailable' }}

                    </td>
					<td>

                        {{ $item->out_time ? : 'Not Abailable' }}

                    </td>
                    <td>
                        @php
                            $start = Carbon\Carbon::parse($item->in_time);
                            $end = Carbon\Carbon::parse($item->out_time);
                            $duration = $end->diffInHours($start);
                        @endphp
                        {{ $duration }}
                    </td>
                    <td>
                        {{ $item->type ? : 'No Type'}}
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
<script>

$('select[name="branch_id"]').on('change',function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
            if(id != '')
            {
                var id =$(this).val();
                $.ajax({
                    url: '{{ route('employee.getAjax') }}',
                    method: "POST",
                    data: {id:id},
                    dataType: "JSON",
                    success:function(data){
                        if(data != ''){
                        var d =$('select[name="employee_id"]').empty();
                        var html ='';
                        html +='<option label="Select Employee"></option>';
                        $.each(data, function(key, emp){
                            html += '<option value="'+ emp.id +'">' + emp.name + '</option>'
                            })
                            $('select[name="employee_id"]').html(html);
                        }else{
                            var d =$('select[name="employee_id"]').empty();
                        }
                 }
                })
            }

        })




</script>
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
            orientation: 'por',
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

