@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{ url("dashboard/international/agent/") }}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">

                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href='{{ url("dashboard/international/agent") }}'
                        class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All International Agent</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Country Name:</label>
                <div class="col-md-7">

                    <select class="form-control" id="countryId"  name="country_id" required>
                        <option value="">Select Country</option>
                        @foreach ( $countries as $country)
                        <option value="{{ $country->id }}" >{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('branch_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('branch_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div id="institutionRow" class="form-group row ">
                <label class="col-md-3 col-form-label">Institution Name:</label>
                <div class="col-md-7">

                    <select id="inst_select_div" class="form-control" name="university_id" required>

                    </select>
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Certificate Category:</label>
                <div class="col-md-7">

                <select class="form-control" name="certification_id" >
                    <option value="">Select Certificate</option>
                    @foreach ( $certificates as $certificate)
                    <option value="{{ $certificate->id }}" >{{ $certificate->name }}</option>
                    @endforeach

                </select>
                    @if ($errors->has('certification_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('certification_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Agent Type:</label>
                <div class="col-md-7">

                    <select class="form-control" name="type" >
                        <option value="">Select Agent Type</option>
                            <option value="1" >Direct</option>
                            <option value="2" >Indirect</option>

                    </select>
                    @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Commission &nbsp <i class="fa fa-percent"></i></label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="commission" value="{{ old('commission') }}" id="">

                    @if ($errors->has('commission'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('commission') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Valid Form:</label>
                <div class="col-md-7">
                    <div class="input-group date">
                        <input type="text" class="form-control" readonly="readonly" name="valid_form" value="{{ old('valid_form') ?? Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">
                        <div class="input-group-append">	<span class="input-group-text">
                        <i class="la la-calendar"></i>
                        </span>
                        </div>
                    </div>
                    @if ($errors->has('valid_form'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('valid_form') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Valid To:</label>
                <div class="col-md-7">
                    <div class="input-group date valid_to">
                        <input type="text" class="form-control" readonly="readonly" name="valid_to" value="{{ old('valid_to') ??  Carbon\Carbon::now()->format('d/m/Y')}}" id="kt_datepicker_3">
                        <div class="input-group-append">	<span class="input-group-text">
                        <i class="la la-calendar"></i>
                        </span>
                        </div>
                    </div>
                    @if ($errors->has('valid_to'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('valid_to') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Contact Details:</label>
                <div class="col-md-7">
                    <div class="input-group date received_by">
                        <textarea style="height: 200px" type="text" class="form-control" name="contact_details"></textarea>
                    </div>
                    @if ($errors->has('contact_details'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contact_details') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Remarks :</label>
                <div class="col-md-7">
                    <div class="input-group date remark">
                        <textarea style="height: 200px" type="text" class="form-control" name="remark"></textarea>
                    </div>
                    @if ($errors->has('remark'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('remark') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-3 col-form-label">Pdf Copy:</label>
                <div class="col-md-7">
                    <input type="file" class="form-control" name="pdf_file">
                    @if ($errors->has('pdf_file'))
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('pdf_file') }}</strong>
                                                        </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection
@push('js')
<script src="{{asset('contents/admin')}}/assets/js/pages/crud/file-upload/dropzonejs.js" type="text/javascript"> </script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#institutionRow').hide();
        $('#countryId').on('change',function () {
            let countryId = $(this).val();

            $.ajax({
                type: "post",
                url:'{{ url("dashboard/get/university") }}',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'country_id': countryId
                },
                success: function (response) {
                    $('#institutionRow').show();
                    $('#null_institution').remove();
                    let html_get_institution = `<option id="null_institution" value="" default >Select Institution Name</option>`;
                    $.each(response.data.universities, function (key, value) {
                        html_get_institution += `<option value="` + value.id + `" >` + value.name + `</option>`;
                    });
                    $('#inst_select_div').html(html_get_institution);
                }
            });
        })
    });
</script>

@endpush



