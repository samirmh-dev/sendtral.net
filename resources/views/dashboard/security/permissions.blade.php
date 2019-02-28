@extends('layouts.dashboard')

@push('title')
    Permissions
@endpush

@push('js')
    <script src="{{ mix('js/datatable.min.js')}}"></script>
    <script>
        "use strict";
        var pvrDataTable = function () {
                "use strict";
                $("#data-table").DataTable({
                    fixedHeader: true,
                })
            },
            Table = function () {
                "use strict";
                return {
                    init: function () {
                        pvrDataTable()
                    }
                }
            }();
        $(document).ready(function () {
            Table.init();
        });
    </script>
@endpush

@push('css')
    <style>
        table#data-table td {
            word-break: break-word;
        }
    </style>
@endpush

@section('content')
    <!--BEGIN CONTENT-->
    <section id="main_content" class="bg slice-sm sct-color-1">
        <div class="container" id="container">
            <!--BEGIN BREADCRUMB-->
            <div class="breadcrumb-pageheader p-b-25">
                <ol class="breadcrumb sm-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('tenant:dashboard',['tenant'=>session('tenant')]) }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Security</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                </ol>
                <h6 class="sm-pagetitle--style-1 has_page_title">View permissions</h6>
            </div>
            <!--END BREADCRUMB-->

            <!--BEGIN PAGE CONTENT-->
            <div class="sm-content">
                <div class="sm-content-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sm-wrapper">
                                <div class="title_box sm-header-style-1">
                                    <div class="sm-actions">
                                        <a data-toggle="modal" data-target=".create-modal-lg"
                                           @if(!auth('web')->user()->hasAccess('permissions','add')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                           @endif
                                           class="tooltip_cus">
                                            <span class="extra-tooltip">Add</span>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                    <h6 class="sm-header">
                                        Role
                                    </h6>
                                </div>
                                @php
                                    $currentRole = \App\Role::whereSlug(\Illuminate\Support\Facades\Input::get('role'))->get()->first();
                                @endphp
                                <div class="sm-box px-4">
                                    <form action="#" method="GET">
                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <select class="form-control" required="" name="role" tabindex="3">
                                                    <option value="" {{ $currentRole?'':'selected' }} disabled>
                                                        --None--
                                                    </option>
                                                    @foreach(\App\Role::all() as $role)
                                                        <option {{ $currentRole&&($role->slug==$currentRole->slug)?'selected':'' }} value="{{ $role->slug }}">{{ $role->name }}
                                                            ({{ $role->description }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="control-label">Select role</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($currentRole)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sm-wrapper">
                                    <div class="title_box sm-header-style-1">
                                        <div class="sm-actions">
                                            <a href="javascript:void(0)"
                                               class="tooltip_cus fullscreen_element">
                                                <span class="extra-tooltip">Fullscreen</span>
                                                <i class="material-icons">fullscreen</i>
                                            </a>
                                            <a href="javascript:void(0)"
                                               class="tooltip_cus refresh_element">
                                                <span class="extra-tooltip">Refresh</span>
                                                <i class="material-icons">refresh</i>
                                            </a>
                                            <a data-toggle="modal" data-target=".create-modal-lg"
                                               @if(!auth('web')->user()->hasAccess('permissions','add')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                               @endif
                                               class="tooltip_cus">
                                                <span class="extra-tooltip">Add</span>
                                                <i class="material-icons">add</i>
                                            </a>
                                        </div>
                                        <h6 class="sm-header">
                                            Permissions
                                        </h6>
                                    </div>

                                    <div class="sm-box">
                                        <table id="data-table" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Page name</th>
                                                <th>Add</th>
                                                <th>Read</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($currentRole->permissions()->get() as $permission)
                                                <tr class="gradeX">
                                                    <td>P{{ sprintf('%04d', $permission->id) }}</td>
                                                    <td>{{ config('custom.permissions.'.$permission->page) }}</td>
                                                    <td>{{ json_decode($permission->permissions)->add?'+':'-' }}</td>
                                                    <td>{{ json_decode($permission->permissions)->read?'+':'-' }}</td>
                                                    <td>{{ json_decode($permission->permissions)->update?'+':'-' }}</td>
                                                    <td>{{ json_decode($permission->permissions)->delete?'+':'-' }}</td>
                                                    <td class="">
                                                        <button type="button"
                                                                @if(!auth('web')->user()->hasAccess('permissions','update')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                                                @else data-toggle="modal"
                                                                data-target=".edit-modal-{{$permission->id}}-lg"
                                                                @endif
                                                                style="display: inline-block;"
                                                                class="btn btn-outline-warning m-t-5"><span
                                                                    class="fa fa-edit"></span></button>
                                                        <form style="display: inline-block;"
                                                              action="{{ route('tenant:permissions.destroy',['permission'=>$permission->id,'tenant'=>session('tenant'),]) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                    class="btn btn-outline-danger m-t-5"
                                                                    @if(!auth('web')->user()->hasAccess('permissions','delete'))
                                                                    type="button"
                                                                    onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                                                    @endif>
                                                                <span class="fa fa-trash"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if(auth('web')->user()->hasAccess('permissions','add'))
        <div class="modal fade create-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('tenant:permissions.store',['tenant'=>session('tenant')]) }}" class="form-default"
                      method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="sm-info">
                                <div class="sm-info-with-icon">
                                    <div class="sm-info-text">
                                        <h4 class="sm-inner-header">Creating new role</h4>
                                        <p>
                                            If you want to
                                            give <b>add / delete / update</b> permission to role check specific checkbox
                                            of permission.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <select class="form-control" required="" name="role" tabindex="3">
                                                <option value="" disabled selected>--None--</option>
                                                @foreach(\App\Role::all() as $role)
                                                    <option value="{{ $role->slug }}">{{ $role->name }}
                                                        ({{ $role->description }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="control-label">Select role</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <select class="form-control" required="" name="page" tabindex="3">
                                                <option value="" disabled selected>--None--</option>
                                                @foreach(config('custom.permissions') as $page=>$description)
                                                    <option value="{{ $page }}">{{ $description }}</option>
                                                @endforeach
                                            </select>
                                            <label class="control-label">Select page</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="checkbox" id="read" value="1"
                                                   name="read"
                                                   autocomplete="off">
                                            <label for="read">
                                                Read
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="checkbox" id="add" value="1"
                                                   name="add"
                                                   autocomplete="off">
                                            <label for="add">
                                                Add
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="checkbox" id="update" value="1"
                                                   name="update"
                                                   autocomplete="off">
                                            <label for="update">
                                                Edit
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="checkbox" id="delete" value="1"
                                                   name="delete"
                                                   autocomplete="off">
                                            <label for="delete">
                                                Delete
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close
                            </button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if(auth('web')->user()->hasAccess('permissions','update') && $currentRole)
        @foreach($currentRole->permissions()->get() as $permission)
            <div class="modal fade edit-modal-{{$permission->id}}-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('tenant:permissions.update',['tenant'=>session('tenant'), 'permission'=>$permission->id]) }}"
                          class="form-default" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="sm-info">
                                    <div class="sm-info-with-icon">
                                        <div class="sm-info-text">
                                            <h4 class="sm-inner-header">Creating new role</h4>
                                            <p>
                                                If you want to
                                                give <b>add / delete / update</b> permission to role check specific checkbox
                                                of permission.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <select class="form-control" readonly required="" name="role" tabindex="3">
                                                    <option value="" disabled selected>{{ $currentRole->name }}</option>
                                                </select>
                                                <label class="control-label">Select role</label>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <select class="form-control" readonly required="" name="role" tabindex="3">
                                                    <option value="" disabled selected>{{ config('custom.permissions.'.$permission->page) }}</option>
                                                </select>
                                                <label class="control-label">Select page</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" id="read" value="1"
                                                       name="read" {{ json_decode($permission->permissions)->read?'checked':'' }}
                                                       autocomplete="off">
                                                <label for="read">
                                                    Read
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" id="add" value="1"
                                                       name="add" {{ json_decode($permission->permissions)->add?'checked':'' }}
                                                       autocomplete="off">
                                                <label for="add">
                                                    Add
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" id="update" value="1"
                                                       name="update" {{ json_decode($permission->permissions)->update?'checked':'' }}
                                                       autocomplete="off">
                                                <label for="update">
                                                    Edit
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" id="delete" value="1"
                                                       name="delete" {{ json_decode($permission->permissions)->delete?'checked':'' }}
                                                       autocomplete="off">
                                                <label for="delete">
                                                    Delete
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close
                                </button>
                                <button class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection
