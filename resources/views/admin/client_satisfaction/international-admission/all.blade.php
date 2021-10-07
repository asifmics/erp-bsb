@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">All Student Application For File Section </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href='{{ url("dashboard/international/admission/create") }}'
                           class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add
                            International Student Admission</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable custom_table"
                   id="alltableinfo">
                <thead class="thead-dark">
                <tr>
                    <th>SL</th>
                    <th>F.O.DATE</th>
                    <th>STU Id</th>
                    <th>STUDENT NAME</th>
                    <th>COUNTRY</th>
                    <th>INSTITUTION</th>
                    <th>COUNSELOR</th>
                    <th>EXPENSE PARTICULARS</th>
                    <th>EXPENSE AMOUNT</th>
                    <th>PAYMENT METHOD</th>
                    <th>CARD HOLDER</th>
                    <th>STATUS</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>

                @forelse ( $interAdmissions as $item)
                    <tr>
                        <td>{{ $loop->iteration ?? '' }}</td>
                        <td>{{ $item->f_o_date ?? ''}}</td>
                        <td>{{ $item->student->id_no ?? '' }}</td>
                        <td>{{ $item->student->name ?? '' }}</td>
                        <td>{{ $item->student->country->name ?? '' }}</td>
                        <td>{{ $item->student->interestcountryActiveStatus[0]->university->name ?? '' }}</td>
                        <td>{{ $item->student->counsellorganerate->name ?? '' }}</td>
                        <td>{{ $item->ex_particulars }}</td>
                        <td>{{ $item->ex_amount }}</td>
                        <td>
                            @if ( ($item->pay_method) == 1)
                                <span class="text-primary" style="font-weight: 600">CARD</span>
                            @elseif( $item->pay_method == 2)
                                <span class="text-danger" style="font-weight: 600">BANK</span>
                            @elseif( $item->pay_method == 3)
                                <span class="text-danger" style="font-weight: 600">CHECk</span>
                            @elseif( $item->pay_method == 4)
                                <span class="text-danger" style="font-weight: 600">MASTER CARD</span>
                            @elseif( $item->pay_method == 5)
                                <span class="text-danger" style="font-weight: 600">CREDIT CARD</span>
                            @elseif( $item->pay_method == 6)
                                <span class="text-danger" style="font-weight: 600">VISA CARD</span>
                            @else
                                <span class="text-danger" style="font-weight: 600"></span>

                            @endif
                        </td>
                        <td>{{ $item->card_holder ?? '' }}</td>

                        <td>@if ( $item->status == 1)
                                <span class="text-success" style="font-weight: 600">Active</span>
                            @else
                                <span class="text-danger" style="font-weight: 600">Inactive</span>
                            @endif
                        </td>
                        <td>

                            <a href='{{ url("dashboard/international/admission/$item->slug/edit") }}' class="text-info"
                               title="edit"><i class="fa fa-pen-square fa-2x"></i></a>

                            <a href="#" x id="softDelete" class="text-danger manage_btn_icon" title="delete"
                               data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No Loan found</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
        <div class="kt-portlet__foot">
            <a href="{{ route('international_excel_download') }}" class="btn btn-info btn-sm">Excel</a>
            <a href="{{ route('international_pdf_download') }}" class="btn btn-warning btn-sm">PDF</a>
        </div>
        <div class="kt-portlet__foot">
            ...
        </div>
    </div>

    <!--delete modal code start-->
    <div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action=''>
                @csrf
                @method('delete')

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
