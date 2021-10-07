@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Country Wise Requsition</h3>
		</div>

    </div>

	<div class="kt-portlet__body">

        <form action="{{ route('save_country_requsition') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="form-group">
                    <label class="col-form-label text-right">Country</label>
                    @php
                    $countries = App\Country::where('status',1)->get();
                    @endphp
                    <div class="">
                        <div class="input-group date">
                            <select name="country_id" id="" class="form-control">
                                <option value="">Please Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                            </div>
                        </div>
                        {{-- <span class="form-text text-muted">Enable clear and today helper buttons</span> --}}
                    </div>
                </div>
            </div>
        </div>
        @php
            $requsitions = App\StudentRequsition::where('status',1)->where('parent_id',null)->get();
            $key =1;
        @endphp
        <style>
            .requsition th{
                text-align: center;
            }
        </style>
        <div class="row">
            <div class="col-md-8 m-auto">
                <table class="requsition" width="100%" cellpadding="0" cellspacing="0" border="1" align="center" style="margin-top: 10px;">
                    {{-- <tr>
                        <th>SL</th>
                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Remark</th>
                    </tr> --}}
                    {{-- @foreach ($requsitions as $requsition)
                    <tr>
                        <td class="text-center">{{ $key++ }}</td>
                        <td style="font-weight: bold">{{ $requsition->name }}</td>
                        <td><input type="text" class="form-control" name="amount[]" value=""></td>
                        <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    </tr>
                    @if (count($requsition->subrequsitions)>0)
                    @foreach ($requsition->subrequsitions as $subreq)
                    <tr>
                        <td></td>
                        <td>{{ $subreq->name }}</td>
                        <td><input type="text" class="form-control" name="amount[]" value=""></td>
                        <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    </tr>
                    @endforeach
                    @endif
                @endforeach --}}
                {{-- <tr>
                    <td colspan="4"><button type="submit" class="btn btn-primary btn-block">Update</button></td>
                </tr> --}}
            </table>

            </div>
        </div>
    </form>
    <br>


	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

@push('js')

<script>
    $('select[name="country_id"]').on('change',function(e){
        e.preventDefault();
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
                var id = $(this).val();
            if(id != '')
            {
                var id =$(this).val();
                $.ajax({
                    url: '{{ url('dashboard/student/country/requsition/ajax') }}/'+id,
                    method: "GET",
                    dataType: "JSON",
                    success:function(data){
                        console.log(data);
                        $('.requsition').html(data)
                 }
                })
            }

    });
</script>


@endpush
@endsection
