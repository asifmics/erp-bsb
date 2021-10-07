<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        @if(auth()->user()->hasAnyPermission(['all_event','edit_event','delete_event','view_event','insert_event']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Event</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_event']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_event')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Event</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_event','edit_event','delete_event']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_event')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Event</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['all_advertisment','edit_advertisment','delete_advertisment','insert_advertisment','view_advertisment']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Ads</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_advertisment']))
                    <li class="kt-menu__item ">
                        <a href="{{route('add_ads')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add Ads</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_advertisment','edit_advertisment','delete_advertisment']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_ads')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Ads</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        @if(auth()->user()->hasAnyPermission(['all_publication','edit_publication','delete_publication','insert_publication','view_publication']))
        <li class="kt-menu__item ">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                <span class="kt-menu__link-icon fa fa-money-check"></span>
                <span class="kt-menu__link-text">Publication</span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @if(auth()->user()->hasAnyPermission(['insert_publication']))
                    <li class="kt-menu__item">
                        <a href="{{route('add_publication')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">Add publication</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->hasAnyPermission(['all_advertisment','edit_publication','delete_publication']))
                    <li class="kt-menu__item ">
                        <a href="{{route('all_publication')}}" class="kt-menu__link ">
                            <i
                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text">All Publication</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

    </ul>
</div>
