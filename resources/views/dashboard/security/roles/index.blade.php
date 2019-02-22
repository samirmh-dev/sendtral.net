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
                    <li class="breadcrumb-item"><a href="{{ route('tenant:dashboard',['tenant'=>session('tenant')]) }}">Dashboard</a></li>
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
                                        <a href="javascript:void(0)"
                                           class="tooltip_cus refresh_element">
                                            <span class="extra-tooltip">Refresh</span>
                                            <i class="material-icons">refresh</i>
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
                                            <th>Created DDTM (UTC)</th>
                                            <th>Updated DDTM (UTC)</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(\App\Role::all() as $role)
                                            <tr class="gradeX">
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $log->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($log->created_at)->timezone('UTC')->format('d M Y H:i:s') }}</td>
                                                <td>Actions</td>
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
@endsection
