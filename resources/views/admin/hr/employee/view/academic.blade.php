<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Academic Information
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form action="{{ route('save_academic') }}" method="POST" enctype="multipart/form-data">
                    @if (Request::is("dashboard/hr/employee/details/$employee->slug/academic"))
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Add New academic Information</h3>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">Edit academic Information</h3>
                            </div>
                        </div>
                        <input type="hidden" name="slug" value="{{ $aca->slug }}">
                        <input type="hidden" name="id" value="{{ $aca->id }}">
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group row custom_row{{ $errors->has('exam') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Exam Name:</label>
                        <div class="col-md-7">
                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">
                            <input type="text" class="form-control" name="exam"
                                value="{{ old('exam') ?? ($aca->exam ?? '') }}">
                            @if ($errors->has('exam'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('exam') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('institut') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Institut Name:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="institut"
                                value="{{ old('institut') ?? ($aca->institut ?? '') }}">
                            @if ($errors->has('institut'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('institut') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('group') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Group/Department:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="group"
                                value="{{ old('group') ?? ($aca->group ?? '') }}">
                            @if ($errors->has('group'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('group') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('board') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Board:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="board"
                                value="{{ old('board') ?? ($aca->board ?? '') }}">
                            @if ($errors->has('board'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('board') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('grade') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Grade:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="grade"
                                value="{{ old('grade') ?? ($aca->grade ?? '') }}">
                            @if ($errors->has('grade'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('grade') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row custom_row{{ $errors->has('pass_year') ? ' has-error' : '' }}">
                        <label class="col-md-3 col-form-label">Passing Year</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="pass_year"
                                value="{{ old('pass_year') ?? ($aca->pass_year ?? '') }}">
                            @if ($errors->has('pass_year'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pass_year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="kt-portlet__foot text-center">
                        @if (Request::is("dashboard/hr/employee/details/$employee->slug/academic"))
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
$academics = $employee->academics;
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr class="bg-dark text-light">
                                <td>Exam Name</td>
                                <td>Institut Name</td>
                                <td>Group/Department</td>
                                <td>Board</td>
                                <td>Grade</td>
                                <td>Passing Year</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($academics as $academic)
                                <tr>
                                    <td>{{ $academic->exam }}</td>
                                    <td>{{ $academic->institut }}</td>
                                    <td>{{ $academic->group }}</td>
                                    <td>{{ $academic->board }}</td>
                                    <td>{{ $academic->grade }}</td>
                                    <td>{{ $academic->pass_year }}</td>
                                    <td>
                                        <a href="{{route('edit_academic', $academic->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="{{route('delete_academic', $academic->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
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
