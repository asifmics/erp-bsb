<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        @if(auth()->user()->hasAnyPermission(['insert_employee_attendance','eidt_employee_attendance','view_employee_attendance','delete_employee_attendance']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Attendanc</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_employee_attendance']))
                    <li class="kt-menu__item ">
                        <a href="{{route('employee.attendanc','edit_employee_attendance')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Create Attendanc</span>
                        </a>
                    </li>
                    @endif
                    <li class="kt-menu__item ">
                        <a href="{{route('employee.daywishattendanc')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Day Wish Attendanc</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('employee.wishattendanc')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Employee Attendanc</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif

        @if(auth()->user()->hasAnyPermission(['all_employee_leave','insert_employee_leave','edit_employee_leave','view_employee_leave','delete_employee_leave']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Leave Management</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_employee_leave']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_emp_leave')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Leave</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_employee_leave']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_emp_leave')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Leave</span>
                        </a>
                    </li>
                    @endif

                    <li class="kt-menu__item ">
                        <a href="{{route('add_leave')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Leave Types</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        @endif

        @if(auth()->user()->hasAnyPermission(['all_holiday','edit_holiday','insert_holiday','delete_holiday','view_holiday']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Holiday</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_holiday','edit_holiday','insert_holiday']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_holiday')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Holiday</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['insert_holiday']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_holiday')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Holiday</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-universal-access"></span>
                <span class="kt-menu__link-text">Salary Sheet</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">

                    <li class="kt-menu__item ">
                        <a href="{{route('employee_salary_sheet')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Salary Sheet</span>
                        </a>
                    </li>

                    <li class="kt-menu__item ">
                        <a href="{{route('employee_salary_bank_sheet')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Bank Transfer Sheet</span>
                        </a>
                    </li>

                    <li class="kt-menu__item ">
                        <a href="{{route('employee_salary_cash_sheet')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Cash Salary Sheet</span>
                        </a>
                    </li>

                    <li class="kt-menu__item ">
                        <a href="{{route('employee_bonus_sheet')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Bonus Transfer Sheet</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

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

