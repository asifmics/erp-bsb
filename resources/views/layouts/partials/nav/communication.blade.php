<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        @if(auth()->user()->hasAnyPermission(['all_client_response','edit_client_response','delete_client_response','inser_client_response']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Response</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_client_response','edit_client_response','delete_client_response','inser_client_response']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_cs_survey')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Response</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['edit_client_question','delete_client_question','all_client_question','insert_client_question']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Question</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_client_question']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_cs_question')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Question</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['edit_client_question','delete_client_question','all_client_question']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_cs_question')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Question</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_complain','edit_complain','insert_complain','delete_complain','view_complain']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Complain</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['all_complain','edit_complain','insert_complain','delete_complain']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_complain')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Complain</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

    </ul>
</div>

