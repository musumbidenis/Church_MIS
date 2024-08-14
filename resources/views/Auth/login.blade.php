@extends('layouts.auth')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-6 col-lg-5">
            <div class="position-relative rounded-3 overflow-hidden">
                <div class="card bg-transparent mb-0">
                    <!-- Logo-->
                    <div class="auth-brand d-flex justify-content-center">
                        <a href="#" class="logo-light">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="150">
                        </a>
                        <a href="#" class="logo-dark">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="dark logo" height="150">
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="w-50">
                            <h4 class="pb-0 fw-bold">Sign In</h4>
                            <p class="fw-semibold mb-4">Enter your email address or phone number and password to access the
                                dashboard.</p>
                        </div>

                        <form novalidate action="{{ route('auth.login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email address or Phone number <span
                                        class="text-danger fw-bold">*</span></label>
                                <input class="form-control" name="emailPhone" required
                                    placeholder="Enter your email or phone number">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span
                                        class="text-danger fw-bold">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> --}}

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit"> Log In </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div>

            <div class="row mt-3">
                <div class="col-12 text-center"><a href="#"
                        class="ms-1 link-offset-3 text-decoration-underline"><b>Forgot password?</b></a>

                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
