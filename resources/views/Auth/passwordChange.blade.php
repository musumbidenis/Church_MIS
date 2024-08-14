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

                    <div class="card-body p-4">

                        <div class="w-75">
                            <h4 class="text-dark-50 mt-0 fw-bold">Change Password</h4>
                            <p class="text-muted mb-4">For security reasons, you're required to change your default
                                password. Please update your password to continue using your account.</p>
                        </div>

                        <form action="{{ route('auth.passwordChange') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="password" class="form-label">New Password <span
                                        class="text-danger fw-bold">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password <span
                                        class="text-danger fw-bold">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                                        class="form-control" placeholder="Confirm your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit">Change Password</button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div>
                <!-- end card -->
            </div>
            <!-- end card -->

        </div>

    </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
