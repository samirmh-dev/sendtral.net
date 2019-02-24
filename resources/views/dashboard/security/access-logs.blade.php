@extends('layouts.dashboard')

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
                    <li class="breadcrumb-item active" aria-current="page">Access Logs</li>
                </ol>
                <h6 class="sm-pagetitle--style-1 has_page_title">View access logs</h6>
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
                                        Access Logs
                                    </h6>
                                </div>
                                <div class="sm-box">
                                    <table id="data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>E-mail</th>
                                            <th>Login IP Address</th>
                                            <th>Login DDTM (UTC)</th>
                                            <th>Logout IP Address</th>
                                            <th>Logout DDTM (UTC)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(\App\AccessLogs::all() as $log)
                                                <tr class="gradeX">
                                                    <td>AL{{ sprintf('%08d', $log->id) }}</td>
                                                    <td>{{ $log->user->email }}</td>
                                                    <td>{{ $log->log_in_ip }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($log->logged_in)->timezone('UTC')->format('d M Y H:i:s') }}</td>
                                                    <td>{{ $log->log_out_ip??'-' }}</td>
                                                    <td>{{ $log->logged_out!=NULL?\Carbon\Carbon::parse($log->logged_out)->timezone('UTC')->format('d M Y H:i:s'):'-' }}</td>
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
