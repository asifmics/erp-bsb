                                <!--begin:: Widgets/Trends-->
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                                Document
                                        </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-more-1"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                <span class="kt-nav__link-text">Reports</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                <span class="kt-nav__link-text">Messages</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fluid">
                                        <div class="kt-widget12">
                                            <form action="{{ route('save_document') }}" method="POST" enctype="multipart/form-data">
                                                @if (Request::is("dashboard/student/details/$student->slug/document"))
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">Add New Document</h3>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">Edit Document</h3>
                                                        </div>
                                                    </div>
                                                    {{-- <input type="hidden" name="slug" value="{{ $document->slug }}"> --}}
                                                    <input type="hidden" name="id" value="{{ $document->id }}">
                                                    @method('PUT')
                                                @endif
                                                @csrf
                                                <div class="form-group row custom_row{{ $errors->has('document_title') ? ' has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Document Title:</label>
                                                    <div class="col-md-7">
                                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                        <input type="text" class="form-control" name="document_title"
                                                            value="{{ old('document_title') ?? ($document->document_title ?? '') }}" placeholder="Enter Document Title">
                                                        @if ($errors->has('document_title'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('document_title') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row custom_row{{ $errors->has('document_type') ? ' has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Document Type:</label>
                                                    <div class="col-md-7">
                                                        <select name="document_type" class="form-control" id="">
                                                            <option value="">Select Type</option>
                                                            <option value="file" @if (old('document_type') == 'file' || isset($document) && $document->document_type == 'file') selected @endif>FIle</option>
                                                            <option value="image" @if (old('document_type') == 'image' || isset($document) && $document->document_type == 'image') selected @endif>Image</option>
                                                            <option value="pdf" @if (old('document_type') == 'pdf' || isset($document) && $document->document_type == 'pdf') selected @endif>PDF</option>
                                                        </select>
                                                        @if ($errors->has('document_type'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('document_type') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row custom_row{{ $errors->has('document') ? ' has-error' : '' }}">
                                                    <label class="col-md-3 col-form-label">Document:</label>
                                                    <div class="col-md-7">
                                                        <input type="file" class="form-control" name="document">
                                                        @if ($errors->has('document'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('document') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="kt-portlet__foot text-center">
                                                    @if (Request::is("dashboard/student/details/$student->slug/document"))
                                                        <button type="submit" class="btn btn-md btn-brand">Save</button>
                                                    @else
                                                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                     <!--end:: Widgets/Trends-->
                                @php
                                $documents = $student->documents;
                                @endphp
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="card-body">
                                            <div class="kt-portlet__body kt-portlet__body--fluid">
                                                <div class="kt-widget12">
                                                    <table class="table table-striped table-bordered">
                                                        <tbody>
                                                            <tr class="bg-dark text-light">
                                                                <td>Document Title</td>
                                                                <td>Document Type</td>
                                                                <td>Document</td>
                                                                <td>Download</td>
                                                                <td>Action</td>
                                                            </tr>
                                                            @foreach ($documents as $document)
                                                                <tr>
                                                                    <td>{{ $document->document_title }}</td>
                                                                    <td>{{ $document->document_type }}</td>
                                                                    <td><img width="40"  src="{{ URL::to($document->document) }}" alt=""></td>
                                                                    <td><a href="{{ asset($document->document) }}" download="">Download</a></td>
                                                                    <td>
                                                                        <a href="{{route('edit_document', $document->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                        <a href="{{route('delete_document', $document->id)}}"><i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
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
                            </div>
