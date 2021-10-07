<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        @if(auth()->user()->hasAnyPermission(['all_employee','edit_employee','view_employee','delete_employee','insert_employee']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Employee</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_employee','edit_employee','view_employee','delete_employee']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_employee','edit_employee','delete_employee')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Employee</span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->hasAnyPermission(['insert_employee']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_employee')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Employee</span>
                        </a>
                    </li>
                    @endif
                    <li class="kt-menu__item ">
                        <a href="{{route('employee_active_list')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Active Employee List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Call Managemanet</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_employee']))
                    <li class="kt-menu__item ">
                        <a href="{{route('calllists')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Call list</span>
                        </a>
                    </li>
                    @endif

                    @if(auth()->user()->hasAnyPermission(['insert_employee']))
                    <li class="kt-menu__item ">
                        <a href="{{route('call_add')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Call</span>
                        </a>
                    </li>
                    @endif
                    <li class="kt-menu__item ">
                        <a href="{{route('employee_active_list')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Active Employee List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @if(auth()->user()->hasAnyPermission(['all_department','edit_department','delete_department','insert_department','view_department']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Department</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_department','edit_department','delete_department']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_department')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Department</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_department']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_department')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Department</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_designation','edit_designation','delete_designation','insert_designation','view_designation']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Designation</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_designation','edit_designation','delete_designation']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_designation')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Designation</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_designation']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_designation')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Designation</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="{{ route('employee_report_search') }}" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Employee Report</span>

            </a>

        </li>
        @if(auth()->user()->hasAnyPermission(['all_branch','edit_branch','delete_branch','insert_branch','view_branch']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Branch</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_branch','edit_branch','delete_branch']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_branch')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Branch</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_branch']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_branch')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Branch</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        @if(auth()->user()->hasAnyPermission(['all_termination','edit_termination','insert_termination','view_termination','delete_termination']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Termination</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_termination','edit_termination','insert_termination']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_termination')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Termination</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_termination']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_termination')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Termination</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_resignation','edit_resignation','insert_resignation','view_resignation','delete_resignation']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Resignation</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_resignation','edit_resignation','insert_resignation']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_resignation')}}" class="kt-menu__link ">
                            <iclass="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></iclass=>
                            <span class="kt-menu__link-text">All Resignation</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_resignation']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_resignation')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Resignation</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_shift','edit_shift','delete_shift','insert_shift','view_shift']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Shift</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_shift','edit_shift','delete_shift']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_shift')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Shift</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_shift']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_shift')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Shift</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        @if(auth()->user()->hasAnyPermission(['all_emp_nature','edit_emp_nature','delete_emp_nature','view_emp_nature','insert_emp_nature']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Nature</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_emp_nature','edit_emp_nature','delete_emp_nature']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_emp_nature')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Nature</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_emp_nature']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_emp_nature')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Nature</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        {{-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Pay Type</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    <li class="kt-menu__item ">
                        <a href="{{route('all_pay_type')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Pay Type</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('add_pay_type')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Pay Type</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> --}}
        @if(auth()->user()->hasAnyPermission(['all_emp_status','edit_emp_status','delete_emp_status','insert_emp_status','view_emp_status']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Status</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_emp_status','edit_emp_status','delete_emp_status']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_emp_status')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Status</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_emp_status']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_emp_status')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Status</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_salary_scale','edit_salary_scale','delete_salary_scale','insert_salary_scale','view_salary_scale']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Salary Scale</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_salary_scale','edit_salary_scale','delete_salary_scale']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_salary_scale')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Salary Scale</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_salary_scale']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_salary_scale')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Salary Scale</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_designation','edit_designation','delete_designation','insert_designation','view_designation']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Designation</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_designation','edit_designation','delete_designation']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_designation')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Designation</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_designation']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_designation')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Designation</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
    </ul>
</div>

{{--
<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Employee</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    <li class="kt-menu__item ">
                        <a href="#" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Employee Master/Resource234
                                Management</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
 --}}

