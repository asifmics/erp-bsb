<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    @if ($student->student_status == 'Guest')


    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Interest Country Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_interest') }}" method="POST" enctype="multipart/form-data">
                    @if (Request::is("dashboard/student/details/$student->slug/interest"))
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Add New Interest Country</h3>
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
                        <input type="hidden" name="id" value="{{ $interest->id }}">
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('country_id') ? 'has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Country:</label>
                        <div class="col-md-7">
                            @php
                                $countries = App\Country::all();
                            @endphp
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <select name="country_id" id="" class="form-control">
                                <option value="">Please select country</option>
                                @foreach ($countries as $country)
                                <option data-id="{{ $country->reg_fees }}" value="{{ $country->id }}" @if(old('country_id') == $country->id || ( isset($interest) && $interest->country_id == $country->id)) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('country_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('university_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">University/College:</label>
                        @if (isset($interest))
                            @php
                                $universities = App\University::where('country',$interest->country_id)->get();
                            @endphp
                        @endif
                        <div class="col-md-7">
                            <select name="university_id" id="" class="form-control col-md-12 col-xs-12">
                                @if (isset($interest))
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}" @if ($university->id == $interest->university_id) selected @endif>{{ $university->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('university_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('university_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('university_program_category_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Course Category:</label>
                        @if (isset($interest))
                        @php
                            $categories = App\UniversityWiseProgram::where('university',$interest->university_id)->where('status',1)->select('category')->groupBy('category')->get();
                        @endphp
                        @endif
                        <div class="col-md-7">
                            <select name="university_program_category_id" id="" class="form-control col-md-12 col-xs-12">
                                @if (isset($interest))
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category }}" @if ($category->category == $interest->university_program_category_id) selected @endif>{{ $category->CategoryName->name }}</option>
                                @endforeach
                                @endif
                            </select>

                            @if ($errors->has('university_program_category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('university_program_category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('university_program_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">University Course:</label>
                        @if (isset($interest))
                        @php
                        $courses = App\UniversityWiseProgram::where('university',$interest->university_id)->where('category',$interest->university_program_category_id)->where('status',1)->select('program')->groupBy('program')->get();
                        @endphp
                        @endif
                        <div class="col-md-7">
                            <select name="university_program_id" id="" class="form-control col-md-12 col-xs-12">

                                @if (isset($interest))
                                @foreach ($courses as $course)
                                    <option value="{{ $course->program }}" @if ($course->program== $interest->university_program_id) selected @endif>{{ $course->programName->name }}</option>
                                @endforeach
                                @endif

                            </select>
                            @if ($errors->has('university_program_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('university_program_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('addmission_fees') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Addmission Fees:</label>
                        <div class="col-md-7">
                            <input class="form-control col-md-12 col-xs-12" name="addmission_fees" id="reg_fees"  placeholder="Addmission Fees" type="text" value="{{ old('addmission_fees') ?? $interest->addmission_fees ?? ""}}">
                            <input type="hidden" name="total_course_fees">
                            <input type="hidden" name="tution_fees">
                            @if ($errors->has('addmission_fees'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('addmission_fees') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="ln_solid">
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 margin-top text-center">
                            @if (Request::is("dashboard/student/details/$student->slug/interest"))
                            <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Add New Country Interest</button>
                            @else
                            <button type="submit" class="btn btn-info glbscl-link-btn hvr-bs">Update Country Interest</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@php
$interests = $student->interestcountry;
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr class="bg-dark text-light">
                                <td>Country</td>
                                <td>University/College</td>
                                <td>Course Category</td>
                                <td>Course</td>
                                <td>Addmission Fees</td>
                                @if ($student->student_status == 'Guest')
                                <td>Action</td>
                                @else
                                <td>Status</td>
                                @endif
                            </tr>
                            @foreach ($interests as $interest)
                                <tr>
                                    <td>{{ $interest->country->name }}</td>
                                    <td>{{ $interest->university->name }}</td>
                                    <td>{{$interest->coursecategory->name}}</td>
                                    <td>{{ $interest->course->name }}</td>
                                    <td>{{ $interest->addmission_fees }}</td>
                                    @if ($student->student_status == 'Guest')
                                    <td>
                                        <a href="{{route('edit_interest', $interest->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{route('delete_interest', $interest->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
                                        @if (count($interests->where('adminssion_status',1)) >0)
                                        <a class="{{ $interest->adminssion_status == 1 ? '' : 'd-none' }}" href="{{route('delete_interest_chcke', $interest->id)}}"><i class="far fa-times-circle text-danger ml-2" aria-hidden="true"></i></a>
                                        @else
                                        <a class="" href="{{route('accept_interest', $interest->id)}}"><i class="far fa-check-circle text-success ml-2" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                    @else
                                    <td>
                                        @if ($interest->adminssion_status == 1)
                                        <i class="far fa-check-circle text-success ml-2 " aria-hidden="true">
                                        @else
                                        <i class="far fa-times-circle text-danger ml-2" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script type="text/javascript">
	  $(document).ready(function() {
         $('select[name="country_id"]').on('change', function(){
            var fees= $(this).find(':selected').data('id');
            $('input[name="addmission_fees"]').val(fees);
             var country_id = $(this).val();
             if(country_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/country/') }}/"+country_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       var d =$('select[name="university_id"]').empty();
                       $('select[name="university"]').append('<option value="">'+'Please Select University'+'</option>');
                           $.each(data, function(key, value){
                               $('select[name="university_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                           });
                     },

                 });
             } else {

             }

         });

         $('select[name="university_id"]').on('change', function(){
             var course_id = $(this).val();
             if(course_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course-category/') }}/"+course_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                       var d =$('select[name="university_program_category_id"]').empty();
                               $('select[name="university_program_category_id"]').append(data);

                     },

                 });
             } else {

             }
         });

         $('select[name="university_program_category_id"]').on('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             var cat_id = $(this).val();
            var university = $('select[name="university_id"]').val();
             if(cat_id) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course/') }}",
                     type:"POST",
                     data:{cat_id:cat_id,university:university},
                     success:function(data) {
                       var d =$('select[name="university_program_id"]').empty();
                               $('select[name="university_program_id"]').append(data);

                     },

                 });
             } else {

             }
         });

         $('select[name="university_program_id"]').on('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             var course = $(this).val();
            var university = $('select[name="university_id"]').val();
            var category = $('select[name="university_program_category_id"]').val();
             if(course) {
                 $.ajax({
                     url: "{{  url('dashboard/get/course/fees') }}",
                     type:"POST",
                     data:{
                        course:course,
                        university:university,
                        category:category
                        },
                     success:function(data) {

                               $('input[name="total_course_fees"]').val(data.total_tution_fees);
                               $('input[name="tution_fees"]').val(data.tution_fees);

                     },

                 });
             } else {

             }
         });
     });

</script>

@endpush
