                                <!--begin:: Widgets/Trends-->
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                                Personal Information
                                        </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">

                                        </div>
                                    </div>
                                    <div class="kt-portlet__body  kt-portlet__body--fit">

                                        <div class="row">
                                            <div class="col-md-10 m-auto">
                                                <form action="{{ route('save_student') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">ID Number</label>
                                                        <div class="col-md-8 col-sm-7  col-lg-8 col-xl-8">
                                                            <input type="hidden" name="slug" value="{{ $student->slug }}">
                                                            <input type="hidden" name="id" value="{{ $student->id }}">
                                                            <input class="form-control" name="id_no" type="text" value="{{ $student->id_no }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Full Name</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <input class="form-control" name="name" type="text" value="{{ $student->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Date Of Birth</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <input class="form-control" name="dob" type="text" value="{{ $student->dob }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Email Address</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group ">
                                                                <div class="input-group-prepend">	<span class="input-group-text">
                                                                        <i class="la la-at"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" name="email" value="{{ $student->email }}" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Phone</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" name="phone" value="{{ $student->phone }}" placeholder="Phone">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Country</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">

                                                                    @php
                                                                        $countries = App\Country::all();
                                                                    @endphp
                                                                    <select name="nationality" id="" class="form-control">
                                                                        <option value="">Select Country</option>
                                                                        @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}" @if (old('nationality') == $country || isset($student) && $student->country->id == $country->id) selected @endif>{{ $country->name }}</option>

                                                                        @endforeach
                                                                    </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Parmanent Address</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group">
                                                                <textarea class="form-control" name="permanent_address" name="address" id="" cols="30" rows="3">
                                                                    {{ $student->permanent_address }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Present Address</label>
                                                        <div class="col-md-8 col-sm-7 col-lg-8 col-xl-8">
                                                            <div class="input-group">
                                                                <textarea class="form-control" name="present_address" name="address" id="" cols="30" rows="3">
                                                                    {{ $student->present_address }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__foot text-center">
                                                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end:: Widgets/Trends-->
