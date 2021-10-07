<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Training Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_training') }}" method="POST" enctype="multipart/form-data">
                    @if (Request::is("dashboard/hr/employee/details/$employee->slug/traininig"))
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h3 class="kt-section__title kt-section__title-sm">Add New trainings Information</h3>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h3 class="kt-section__title kt-section__title-sm">Edit trainings Information</h3>
                        </div>
                    </div>
                    <input type="hidden" name="slug" value="{{$train->slug}}">
                    <input type="hidden" name="id" value="{{$train->id}}">
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Training Name:</label>
                        <div class="col-md-7">
                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">
                            <input type="text" class="form-control" name="title" value="{{old('title') ?? $train->title ?? ''}}">
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('institut') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Institut Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="institut" value="{{old('institut') ?? $train->institut ?? ''}}">
                            @if ($errors->has('institut'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('institut') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('topic') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Topics:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="topic" value="{{old('topic') ?? $train->topic ?? ''}}">
                            @if ($errors->has('topic'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('topic') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('board') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Board:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="board" value="{{old('board') ?? $train->board ?? ''}}">
                            @if ($errors->has('board'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('board') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="form-group row custom_row{{ $errors->has('grade') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Grade:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="grade" value="{{old('grade') ?? $train->grade ?? ''}}">
                            @if ($errors->has('grade'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('grade') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> --}}
                    <div class="form-group row custom_row{{ $errors->has('pass_year') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Passing Year</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="pass_year" value="{{old('pass_year') ?? $train->pass_year ?? ''}}">
                            @if ($errors->has('pass_year'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pass_year') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('duration') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Duration</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="duration" value="{{old('duration') ?? $train->duration ?? ''}}">
                            @if ($errors->has('duration'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('duration') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="kt-portlet__foot text-center">
                        @if (Request::is("dashboard/hr/employee/details/$employee->slug/traininig"))
                        <button type="submit" class="btn btn-md btn-brand">Save</button>
                        @else
                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                        @endif
                    </div>
                </form>
                </div>
        </div>
        @php
        $trainings =$employee->trainings;
        @endphp

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr class="bg-dark text-light">
                            <td>Training Title</td>
                            <td>Institut Name</td>
                            <td>Topics</td>
                            <td>Board</td>
                            <td>Passing Year</td>
                            <td>Duration</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($trainings as $training)
                        <tr>
                            <td>{{ $training->title }}</td>
                            <td>{{ $training->institut }}</td>
                            <td>{{ $training->topic }}</td>
                            <td>{{ $training->board }}</td>
                            <td>{{ $training->pass_year }}</td>
                            <td>{{ $training->duration }}</td>
                            <td>
                                <a href="{{route('edit_training', $training->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="{{route('delete_training', $training->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>



