@extends('layouts.admin')
@push('css')
    <style type="text/css">
        .custom_table thead tr th,
        .custom_table tbody tr td {
            /* white-space: nowrap !important;*/
            padding: 10px;
            vertical-align: middle;
        }
    </style>
@endpush()
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">All Active Employee Details</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="{{ route('report_active_employees__details_excel') }}"
                           class="btn btn-success btn-elevate btn-icon-sm"><i class="fa fa-file-excel"></i>Excel</a>
                        <a href="{{route('report_active_employees__details_pdf')}}"
                           class="btn btn-youtube btn-elevate btn-icon-sm"><i class="fa fa-file-pdf"></i>PDF</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="example">
                <thead class="thead-dark">
                <tr>
                    <th>SL</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Joining Date</th>
                    <th>Mobile No</th>
                    <th>Gross Salary</th>
                    <th>Branch</th>
                    <th>NID</th>
                    <th>TIN</th>
                    <th>DOB</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{  $loop->iteration }}</td>
                        <td>{{ $employee->id_no }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->designation->name ?? '---' }}</td>
                        <td>{{ $employee->department_details->name ?? '---' }}</td>
                        <td>{{ $employee->joining_date ?? '---' }}</td>
                        <td>{{ $employee->phone ?? '---' }}</td>
                        <td>{{ $employee->salary_scale_details->amount ?? '---' }}</td>
                        <td>{{ $employee->branch_details->name ?? '---' }}</td>
                        <td>{{ $employee->nid ?? '---' }}</td>
                        <td>{{ $employee->tin ?? '---' }}</td>
                        <td>{{ $employee->dob ?? '---' }}</td>
                        <td>{{ $employee->gender ?? '---' }}</td>
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

@endpush
