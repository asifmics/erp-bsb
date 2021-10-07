@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Attendanc Mangement</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('insert_employee_attendance')
                    <a href="{{route('employee.attendanc')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>New Attendance</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

	<div class="kt-portlet__body">

    <br>
    <form action="{{ route('employee.attendanc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="date" value="{{ $attendanc_date }}">
        <input type="hidden" name="branch_id" value="{{ $branch_id }}">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>Sl.</th>
					<th>Employee ID</th>
					<th>Employee Name</th>
					<th>Status</th>
					<th>In time</th>
					<th>Out time</th>
					{{-- <th>Desgination Name</th> --}}
					<th>Attendanc</th>
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
                        <input type="hidden" name="employee_id[]" value="{{ $item->id }}">
                        @if ($attendanc != '')
                        <input type="text" name="in_time[]" id="kt_timepicker_2" readonly="readonly" value="{{ $attendanc->in_time ? : 0 }}" class="form-control">
                        @else
                        <input type="text" name="in_time[]" id="kt_timepicker_1" readonly="readonly" value="{{ $item->shift->start ? : 'Not Abailable' }}" class="form-control">
                        @endif
                    </td>
					<td>
                        @if ($attendanc != '')
                        <input type="text" name="out_time[]" id="kt_timepicker_2" readonly="readonly" value="{{ $attendanc->out_time ? : 0 }}" class="form-control">
                        @else
                        <input type="text" name="out_time[]" id="kt_timepicker_1" readonly="readonly" value="{{ $item->shift->end ? : 'Not Abailable' }}" class="form-control">
                        @endif
                    </td>


					<td>
                        @if ($attendanc != '')
                        @if ($attendanc->attendanc == 'Present')
                        <a href="{{ route('employee.absent', $attendanc->id) }}"  class="ml-5 btn btn-danger">Absent</a>
                        @else
                        <a href="{{ route('employee.absent', $attendanc->id) }}"  class="ml-5 btn btn-primary">Present</a>
                        @endif
                        @else
                        <div class="alert" role="alert">
                           No Attendance
                        </div>
                        @endif
					</td>
                </tr>

                @endforeach
{{-- <tr>
    <td colspan="8"><button type="submit" class="btn btn-primary btm-sm float-right">All Present</button></td>
</tr> --}}
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary" style="margin-left: 40%; width:30%">All Present</button>
        </form>
    </div>

  <div class="kt-portlet__foot">
    ...
	</div>
</div>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    $(document).ready(function(){
        $('input[name="attendanc"]').on('change',function(){
            var check = $(this).prop('checked');
            if(check == true){
                $('.present').removeClass('d-none')
                $('.Absent').addClass('d-none')
            }else if(check == false){
                $('.present').addClass('d-none')
                $('.Absent').removeClass('d-none')
                $('input[name="in_time"]').val('');
                $('input[name="out_time"]').val('');
                $('input[name="leave"]').on('change',function(){
                    var lcheck = $(this).prop('checked');
                    if(lcheck== true){
                        $('.paid_leave').removeClass('d-none');
                    }else{
                        $('.paid_leave').addClass('d-none');
                    }
                })
            }
        })
        console.log(attendanc);

    })
    $('#Attendanc').click(function(e){
       var check = $('input[name="attendanc"]').prop('checked');
        if(check == true){
            var attendanc = 'Present';
            var in_time =$('input[name="in_time"]').val();
            var out_time =$('input[name="out_time"]').val();
        }else{
            var attendanc = 'Absent';
            var leave_check = $('input[name="leave"]').prop('checked');
            if(leave_check == true){
                var leave = 'Paid';
                var type = $('select[name="type"]').val();
            }else{
                var leave = 'unpaid';
            }

        }

        var employee_id =$('#modal_id').val();
        var branch_id =$('#branch_id').val();
        var date =$('input[name="attendanc_date"]').val();
        e.preventDefault();
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            url: '{{ route('employee.attendanc.store') }}',
            method: "POST",
            data:{in_time:in_time,out_time:out_time,leave:leave,attendanc:attendanc,type:type,employee_id:employee_id,branch_id:branch_id,date:date},
            success: function(data){
        console.log(data);

                }
        })

    })
    console.log(attendanc);
    var leave = $('input[name="leave"]').val();
    var inTime = $('input[name="in_time"]').val();
    var outTime = $('input[name="out_time"]').val();
    $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            url: '{{ route('employee.attendanc.store') }}',
            method: "POST",
            data:{id:id, permission:permission, check:check},
            success: function(data){
console.log(data);
                // const Toast = Swal.mixin({
                //     toast: true,
                //     position: 'top-end',
                //     showConfirmButton: false,
                //     timer: 3000
                // })
                // if($.isEmptyObject(data.error)){
                //     Toast.fire({
                //         icon: 'success',
                //         title: data.success
                //     })
                //     getValues()
                // }else{
                //     Toast.fire({
                //         icon: 'error',
                //         title: data.error
                //     })
                // }
                }
        })
</script>
<script src="{{asset('contents/admin')}}/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js?v=7.1.1"></script>
@endpush

