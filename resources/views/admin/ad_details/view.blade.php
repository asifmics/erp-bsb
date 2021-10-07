@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Ads Details</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('all_advertisment')
                    <a href="{{route('all_ads')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Ads</a>
                    @endcan
                </div>
            </div>
        </div>

	</div>
	<div class="kt-portlet__body">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="form-group">
                    <label class=" col-form-label"><b> Ads Title:</b></label> &nbsp;
                    <label class=" col-form-label">{{ $ads->title }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Ads Cost:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $ads->cost }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Ads Remarks:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $ads->remarks }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Description:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $ads->description }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>ads Gallery:</b></label>&nbsp;
                    <label class=" col-form-label">
                        <div class="row">
                            @if (old('image') ?? $ads->image ?? '')
                        @php
                            $image = explode(',',$ads->image);
                        @endphp
                        @foreach ($image as $item)
                        <div class="col-md-4">
                            <img src="{{ asset($item) }}" alt="" width="150" height="150">
                        </div>
                        @endforeach
                        @endif
                        </div>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>

<br><br>
                    <div class="">

                    </div>
                </div>


            </div>
        </div>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

@endsection
