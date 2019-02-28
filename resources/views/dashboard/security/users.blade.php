@extends('layouts.dashboard')

@push('title')
    Users
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
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
                <h6 class="sm-pagetitle--style-1 has_page_title">View users</h6>
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
                                           @if(!auth('web')->user()->hasAccess('users','add')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                           @endif
                                           class="tooltip_cus">
                                            <span class="extra-tooltip">Add</span>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                    <h6 class="sm-header">
                                        Users
                                    </h6>
                                </div>
                                <div class="sm-box">
                                    <table id="data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>E-mail</th>
                                            <th>Fullname</th>
                                            <th>Role</th>
                                            <th>Verified DDTM(UTC)</th>
                                            <th>Created DDTM (UTC)</th>
                                            <th>Updated DDTM (UTC)</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(\App\User::all() as $user)
                                            <tr class="gradeX">
                                                <td>U{{ sprintf('%04d', $user->id) }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td><a href="{{ route('tenant:permissions.index',['tenant'=>session('tenant'),'role'=>$user->roles()->get()->first()->slug??'22']) }}">{{ $user->roles()->get()->first()->name??'2' }}</a></td>
                                                <td>{{ $user->email_verified_at!==NULL?\Carbon\Carbon::parse($user->email_verified_at)->timezone('UTC')->format('d M Y H:i:s'):'Not verified yet' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->created_at)->timezone('UTC')->format('d M Y H:i:s') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->timezone('UTC')->format('d M Y H:i:s') }}</td>
                                                <td class="">
                                                    <button type="button"
                                                            @if(!auth('web')->user()->hasAccess('users','update')) onclick="event.preventDefault();toastr['error']('This action unauthorised','Error')"
                                                            @else data-toggle="modal"
                                                            data-target=".edit-modal-{{$user->id}}-lg"
                                                            @endif
                                                            style="display: inline-block;" class="btn btn-outline-warning m-t-5"><span class="fa fa-edit"></span></button>
                                                    <form style="display: inline-block;"
                                                          action="{{ route('tenant:users.destroy',['user'=>$user->id,'tenant'=>session('tenant'),]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                                class="btn btn-outline-danger m-t-5"
                                                                @if(!auth('web')->user()->hasAccess('users','delete'))
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
                <form action="{{ route('tenant:users.store',['tenant'=>session('tenant')]) }}" class="form-default"
                      method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="sm-info">
                                <div class="sm-info-with-icon">
                                    <div class="sm-info-text">
                                        <h4 class="sm-inner-header">Creating new user</h4>
                                        <p>
                                            Choose details for new user
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
                                                   placeholder="Please enter name of user" value="{{ old('name') }}"
                                                   tabindex="1" maxlength="35" required="" autocomplete="off">
                                            <label class="control-label">Full name</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <input type="email" name="email" id="inputEmail" class="form-control"
                                                   placeholder="Please enter email of user" value="{{ old('email') }}"
                                                   tabindex="1" maxlength="35" required="" autocomplete="off">
                                            <label class="control-label">E-mail</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <input type="password" name="password" id="inputName" class="form-control"
                                                   placeholder="Please enter password of user" value="{{ old('password') }}"
                                                   tabindex="1" min="6" maxlength="35" required="" autocomplete="off">
                                            <label class="control-label">Password</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <input type="password" name="password_confirmation" id="inputName" class="form-control"
                                                   placeholder="Please confirm password of user" value=""
                                                   tabindex="1" min="6" maxlength="35" required="" autocomplete="off">
                                            <label class="control-label">Password confirmation</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12 sm-form-design">
                                            <select class="form-control" required="" name="role" tabindex="3">
                                                <option value="" selected disabled>
                                                    --None--
                                                </option>
                                                @foreach(\App\Role::all() as $role)
                                                    <option value="{{ $role->slug }}">{{ $role->name }}
                                                        ({{ $role->description }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label class="control-label">Select role</label>
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

    @if(auth('web')->user()->hasAccess('users','update'))
        @foreach(\App\User::all() as $user)
            <div class="modal fade edit-modal-{{$user->id}}-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('tenant:users.update',['tenant'=>session('tenant'), 'user'=>$user->id]) }}"
                          class="form-default" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="sm-info">
                                    <div class="sm-info-with-icon">
                                        <div class="sm-info-text">
                                            Choose details for user
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
                                                       placeholder="Please enter name of user" value="{{ old('name')??$user->fullname }}"
                                                       tabindex="1" maxlength="35" required="" autocomplete="off">
                                                <label class="control-label">Full name</label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <input type="email" name="email" id="inputEmail" class="form-control"
                                                       placeholder="Please enter email of user" value="{{ old('email')??$user->email }}"
                                                       tabindex="1" maxlength="35" required="" autocomplete="off">
                                                <label class="control-label">E-mail</label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-12 sm-form-design">
                                                <select class="form-control" required="" name="role" tabindex="3">
                                                    <option value=""  {{$role->slug===($user->roles()->get()->first()->slug??'2')?'':'selected'}} disabled>
                                                        --None--
                                                    </option>
                                                    @foreach(\App\Role::all() as $role)
                                                        <option {{$role->slug===($user->roles()->get()->first()->slug??'2')?'selected':''}} value="{{ $role->slug }}">{{ $role->name }}
                                                            ({{ $role->description }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="control-label">Select role</label>
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
