@extends('layouts.main')
@section('css')
    <!-- Bootstrap Datepicker css -->
    <link href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">events</a></li>
                                <li class="breadcrumb-item active">New event</li>
                            </ol>
                        </div>
                        <h4 class="page-title">New Event</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <div class="card card-body">
                            <h4 class="card-title">New Event</h4>
                            <p class="card-text">
                            <form class="needs-validation" novalidate action="{{ route('events.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">Event Name</label>
                                    <input type="text" class="form-control" name="eventName" id="validationCustom01"
                                        placeholder="eventName" value="{{ old('eventName') }}" required>
                                    <div class="invalid-feedback">
                                        Please provide an event name!
                                    </div>
                                </div>
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Event Date</label>
                                    <input type="text" class="form-control" name="eventDate" placeholder="Select Date"
                                        data-provide="datepicker" data-date-today-highlight="true"
                                        data-date-container="#datepicker1" required>
                                    <div class="invalid-feedback">
                                        Please select a date!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">Location</label>
                                    <input type="text" class="form-control" name="location" id="validationCustom01"
                                        placeholder="location" value="{{ old('location') }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a location!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="eventDescription">Event Description</label>
                                    <textarea name="eventDescription" name="eventDescription" id="eventDescription" rows="5" class="form-control"
                                        required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide event description!
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                            </p>
                        </div>

                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('scripts')
    <!-- Bootstrap Datepicker Plugin js -->
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
