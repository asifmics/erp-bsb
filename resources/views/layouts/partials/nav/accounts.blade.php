<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        @if(auth()->user()->hasAnyPermission(['all_journal','edit_journal','delete_journal','insert_journal','view_journal']))
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Transactions</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    <li class="kt-menu__item ">
                        <a href="{{route('payment')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Payments</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('deposit')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Deposits</span>
                        </a>
                    </li>
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('transfer')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Bank Account Transfers</span>
                        </a>
                    </li> --}}
                    @if(auth()->user()->hasAnyPermission(['all_journal','edit_journal','delete_journal','insert_journal']))
                    <li class="kt-menu__item ">
                        <a href="{{route('gl.entry')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Journal Entry</span>
                        </a>
                    </li>
                    @endif
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_employee')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Budget Entry</span>
                        </a>
                    </li> --}}
                    {{-- <li class="kt-menu__item">
                        <a href="{{route('reconcile')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Reconcile Bank Account</span>
                        </a>
                    </li> --}}

                </ul>
            </div>
        </li>
        @endif
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Inquiries and Reports</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    <li class="kt-menu__item ">
                        <a href="{{route('gl.entry.all')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Journal Inquiry</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('account_balance_sheet_report')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Balance Sheet Report</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('account_cash_flow_report')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Cash Flow Chart</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{route('glInquiry')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">GL Inquiry</span>
                        </a>
                    </li>
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('bankInquiry')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Bank Account Inquiry</span>
                        </a>
                    </li> --}}
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_department')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Tax Inquiry</span>
                        </a>
                    </li> --}}
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_department')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Trial Balance</span>
                        </a>
                    </li> --}}
                    <li class="kt-menu__item ">
                        <a href="{{route('chart_of_accounts')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Chart of Accounts</span>
                        </a>
                    </li>
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_department')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Profit and Loss Drilldown</span>
                        </a>
                    </li> --}}
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_department')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Banking Reports</span>
                        </a>
                    </li> --}}
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_department')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">General Ledger Reports</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>
        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Maintenance</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_bank_account','insert_bank_account','edit_bank_account','view_bank_account','delete_bank_account']))
                    <li class="kt-menu__item ">
                        <a href="{{route('account.bank')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Bank Accounts</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_gl_account','insert_gl_account','edit_gl_account','view_gl_account','delete_gl_account']))
                    <li class="kt-menu__item ">
                        <a href="{{route('account.gl')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">GL Accounts</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_account_group','insert_account_group','edit_account_group','view_account_group','delete_account_group','all_bank_account']))
                    <li class="kt-menu__item ">
                        <a href="{{route('account.group')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">GL Account Groups</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_account_class','insert_account_class','edit_account_class','view_account_class','delete_account_class']))
                    <li class="kt-menu__item ">
                        <a href="{{route('account.class')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">GL Account Classes</span>
                        </a>
                    </li>
                    @endif
                    {{-- <li class="kt-menu__item ">
                        <a href="{{route('add_branch')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Closing GL Transactions</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>
    </ul>
</div>

