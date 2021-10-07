@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">Complain Details</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('all_complain')
                    <a href="{{route('all_complain')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All Complain</a>
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
                    <label class=" col-form-label">{{ $complain->name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Email:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $complain->email }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Complain Subject:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $complain->subject }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
                    <label class=" col-form-label"><b>Complain Details:</b></label>&nbsp;
                    <label class=" col-form-label">{{ $complain->details }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>

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
