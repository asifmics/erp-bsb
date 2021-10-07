@extends('layouts.admin')
@section('title', 'Role Permission')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
   .nav-item .active{

        border-left: 2px solid rgb(32, 32, 226);
    }
</style>
<link rel="stylesheet" href="{{ asset('contents/admin/assets/plugins/custom/prismjs/switchery.min.css') }}">

<script src="{{ asset('contents/admin/assets/plugins/custom/prismjs/switchery.min.js') }}"></script>
@endpush
@section('content')
<div class="kt-portlet__body">
    <div class="row mt-2">
        <div class="col-xl-12">
            <div class="tabs-vertical-env row">
                <ul class="nav nav-tabs flex-column nav tabs-vertical col-md-3" role="tablist">
                    <li class=""> <a class="nav-link disabled " aria-disabled="true" style="border:1px solid rgb(190, 187, 187)" >Role Information</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link show active" id="v-social-tab" data-toggle="tab" href="#v-social" role="tab" aria-controls="v-social" aria-selected="false">Genarel</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link show " id="v-contact-tab" data-toggle="tab" href="#v-contact" role="tab" aria-controls="v-contact" aria-selected="true">Permission</a>
                    </li>

                </ul>

                <div class="tab-content col-md-9">
                    <div class="tab-pane show active" id="v-social" role="tabpanel" aria-labelledby="v-social-tab">
                        <form action="{{ route('role.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label for="my-input" class="col-md-3"></label>
                            <label for="my-input" class="col-md-2">Name</label>
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <input id="my-input" class="form-control col-md-4" type="text" name="name" value="{{ $role->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary"  style="margin-left: 450px">Update</button>
                        </form>
                    </div>
                    <div class="tab-pane show " id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Permission</h3>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body card_form">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success alertsuccess" role="alert">
                                            <strong>Successfully!</strong> update contact information.
                                            </div>
                                        @endif
                                        @if(Session::has('error'))
                                            <div class="alert alert-warning alerterror" role="alert">
                                            <strong>Opps!</strong> please try again.
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-1" style="padding: 0px 5px">All</div>
                                    <div class="col-md-1" style="padding: 0px 5px">Create</div>
                                    <div class="col-md-1" style="padding: 0px 5px">Edit</div>
                                    <div class="col-md-1"  style="padding: 0px 5px">View</div>
                                    <div class="col-md-1"  style="padding: 0px 5px">Delete</div>
                                </div>
                                <br>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">User</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_user') == true) checked  @endif data-permission="all_user" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_user') === true) checked  @endif data-permission="insert_user" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_user') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_user" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_user') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_user" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_user') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_user" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Settings</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_settings') == true) checked  @endif data-permission="all_settings" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_settings') === true) checked  @endif data-permission="insert_settings" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_settings') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_settings" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_settings') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_settings" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_settings') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_settings" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Recycle Bin</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_recycle_bin') == true) checked  @endif data-permission="all_recycle_bin" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_recycle_bin') === true) checked  @endif data-permission="insert_recycle_bin" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_recycle_bin') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_recycle_bin" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_recycle_bin') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_recycle_bin" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_recycle_bin') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_recycle_bin" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Visa</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_visa') == true) checked  @endif data-permission="all_visa" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_visa') === true) checked  @endif data-permission="insert_visa" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_visa') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_visa" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_visa') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_visa" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_visa') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_visa" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Receptionist</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_receptionist') == true) checked  @endif data-permission="all_receptionist" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_receptionist') === true) checked  @endif data-permission="insert_receptionist" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_receptionist') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_receptionist" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_receptionist') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_receptionist" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_receptionist') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_receptionist" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Counsellor</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_consellor') == true) checked  @endif data-permission="all_consellor" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_consellor') === true) checked  @endif data-permission="insert_consellor" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_consellor') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_consellor" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_consellor') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_consellor" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_consellor') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_consellor" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Agent</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_agent') == true) checked  @endif data-permission="all_agent" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_agent') === true) checked  @endif data-permission="insert_agent" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_agent') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_agent" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_agent') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_agent" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_agent') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_agent" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Branch</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_branch') == true) checked  @endif data-permission="all_branch" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_branch') === true) checked  @endif data-permission="insert_branch" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_branch') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_branch" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_branch') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_branch" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_branch') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_branch" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Department</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_department') == true) checked  @endif data-permission="all_department" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_department') === true) checked  @endif data-permission="insert_department" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_department') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_department" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_department') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_department" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_department') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_department" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Designation</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_designation') == true) checked  @endif data-permission="all_designation" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_designation') === true) checked  @endif data-permission="insert_designation" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_designation') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_designation" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_designation') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_designation" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_designation') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_designation" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Employee</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_country') == true) checked  @endif data-permission="all_employee" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_employee') === true) checked  @endif data-permission="insert_employee" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_employee') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_employee" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_employee') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_employee" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_employee') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_employee" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Country</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_country') == true) checked  @endif data-permission="all_country" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_country') === true) checked  @endif data-permission="insert_country" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_country') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_country" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_country') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_country" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_country') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_country" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Complain</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_complain') == true) checked  @endif data-permission="all_complain" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_complain') === true) checked  @endif data-permission="insert_complain" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_complain') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_complain" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_complain') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_complain" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_complain') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_complain" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Employee Status</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_emp_status') == true) checked  @endif data-permission="all_emp_status" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_emp_status') === true) checked  @endif data-permission="insert_emp_status" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_emp_status') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_emp_status" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_emp_status') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_emp_status" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_emp_status') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_emp_status" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Employee Nature</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_emp_nature') == true) checked  @endif data-permission="all_emp_nature" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_emp_nature') === true) checked  @endif data-permission="insert_emp_nature" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_emp_nature') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_emp_nature" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_emp_nature') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_emp_nature" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_emp_nature') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_emp_nature" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Pay Type</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_pay_type') == true) checked  @endif data-permission="all_pay_type" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_pay_type') === true) checked  @endif data-permission="insert_pay_type" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_pay_type') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_pay_type" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_pay_type') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_pay_type" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_pay_type') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_pay_type" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Publication Mangment</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_publication') == true) checked  @endif data-permission="all_publication" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_publication') === true) checked  @endif data-permission="insert_publication" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_publication') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_publication" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_publication') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_publication" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_publication') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_publication" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Event Mangment</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_event') == true) checked  @endif data-permission="all_event" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_event') === true) checked  @endif data-permission="insert_event" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_event') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_event" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_event') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_event" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_event') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_event" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Holiday</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_holiday') == true) checked  @endif data-permission="all_holiday" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_holiday') === true) checked  @endif data-permission="insert_holiday" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_holiday') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_holiday" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_holiday') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_holiday" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_holiday') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_holiday" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Leave</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_leave') == true) checked  @endif data-permission="all_leave" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_leave') === true) checked  @endif data-permission="insert_leave" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_leave') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_leave" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_leave') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_leave" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_leave') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_leave" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Salary Scale</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_salary_scale') == true) checked  @endif data-permission="all_salary_scale" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_salary_scale') === true) checked  @endif data-permission="insert_salary_scale" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_salary_scale') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_salary_scale" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_salary_scale') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_salary_scale" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_salary_scale') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_salary_scale" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Salary String</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_salary_string') == true) checked  @endif data-permission="all_salary_string" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_salary_string') === true) checked  @endif data-permission="insert_salary_string" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_salary_string') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_salary_string" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_salary_string') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_salary_string" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_salary_string') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_salary_string" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Salary Details</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_salary_details') == true) checked  @endif data-permission="all_salary_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_salary_details') === true) checked  @endif data-permission="insert_salary_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_salary_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_salary_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_salary_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_salary_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_salary_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_salary_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Shift</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_shift') == true) checked  @endif data-permission="all_shift" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_shift') === true) checked  @endif data-permission="insert_shift" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_shift') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_shift" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_shift') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_shift" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_shift') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_shift" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Student</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_student') == true) checked  @endif data-permission="all_student" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_student') === true) checked  @endif data-permission="insert_student" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_student') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_student" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_student') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_student" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_student') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_student" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">University</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_university') == true) checked  @endif data-permission="all_university" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_university') === true) checked  @endif data-permission="insert_university" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_university') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_university" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_university') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_university" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_university') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_university" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">University Program</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_university_program') == true) checked  @endif data-permission="all_university_program" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_university_program') === true) checked  @endif data-permission="insert_university_program" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_university_program') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_university_program" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_university_program') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_university_program" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_university_program') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_university_program" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">University Program Category</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_university_program_category') == true) checked  @endif data-permission="all_university_program_category" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_university_program_category') === true) checked  @endif data-permission="insert_university_program_category" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_university_program_category') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_university_program_category" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_university_program_category') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_university_program_category" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_university_program_category') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_university_program_category" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Termination</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_termination') == true) checked  @endif data-permission="all_termination" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_termination') === true) checked  @endif data-permission="insert_termination" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_termination') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_termination" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_termination') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_termination" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_termination') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_termination" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Resignation</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_resignation') == true) checked  @endif data-permission="all_resignation" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_resignation') === true) checked  @endif data-permission="insert_resignation" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_resignation') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_resignation" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_resignation') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_resignation" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_resignation') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_resignation" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Role</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_role') == true) checked  @endif data-permission="all_role" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_role') === true) checked  @endif data-permission="insert_role" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_role') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_role" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_role') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_role" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_role') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_role" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Guest</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_guest') == true) checked  @endif data-permission="all_guest" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_guest') === true) checked  @endif data-permission="insert_guest" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_guest') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_guest" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_guest') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_guest" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_guest') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_guest" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Client Details</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_client_details') == true) checked  @endif data-permission="all_client_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_client_details') === true) checked  @endif data-permission="insert_client_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_client_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_client_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_client_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_client_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_client_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_client_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Client Question</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_client_question') == true) checked  @endif data-permission="all_client_question" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_client_question') === true) checked  @endif data-permission="insert_client_question" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_client_question') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_client_question" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_client_question') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_client_question" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_client_question') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_client_question" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Client Response</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_client_response') == true) checked  @endif data-permission="all_client_response" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_client_response') === true) checked  @endif data-permission="insert_client_response" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_client_response') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_client_response" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_client_response') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_client_response" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_client_response') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_client_response" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Advertisment</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_advertisment') == true) checked  @endif data-permission="all_advertisment" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_advertisment') === true) checked  @endif data-permission="insert_advertisment" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_advertisment') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_advertisment" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_advertisment') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_advertisment" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_advertisment') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_advertisment" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Loan Details</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_loan_details') == true) checked  @endif data-permission="all_loan_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_loan_details') === true) checked  @endif data-permission="insert_loan_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_loan_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_loan_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_loan_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_loan_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_loan_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_loan_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Installment Details</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_installment_details') == true) checked  @endif data-permission="all_installment_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_installment_details') === true) checked  @endif data-permission="insert_installment_details" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_installment_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_installment_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_installment_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_installment_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_installment_details') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_installment_details" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Account Class</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_account_class') == true) checked  @endif data-permission="all_account_class" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_account_class') === true) checked  @endif data-permission="insert_account_class" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_account_class') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_account_class" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_account_class') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_account_class" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_account_class') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_account_class" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Account Group</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_account_group') == true) checked  @endif data-permission="all_account_group" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_account_group') === true) checked  @endif data-permission="insert_account_group" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_account_group') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_account_group" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_account_group') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_account_group" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_account_group') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_account_group" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Bank Account</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_bank_account') == true) checked  @endif data-permission="all_bank_account" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_bank_account') === true) checked  @endif data-permission="insert_bank_account" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_bank_account') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_bank_account" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_bank_account') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_bank_account" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_bank_account') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_bank_account" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Employee Attendance</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_employee_attendance') == true) checked  @endif data-permission="all_employee_attendance" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_employee_attendance') === true) checked  @endif data-permission="insert_employee_attendance" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_employee_attendance') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_employee_attendance" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_employee_attendance') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_employee_attendance" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_employee_attendance') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_employee_attendance" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Employee Leave</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_employee_leave') == true) checked  @endif data-permission="all_employee_leave" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_employee_leave') === true) checked  @endif data-permission="insert_employee_leave" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_employee_leave') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_employee_leave" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_employee_leave') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_employee_leave" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_employee_leave') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_employee_leave" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">GL Account</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_gl_account') == true) checked  @endif data-permission="all_gl_account" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_gl_account') === true) checked  @endif data-permission="insert_gl_account" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_gl_account') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_gl_account" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_gl_account') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_gl_account" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_gl_account') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_gl_account" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Journal</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_journal') == true) checked  @endif data-permission="all_journal" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_journal') === true) checked  @endif data-permission="insert_journal" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_journal') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_journal" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_journal') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_journal" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_journal') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_journal" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Marriage Status</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_marriage_status') == true) checked  @endif data-permission="all_marriage_status" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_marriage_status') === true) checked  @endif data-permission="insert_marriage_status" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_marriage_status') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_marriage_status" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_marriage_status') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_marriage_status" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_marriage_status') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_marriage_status" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">Company Resolution</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('all_resolution') == true) checked  @endif data-permission="all_resolution" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('insert_resolution') === true) checked  @endif data-permission="insert_resolution" data-id="{{ $role->id }}" data-plugin="switchery" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('edit_resolution') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="edit_resolution" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('view_resolution') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="view_resolution" data-color="#039cfd" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="switchery-demo">
                                            <input type="checkbox" name="permission" @if ($role->hasPermissionTo('delete_resolution') == true) checked  @endif data-plugin="switchery" data-id="{{ $role->id }}" data-permission="delete_resolution" data-color="#039cfd" />
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <hr>
                                </div>
                                <div class="card-footer card_footer_button text-center">
                                    <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>

    </div>
</div>

@endsection
@push('js')

<script>
    $(document).ready(function(){

        $('input[name="permission"]').on('change',function(){

            var check = $(this).prop('checked');
                var id = $(this).data('id');
                var permission = $(this).data('permission');
                    $.ajaxSetup({
                    headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    url: '{{ route('permission.update') }}',
                    method: "POST",
                    data:{id:id, permission:permission, check:check},
                    success: function(data){

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                            getValues()
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                        }
                })


        })
    })
</script>

@endpush




