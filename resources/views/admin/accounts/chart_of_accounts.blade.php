@extends('layouts.admin')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <form class="kt-form kt-form--label-right" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                    <h3 class="kt-portlet__head-title">
                        Chart of Accounts
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            {{-- <a href="#" class="btn btn-brand btn-elevate btn-icon-sm"><i
                                    class="fa fa-th"></i>All Reconciles</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <ul>
                    @foreach ($classes as $class)
                        <li>
                            <b>{{$class->name}}</b> 
                            <ul>
                                @foreach ($class->groupDetails as $group)
                                <li>
                                    &nbsp; &nbsp; &nbsp; <b>{{$group->name}}</b>
                                    <ul>
                                        @foreach ($group->glAccounts as $glAccount)
                                            <li>
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$glAccount->code . ' - ' .$glAccount->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul>
                                        @include('admin.accounts.partials.account', ['group' => $group, 'count'=> 6])
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            @if (!$loop->last)
                            <hr>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="kt-portlet__foot text-center">
                {{-- <button type="submit" class="btn btn-md btn-brand">Reconcile All</button>
                --}}
            </div>
        </form>
    </div>
@endsection
