@extends('layouts.admin')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">{{$data->name}} Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle"></i>Adjust University Program</a>
                    @can('all_university')
					<a href="{{url('dashboard/university')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-th"></i>All University</a>
                    @endcan
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		@if(Session::has('success'))
			<script type="text/javascript">
					swal({title: "Success!", text: "Successfully update country information!", icon: "success", button: "OK", timer:5000,});
			 </script>
		@endif
		<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<table class="table table-striped table-bordered table-hover custom_view_table">
							<tr>
									<td>University Name</td>
									<td>:</td>
									<td>{{$data->name}}</td>
							</tr>
							<tr>
									<td>Country</td>
									<td>:</td>
									<td>{{$data->countryName->name}}</td>
							</tr>
							<tr>
									<td>Rank</td>
									<td>:</td>
									<td>{{$data->rank}}</td>
							</tr>
							<tr>
									<td>University Details</td>
									<td>:</td>
									<td>{{$data->details}}</td>
							</tr>
							<tr>
									<td>University Address</td>
									<td>:</td>
									<td>{{$data->address}}</td>
							</tr>
							<tr>
									<td>University Programs</td>
									<td>:</td>
									<td>
											@php
													$allCate=App\UniversityProgramCategory::where('status',1)->orderBy('name','ASC')->get();
											@endphp
											@foreach($allCate as $cate)
											@php
                                                        $cID=$cate->id;
                                                        $uID=$data->id;
                                                        $currentCateProgram=App\UniversityWiseProgram::where('status',1)->where('university',$uID)->where('category',$cID)->get();
                                                        $cateCount=App\UniversityWiseProgram::where('status',1)->where('category',$cID)->where('university',$uID)->count();
											@endphp
											@if($cateCount!=0)
                                            <h5 class="uniprohead"><i class="fa fa-graduation-cap"></i> {{$cate->name}}</h5>
                                            <style>
                                                table{
                                                    margin: 0px;
                                                    padding: 0px;
                                                    text-align: center;
                                                    vertical-align: middle;
                                                }
                                            </style>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 80%">Programe</th>
                                                        <th>Duration</th>
                                                        <th>Tution Fees</th>
                                                        <th>Total Tution Fees</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($currentCateProgram as $ccp)
                                                    <tr>
                                                        <td>{{ $ccp->programName->name }}</td>
                                                        <td>{{ $ccp->duration }}</td>
                                                        <td>{{ $ccp->tution_fees }}</td>
                                                        <td>{{ $ccp->total_tution_fees }}</td>
                                                        <td>
                                                            <a href="{{url('dashboard/university/edit/'.$data->slug)}}" class="text-info manage_btn_icon" title="edit"><i class="fa fa-pen-square"></i></a>
                                                            <a href="#" id="softDelete" class="text-danger manage_btn_icon" title="delete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->id}}"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
											<ul class="uniproul">
													{{-- @foreach($currentCateProgram as $ccp)
														<li><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$ccp->programName->name}} - {{$ccp->duration}}</li>
													@endforeach --}}
											</ul>
											@endif
											@endforeach
									</td>
							</tr>
							<tr>
									<td>University Image</td>
									<td>:</td>
									<td>
										@if($data->image!='')
												<img class="img-thumbnail img100" src="{{asset('uploads/university/'.$data->image)}}" alt="Image"/>
										@else
												<img class="img-thumbnail img100" src="{{asset('uploads/no-image.png')}}" alt="No-image"/>
										@endif
									</td>
							</tr>
							<tr>
									<td>Create Time</td>
									<td>:</td>
									<td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
							</tr>
					</table>
				</div>
				<div class="col-md-1"></div>
		</div>
	</div>
  <div class="kt-portlet__foot">
    <a href="#" class="btn btn-info btn-sm">Print</a>
    <a href="#" class="btn btn-warning btn-sm">PDF</a>
	</div>
</div>
<!--delete modal code start-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
				<form method="post" action="{{url('dashboard/university/uniprogram')}}">
					@csrf
	        <div class="modal-content">
	            <div class="modal-header alert_modal_header">
	                <h5 class="modal-title"><i class="fab fa-gg-circle"></i> Add University Program</h5>
	            </div>
	            <div class="modal-body alert_modal_body">
								<div class="form-group row modal_custom_row{{ $errors->has('cate') ? ' has-error' : '' }}">
									<label class="col-md-3 col-form-label">Program Category:</label>
									<div class="col-md-7">
										<input type="hidden" name="id" value="{{$data->id}}"/>
										<input type="hidden" name="slug" value="{{$data->slug}}"/>
										@php
												$allCategory=App\UniversityProgramCategory::where('status',1)->orderBy('name','ASC')->get();
										@endphp
										<select class="form-control" name="cate">
												<option value="">Select Program Category</option>
												@foreach($allCategory as $cate)
												<option value="{{$cate->id}}">{{$cate->name}}</option>
												@endforeach
										</select>
										@if ($errors->has('cate'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('cate') }}</strong>
												</span>
										@endif
									</div>
								</div>
								<div class="form-group row modal_custom_row{{ $errors->has('program') ? ' has-error' : '' }}">
									<label class="col-md-3 col-form-label">University Program:</label>
									<div class="col-md-7">
										@php
												$allProgram=App\UniversityProgram::where('status',1)->orderBy('name','ASC')->get();
										@endphp
										<select class="form-control" name="program">
												<option value="">Select University Program </option>
												{{-- @foreach($allProgram as $program)
												<option value="{{$program->id}}">{{$program->name}}</option>
												@endforeach --}}
										</select>
										@if ($errors->has('program'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('program') }}</strong>
												</span>
										@endif
									</div>
								</div>
								<div class="form-group row modal_custom_row{{ $errors->has('duration') ? ' has-error' : '' }}">
									<label class="col-md-3 col-form-label">Duration:</label>
									<div class="col-md-7">
									<input type="text" class="form-control" placeholder="Course Duration" name="duration">
										@if ($errors->has('duration'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('duration') }}</strong>
												</span>
										@endif
									</div>
                                </div>

								<div class="form-group row modal_custom_row{{ $errors->has('tution_fees') ? ' has-error' : '' }}">
									<label class="col-md-3 col-form-label">Tution Fees (Per S/Y):</label>
									<div class="col-md-7">
									<input type="text" class="form-control" placeholder="Course Tution Fees" name="tution_fees">
										@if ($errors->has('tution_fees'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('tution_fees') }}</strong>
												</span>
										@endif
									</div>
								</div>

								<div class="form-group row modal_custom_row{{ $errors->has('total_tution_fees') ? ' has-error' : '' }}">
									<label class="col-md-3 col-form-label">Total Tution Fees:</label>
									<div class="col-md-7">
									<input type="text" class="form-control" placeholder="Course Tution Fees" name="total_tution_fees">
										@if ($errors->has('total_tution_fees'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('total_tution_fees') }}</strong>
												</span>
										@endif
									</div>
								</div>
	            </div>
	            <div class="modal-footer">
									<div class="modal_footer">
											<button type="submit" class="btn btn-sm btn-primary">SAVE</button>
									</div>
	            </div>
	        </div>
				</form>
    </div>
</div>
@endsection
@push('js')

<script>

$('select[name="cate"]').on('change', function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var cat_id = $(this).val();
            var university = $('input[name="id"]').val();
             if(cat_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/category/course/') }}",
                     type:"POST",
                     data:{cat_id:cat_id,university:university},
                     success:function(data) {
                       var d =$('select[name="program"]').empty();
                               $('select[name="program"]').append(data);

                     },

                 });
             } else {

             }
         });

</script>

@endpush

