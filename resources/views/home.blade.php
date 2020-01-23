@extends('layouts.master')

@section('content')
<!-- Page content -->
                    <div id="page-content">
                        <!-- First Row -->
                        <div class="row">
                            <!-- Simple Stats Widgets -->
                            <div class="col-sm-6 col-lg-4">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="gi gi-cardio text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                            <strong><span data-toggle="counter" data-to="2835"></span></strong>
                                        </h2>
                                        <span class="text-muted">SALES</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-success">
                                            <i class="gi gi-user text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-success">
                                            <strong>+ <span data-toggle="counter" data-to="2862"></span></strong>
                                        </h2>
                                        <span class="text-muted">NEW USERS</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-briefcase text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong>+ <span data-toggle="counter" data-to="75"></span></strong>
                                        </h2>
                                        <span class="text-muted">PROJECTS</span>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-danger">
                                            <i class="gi gi-wallet text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-danger">
                                            <strong>$ <span data-toggle="counter" data-to="5820"></span></strong>
                                        </h2>
                                        <span class="text-muted">EARNINGS</span>
                                    </div>
                                </a>
                            </div> -->
                            <!-- END Simple Stats Widgets -->
                        </div>
                        <!-- END First Row -->

                        <!-- Second Row -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-12">
                                <!-- Chart Widget -->
                                <div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-muted">2013</span>
                                        Last Year's Data
                                    </div>
                                    <div class="widget-content border-bottom themed-background-muted">
                                        <!-- Flot Charts (initialized in js/pages/readyDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
                                        <div id="chart-classic-dash" style="height: 393px;"></div>
                                    </div>
                                   
                                </div>
                                <!-- END Chart Widget -->
                            </div>
                           
                        </div>
                        <!-- END Second Row -->

                    </div>
                    <!-- END Page Content -->



@endsection
@section('js')
<script src="{{asset('assets/js/pages/readyDashboard.js')}}"></script>
        <script>$(function(){ ReadyDashboard.init(); });</script>
@endsection