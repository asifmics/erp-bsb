<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Visa Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_visa') }}" method="POST" enctype="multipart/form-data">
                    @if (Request::is("dashboard/student/details/$student->slug/visa"))
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Add New Visa</h3>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Edit Visa Information</h3>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="slug" value="{{ $academic->slug }}"> --}}
                        <input type="hidden" name="id" value="{{ $visa->id }}">
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('place') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Place Of Issue:</label>
                        <div class="col-md-7">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="text" placeholder="Place Of Issue" class="form-control" name="place"
                                value="{{ old('place') ?? ($visa->place ?? '') }}">
                            @if ($errors->has('place'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Issue Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="issue_date" value="{{ old('issue_date') ?? ($visa->issue_date ?? '') }}" id="kt_datepicker_3" >
                            @if ($errors->has('issue_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('issue_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('expire_date') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date Of Expired:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="expire_date" value="{{ old('expire_date') ?? ($visa->expire_date ?? '') }}" id="kt_datepicker_3" >

                            @if ($errors->has('expire_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('expire_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('duration') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Duration (Days):</label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Duration Of Each Stay" class="form-control" name="duration"
                                value="{{ old('duration') ?? ($visa->duration ?? '') }}">
                            @if ($errors->has('duration'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('duration') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('passport_number') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Passport Number:</label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Enter passport number" class="form-control" name="passport_number"
                                value="{{ old('passport_number') ?? ($visa->passport_number ?? '') }}">
                            @if ($errors->has('passport_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('dob') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Date Of Birth:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" readonly="readonly" name="dob" value="{{ old('dob') ?? ($visa->dob ?? '') }}" id="kt_datepicker_3" >

                            @if ($errors->has('dob'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="kt-portlet__foot text-center">
                        @if (Request::is("dashboard/student/details/$student->slug/visa"))
                            <button type="submit" class="btn btn-md btn-brand">Save</button>
                        @else
                            <button type="submit" class="btn btn-md btn-brand">Update</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@php
$visas = $student->visas;
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr class="bg-dark text-light">
                                <td>Place</td>
                                <td>Date Of Issue</td>
                                <td>Expire Date</td>
                                <td>Duration</td>
                                <td>Passport Num</td>
                                <td>Date Of Birth</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($visas as $visa)
                                <tr>
                                    <td>{{ $visa->place }}</td>
                                    <td>{{\Carbon\Carbon::parse($visa->issue_date)->format('d M Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($visa->expire_date)->format('d M Y')}}</td>
                                    <td>{{ $visa->duration }}</td>
                                    <td>{{ $visa->passport_number }}</td>
                                    <td>{{\Carbon\Carbon::parse($visa->dob)->format('d M Y')}}</td>
                                    <td>
                                        <a href="{{route('edit_visa', $visa->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{route('delete_visa', $visa->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
