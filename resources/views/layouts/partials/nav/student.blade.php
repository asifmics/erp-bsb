<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        @if(auth()->user()->hasAnyPermission(['insert_student','all_student','edit_student','delete_student','view_student']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Student Information</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>

            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    <li class="kt-menu__item ">
                        @if(auth()->user()->hasAnyPermission(['insert_student']))
                        <a href="{{ route('add_student') }}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Student</span>
                        </a>
                        @endif
                    </li>
                    <li class="kt-menu__item ">
                        @if(auth()->user()->hasAnyPermission(['all_student','edit_student','delete_student']))
                        <a href="{{ route('all_student') }}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Student</span>
                        </a>
                        @endif
                    </li>

                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_guest','edit_guest','delete_guest','insert_guest','view_guest']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Guest Information</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_guest','edit_guest','delete_guest']))
                    <li class="kt-menu__item ">
                        <a href="{{ route('all_guest_student') }}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Guest Information</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_guest']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_guest_student')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Guest Information</span>
                        </a>
                    </li>
                    @endif
                    <li class="kt-menu__item ">
                        <a href="{{ route('all_hear_bsb') }}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Media Information</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{ route('calllists') }}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Guest Call Report</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_university','edit_university','delete_university','insert_university','all_university_program','edit_university_program','insert_university_program','delete_university_program','all_university_program_category','insert_university_program_category','edit_university_program_category']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">University Information</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    <li class="kt-menu__item ">
                        <a href="{{ route('all_requsition') }}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Student Requsition</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('all_student_status')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Student Status</span>
                        </a>
                    </li>
                    @if(auth()->user()->hasAnyPermission(['all_country','insert_country','edit_country','view_country','delete_country',]))
                    <li class="kt-menu__item ">
                        <a href="{{url('dashboard/country')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Country Information</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_university','edit_university','delete_university','insert_university']))
                    <li class="kt-menu__item ">
                        <a href="{{url('dashboard/university')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All University</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_university_program','edit_university_program','insert_university_program','delete_university_program']))
                    <li class="kt-menu__item ">
                        <a href="{{url('dashboard/university/program')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All University Program</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_university_program_category','insert_university_program_category','edit_university_program_category']))
                    <li class="kt-menu__item ">
                        <a href="{{url('dashboard/university/program/category')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">University Program Category</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </li>
        @endif
    </ul>
</div>

