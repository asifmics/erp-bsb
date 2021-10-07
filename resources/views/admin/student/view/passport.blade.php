                                <!--begin:: Widgets/Trends-->
                                <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder">
                                        <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                                Passport Information
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
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                <span class="kt-nav__link-text">Charts</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                <span class="kt-nav__link-text">Members</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                <span class="kt-nav__link-text">Settings</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fit">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-10 m-auto">
                                                <form action="{{ route('passport_update') }}" method="POST">
                                                    @csrf
                                                    @if ($student->passport_id != '')
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-sm-5 col-sm-5 col-xl-4 col-lg-4 text-right col-form-label">Passport Number</label>
                                                        <div class="col-md-8 col-sm-7  col-lg-8 col-xl-8">
                                                            <input name="slug" type="hidden" value="{{ $student->slug }}">
                                                            <input class="form-control" name="passport_id" type="text" value="{{ $student->passport_id }}">
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__foot text-center">
                                                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                                                    </div>
                                                    @else
                                                    <div class="alert alert-primary" role="alert">
                                                        I have No Passport
                                                    </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Trends-->
