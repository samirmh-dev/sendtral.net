@extends('layouts.dashboard')

@push('title')
    Edit role
@endpush

@section('content')
    <!--BEGIN CONTENT-->
    <section id="main_content" class="bg slice-sm sct-color-1">
        <div class="container" id="container">
            <!--BEGIN BREADCRUMB-->
            <div class="breadcrumb-pageheader p-b-25">
                <ol class="breadcrumb sm-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('tenant:dashboard',['tenant'=>session('tenant')]) }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Security</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
                <h6 class="sm-pagetitle--style-1 has_page_title">Edit role</h6>
            </div>
            <!--END BREADCRUMB-->

            <!--BEGIN PAGE CONTENT-->
            <div class="sm-content">
                <div class="sm-content-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sm-wrapper" >
                                <div class="title_box sm-header-style-1">
                                    <div class="sm-actions">
                                        <a href="javascript:void(0)" class="tooltip_cus fullscreen_element">
                                            <span class="extra-tooltip">Fullscreen</span>
                                            <i class="material-icons">fullscreen</i>
                                        </a>
                                        <a href="javascript:void(0)" class="tooltip_cus refresh_element">
                                            <span class="extra-tooltip">Refresh</span>
                                            <i class="material-icons">refresh</i>
                                        </a>
                                    </div>
                                    <h6 class="sm-header ui-sortable-handle">
                                        Edit role
                                    </h6>
                                </div>
                                <div class="sm-box px-4">
                                    <div class="sm-info">
                                        <div class="sm-info-with-icon">
                                            <div class="sm-info-icon">
                                                <div class="icon ion-ios-basketball-outline"></div>
                                            </div>
                                            <div class="sm-info-text">
                                                <h5 class="sm-inner-header">Edit role</h5>
                                                <div class="sm-inner-desc">
                                                    Choose role name and assign page permissions (with read or write access) to new role.
                                                    <br>
                                                    <br>
                                                    <b>NOTES:</b>
                                                    <br> Check permission checkbox for read-only access. <br> If you want to give <b>add / delete / update</b> permission to role check specific checkbox of permission.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('tenant:roles.update',['tenant'=>session('tenant'), 'role'=>$role->id]) }}" class="form-default" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <input type="text" name="name" id="inputName" class="form-control" placeholder="Please enter name of role" value="{{ old('name')??$role->name }}" tabindex="1" maxlength="35" required="" autocomplete="off">
                                                <label class="control-label">Role name</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Permissions</label>

                                            @foreach(config('custom.permissions') as $key=>$permission)
                                                <div class="col-md-6 d-flex justify-content-between">
                                                    <div class="checkbox">
                                                        <input {{ $role->hasAccess($key, 'read')?'checked':'' }} id="{{ 'permission'.'-'.$key }}" name="permissions[{{ $key }}][read]" type="checkbox"  autocomplete="off">
                                                        <label for="{{ 'permission'.'-'.$key }}">
                                                            {{ $permission }}
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <div class="checkbox checkbox-success checkbox-inline">
                                                            <input {{ $role->hasAccess($key, 'add')?'checked':'' }} type="checkbox" id="{{ $key.'-add' }}" value="1"  name="permissions[{{ $key }}][add]" autocomplete="off">
                                                            <label for="{{ $key.'-add' }}">
                                                                Add </label>
                                                        </div>
                                                        <div class="checkbox checkbox-success checkbox-inline">
                                                            <input {{ $role->hasAccess($key, 'update')?'checked':'' }} type="checkbox" id="{{ $key.'-update' }}" value="1"  name="permissions[{{ $key }}][update]" autocomplete="off">
                                                            <label for="{{ $key.'-update' }}">
                                                                Update </label>
                                                        </div>
                                                        <div class="checkbox checkbox-success checkbox-inline">
                                                            <input {{ $role->hasAccess($key, 'delete')?'checked':'' }} type="checkbox" id="{{ $key.'-delete' }}" value="1"  name="permissions[{{ $key }}][delete]" autocomplete="off">
                                                            <label for="{{ $key.'-delete' }}">
                                                                Delete </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="btn btn-primary m-t-5">Edit role</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
