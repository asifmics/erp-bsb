<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">

        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Loan Details</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_loan_details']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_loan')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Loan</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_loan_details','edit_loan_details','delete_loan_details']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_loan')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Loan</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @if(auth()->user()->hasAnyPermission(['all_installment_details','insert_installment_details','edit_installment_details','view_installment_details','delete_installment_details']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Installment</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_installment_details']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_installment')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Installment</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_installment_details','insert_installment_details','edit_installment_details','view_installment_details','delete_installment_details',]))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_installment')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Installment</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        <li class="kt-menu__item ">
            <a href="{{ route('loan_report_search') }}" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Loan Report</span>

            </a>
        </li>

    </ul>
</div>
