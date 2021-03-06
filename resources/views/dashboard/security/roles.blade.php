@extends('layouts.dashboard')

@push('title')
    Roles
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
                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
                <h6 class="sm-pagetitle--style-1 has_page_title">View roles</h6>
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
                                        <a href="javascript:void(0)"
                                           class="tooltip_cus fullscreen_element">
                                            <span class="extra-tooltip">Fullscreen</span>
                                            <i class="material-icons">fullscreen</i>
                                        </a>
                                        <a data-toggle="modal" data-target=".create-modal-lg"
                                           @if(!auth('web')->user()->hasAccess('roles','add')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                           @endif
                                           class="tooltip_cus">
                                            <span class="extra-tooltip">Add</span>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                    <h6 class="sm-header">
                                        Roles
                                    </h6>
                                </div>
                                <div class="sm-box">
                                    <table id="data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Role name</th>
                                            <th>Description</th>
                                            <th>Created DDTM (UTC)</th>
                                            <th>Updated DDTM (UTC)</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(\App\Role::all() as $role)
                                            <tr class="gradeX">
                                                <td>R{{ sprintf('%04d', $role->id) }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->description }}</td>
                                                <td>{{ \Carbon\Carbon::parse($role->created_at)->timezone('UTC')->format('d M Y H:i:s') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($role->updated_at)->timezone('UTC')->format('d M Y H:i:s') }}</td>
                                                <td class="">
                                                    <button type="button"
                                                        @if(!auth('web')->user()->hasAccess('roles','update')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                                        @else data-toggle="modal"
                                                        data-target=".edit-modal-{{$role->id}}-lg"
                                                        @endif
                                                        style="display: inline-block;" class="btn btn-outline-warning m-t-5"><span class="fa fa-edit"></span></button>
                                                    <form style="display: inline-block;"
                                                          action="{{ route('tenant:roles.destroy',['roles'=>$role->id,'tenant'=>session('tenant'),]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="btn btn-outline-danger m-t-5"
                                                            @if(!auth('web')->user()->hasAccess('roles','delete'))
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
                </div>
            </div>
        </div>
    </section>

    @if(auth('web')->user()->hasAccess('roles','add'))
        <div class="modal fade create-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('tenant:roles.store',['tenant'=>session('tenant')]) }}" class="form-default"
                      method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="sm-info">
                                <div class="sm-info-with-icon">
                                    <div class="sm-info-text">
                                        <h4 class="sm-inner-header">Creating new role</h4>
                                        <p>
                                            Choose new role name and assign page permissions (with read or write access)
                                            to new role.
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
                                            <input type="text" name="name" id="inputName" class="form-control"
                                                   placeholder="Please enter name of role" value="{{ old('name') }}"
                                                   tabindex="1" maxlength="35" required="" autocomplete="off">
                                            <label class="control-label">Role name</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <input type="text" name="description" id="inputDescription" class="form-control"
                                                   placeholder="Please enter description of role" value="{{ old('description') }}"
                                                   tabindex="1" maxlength="100" required="" autocomplete="off">
                                            <label class="control-label">Role description (Maximum 100 character)</label>
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

    @if(auth('web')->user()->hasAccess('roles','update'))
        @foreach(\App\Role::all() as $role)
            <div class="modal fade edit-modal-{{$role->id}}-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('tenant:roles.update',['tenant'=>session('tenant'), 'role'=>$role->id]) }}"
                          class="form-default" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="sm-info">
                                    <div class="sm-info-with-icon">
                                        <div class="sm-info-text">
                                            <h4 class="sm-inner-header">Creating new role</h4>
                                            <p>
                                                Choose new role name and assign page permissions (with read or write access)
                                                to new role.
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
                                                <input type="text" name="name" id="inputName" class="form-control"
                                                       placeholder="Please enter name of role"
                                                       value="{{ old('name')??$role->name }}" tabindex="1"
                                                       maxlength="35" required="" autocomplete="off">
                                                <label class="control-label">Role name</label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <input type="text" name="description" id="inputDescription" class="form-control"
                                                       placeholder="Please enter description of role"
                                                       value="{{ old('description')??$role->description }}" tabindex="1"
                                                       maxlength="100" required="" autocomplete="off">
                                                <label class="control-label">Role description (Maximum 100 character)</label>
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
