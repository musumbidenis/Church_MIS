@extends('layouts.main')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="bg-flower">
                        <img src="{{ asset('assets/images/flowers/img-3.png') }}">
                    </div>

                    <div class="bg-flower-2">
                        <img src="{{ asset('assets/images/flowers/img-1.png') }}">
                    </div>

                    <div class="page-title-box">
                        <div class="page-title-right">
                            <form class="d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="dash-daterange">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="ri-calendar-todo-fill fs-13"></i>
                                    </span>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                    <i class="ri-refresh-line"></i>
                                </a>
                            </form>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Campaign Sent
                                    </h5>
                                    <h3 class="my-1 py-1">9,184</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="ri-arrow-up-line"></i> 3.27%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="campaign-sent-chart" data-colors="#6da09c"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-sm-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">New Leads</h5>
                                    <h3 class="my-1 py-1">3,254</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="ri-arrow-up-line"></i> 5.38%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="new-leads-chart" data-colors="#87bf8a"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-sm-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">Deals</h5>
                                    <h3 class="my-1 py-1">861</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="ri-arrow-up-line"></i> 4.87%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="deals-chart" data-colors="#e7607b"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-sm-6 col-xxl-3">
                    <div class="card text-bg-primary border-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-white text-opacity-75 fw-normal mt-0 text-truncate"
                                        title="Booked Revenue">Booked Revenue</h5>
                                    <h3 class="my-1 py-1">$253k</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-white text-opacity-75 me-2"><i class="ri-arrow-up-line"></i>
                                            11.7%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="booked-revenue-chart" data-colors="#d89e70"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->
@endsection
