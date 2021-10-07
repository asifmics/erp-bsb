@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Client Resopnse Details</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('all_client_response')
                    <a href="{{route('all_cs_survey')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Response</a>
                    @endcan
                </div>
            </div>
        </div>

	</div>
	<div class="kt-portlet__body">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="form-group">
                    <label class=" col-form-label"><b>Name:</b></label> &nbsp;
                    <label class=" col-form-label">{{ $client->name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class=" col-form-label"><b>Email:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $client->email }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class=" col-form-label"><b>Phone:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $client->phone }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
                    <div class="">
                        <h4>Survey Question Answer</h4>
                    </div>
                </div>
                @foreach ($client->client as $item)
                <div class="form-group">
                    <label class=" col-form-label"><b>{{ $item->question->question }}:</b></label>
                    <div class="">
                       <label for=""><b>Answer:</b></label> <span>{{ $item->answer }}</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

@endsection
