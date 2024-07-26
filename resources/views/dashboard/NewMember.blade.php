@extends('layouts.main')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="bg-flower">
                        <img src="assets/images/flowers/img-3.png">
                    </div>

                    <div class="bg-flower-2">
                        <img src="assets/images/flowers/img-1.png">
                    </div>

                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Catholic Church - Voi</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Members</a></li>
                                <li class="breadcrumb-item active">New Member</li>
                            </ol>
                        </div>
                        <h4 class="page-title">New Member</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">

                            <h4 class="header-title mb-3"> New Member</h4>

                            <div id="rootwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                    <li class="nav-item" data-target-form="#accountForm">
                                        <a href="form-wizard.html#first" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-1">
                                            <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Account</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#profileForm">
                                        <a href="form-wizard.html#second" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-1">
                                            <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#otherForm">
                                        <a href="form-wizard.html#third" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-1">
                                            <i class="ri-check-double-line fw-normal fs-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Finish</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-0 b-0">

                                    <div class="tab-pane" id="first">
                                        <form id="accountForm" method="post" action="form-wizard.html#"
                                            class="form-horizontal">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="userName3">User
                                                            name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="userName3"
                                                                name="userName3" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="password3">
                                                            Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="password3" name="password3"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="confirm3">Re
                                                            Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="confirm3" name="confirm3"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                        <ul class="list-inline wizard mb-0">
                                            <li class="next list-inline-item float-end">
                                                <a href="javascript:void(0);" class="btn btn-info">Add More Info <i
                                                        class="ri-arrow-right-line ms-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="second">
                                        <form id="profileForm" method="post" action="form-wizard.html#"
                                            class="form-horizontal">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="name3"> First
                                                            name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name3" name="name3"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="surname3"> Last
                                                            name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="surname3" name="surname3"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label"
                                                            for="email3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" id="email3" name="email3"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </form>
                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"><i
                                                        class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="button" class="btn btn-info">Add More Info <i
                                                        class="ri-arrow-right-line ms-1"></i></button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="third">
                                        <form id="otherForm" method="post" action="form-wizard.html#"
                                            class="form-horizontal"></form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0">
                                                        <i class="ri-check-double-line"></i>
                                                    </h2>
                                                    <h3 class="mt-0">Thank you !</h3>

                                                    <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus.
                                                        Suspendisse convallis dignissim eros at volutpat. In egestas mattis
                                                        dui. Aliquam mattis dictum aliquet.</p>

                                                    <div class="mb-3">
                                                        <div class="form-check d-inline-block">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheck4" required>
                                                            <label class="form-check-label" for="customCheck4">I agree
                                                                with the Terms and Conditions</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        </form>
                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"><i
                                                        class="ri-arrow-left-line me-1"></i> Back to Profile</button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="button" class="btn btn-info">Submit</button>
                                            </li>
                                        </ul>
                                    </div>

                                </div> <!-- tab-content -->
                            </div> <!-- end #rootwizard-->
                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('scripts')
    <!-- Bootstrap Wizard Form js -->
    <script src="assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- Wizard Form Demo js -->
    <script src="assets/js/pages/demo.form-wizard.js"></script>
@endsection
