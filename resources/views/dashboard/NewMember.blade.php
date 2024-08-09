@extends('layouts.main')
@section('css')
    <!-- Bootstrap Datepicker css -->
    <link href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Toastr css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Choices CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
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
                                    <li class="nav-item" data-target-form="#personalInfoForm">
                                        <a href="#first" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-1">
                                            <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Personal Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#residenceForm">
                                        <a href="#second" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-1">
                                            <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Residence</span></a>
                                    </li>
                                    <li class="nav-item" data-target-form="#finishForm">
                                        <a href="#third" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-1">
                                            <i class="ri-check-double-line fw-normal fs-18 align-middle me-1"></i>
                                            <span class="d-none d-sm-inline">Finish</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-0 b-0">

                                    <div class="tab-pane" id="first">
                                        <form id="personalInfoForm" action="#" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">First
                                                                Name <span class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control" name="firstName"
                                                                placeholder="First Name" value="{{ old('firstName') }}"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Please provide your first name!
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" name="middleName"
                                                                placeholder="Middle Name" value="{{ old('middleName') }}">
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Surname <span
                                                                    class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control" name="surname"
                                                                placeholder="Surname" value="{{ old('surname') }}" required>
                                                            <div class="invalid-feedback">
                                                                Please provide your surname!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-lg-4">
                                                            <label for="example-select" class="form-label">Gender <span
                                                                    class="text-danger fw-bold">*</span></label>
                                                            <select class="form-select" name="gender" id="example-select"
                                                                required>
                                                                <option disabled selected>Select gender</option>
                                                                <option value="M">Male</option>
                                                                <option value="F">Female</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a gender!
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-3 position-relative" id="datepicker1">
                                                            <label class="form-label"> Date of Birth <span
                                                                    class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control" name="DOB"
                                                                placeholder="Select Date" data-provide="datepicker"
                                                                data-date-today-highlight="true"
                                                                data-date-container="#datepicker1" required>
                                                            <div class="invalid-feedback">
                                                                Please select a date!
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Telephone
                                                                <span class="text-danger fw-bold">*</span></label>
                                                            <input type="tel" class="form-control" name="telephone"
                                                                placeholder="Telephone" value="{{ old('telephone') }}"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Please provide your telephone number!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Email Address" value="{{ old('email') }}">
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
                                        <form id="residenceForm" action="#" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Nearest Primary School <span
                                                                    class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="nearestPrimary" placeholder="Nearest Primary School"
                                                                value="{{ old('nearestPrimary') }}" required>
                                                            <div class="invalid-feedback">
                                                                Please provide your nearest primary school!
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Address
                                                                <span class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control" name="address"
                                                                placeholder="e.g 34-80300, 34,Voi"
                                                                value="{{ old('address') }}" required>
                                                            <div class="invalid-feedback">
                                                                Please provide your address!
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Town
                                                                <span class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control" name="town"
                                                                placeholder="Town" value="{{ old('town') }}" required>
                                                            <div class="invalid-feedback">
                                                                Please provide the name of your town!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">House Number </label>
                                                            <input type="text" class="form-control" name="houseNumber"
                                                                placeholder="House Number"
                                                                value="{{ old('houseNumber') }}">
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Nearest Street/Road <span
                                                                    class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="nearestStreet" placeholder="Nearest Street/Road"
                                                                value="{{ old('nearestStreet') }}" required>
                                                            <div class="invalid-feedback">
                                                                Please provide your nearest street/road!
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label class="form-label">Village/Estate
                                                                <span class="text-danger fw-bold">*</span></label>
                                                            <input type="text" class="form-control" name="village"
                                                                placeholder="Village/Estate" value="{{ old('village') }}"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Please provide the name of your village/estate!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end row -->
                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"><i
                                                        class="ri-arrow-left-line me-1"></i> Back to Personal Info</button>
                                            </li>
                                            <li class="next list-inline-item float-end">
                                                <button type="button" class="btn btn-info">Add More Info <i
                                                        class="ri-arrow-right-line ms-1"></i></button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="third">
                                        <form id="finishForm" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <h2 class="mt-0">
                                                            <i class="ri-check-double-line"></i>
                                                        </h2>
                                                        <h3 class="mt-0">Almost There!</h3>
                                                        <p class="fs-19">Select church groups that you
                                                            participate to complete Member registration.</p>
                                                    </div>
                                                    <div class="container">
                                                        <div class="d-flex justify-content-center">
                                                            <!-- Choices.js Dropdown for Groups -->
                                                            <input name="groups" class="form-control w-50"
                                                                placeholder="Add up to 5 tags">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>

                                            <!-- end row -->
                                            <ul class="pager wizard mb-0 list-inline mt-1">
                                                <li class="previous list-inline-item">
                                                    <button type="button" class="btn btn-light"><i
                                                            class="ri-arrow-left-line me-1"></i> Back to Residence</button>
                                                </li>
                                                <li class="next list-inline-item float-end">
                                                    <button id="submitBtn" type="button"
                                                        class="btn btn-info">Submit</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>

                                </div> <!-- tab-content -->
                            </div> <!-- end #rootwizard-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('scripts')
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Wizard Form js -->
    <script src="{{ asset('assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

    <!-- Wizard Form Demo js -->
    <script src="{{ asset('assets/js/pages/demo.form-wizard.js') }}"></script>

    <!-- Bootstrap Datepicker Plugin js -->
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Tagify js -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function() {
            var input = document.querySelector('input[name="groups"]');
            // Convert groups data to JSON format
            var groups = @json($groups->pluck('groupName')); // Use only group names

            // Init Tagify script on the above input
            var tagify = new Tagify(input, {
                whitelist: groups, // Use the groups as the whitelist
                enforceWhitelist: true, // Disallow tags outside the whitelist
                dropdown: {
                    maxItems: 20000, // <- maximum allowed rendered suggestions
                    classname: "groups-look", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });

            // Toastr notifications
            @if (session('success')) toastr.success('{{ session('success') }}'); @endif
            @if (session('error')) toastr.error('{{ session('error') }}'); @endif

            // Function to get combined form data
            function getCombinedFormData() {
                var personalInfoData = $('#personalInfoForm').serializeArray();
                var residenceData = $('#residenceForm').serializeArray();
                var combinedData = personalInfoData.concat(residenceData);

                // Convert to a JSON object
                var formData = {};
                $.each(combinedData, function() {
                    formData[this.name] = this.value;
                });

                // Get the selected groups from Tagify
                var selectedGroups = tagify.value.map(tag => tag.value);
                formData['groups'] = selectedGroups;

                return formData;
            }

            // Function to check if all forms are valid
            function areAllFormsValid() {
                var allFormsValid = true;

                // Check personal info form
                var personalInfoForm = $('#personalInfoForm')[0];
                if (personalInfoForm && !personalInfoForm.checkValidity()) {
                    personalInfoForm.classList.add('was-validated');
                    allFormsValid = false;
                }

                // Check residence form
                var residenceForm = $('#residenceForm')[0];
                if (residenceForm && !residenceForm.checkValidity()) {
                    residenceForm.classList.add('was-validated');
                    allFormsValid = false;
                }

                return allFormsValid;
            }

            // Handle the "Submit" button click
            $('#finishForm .next button').click(function() {
                if (areAllFormsValid()) {
                    var combinedData = getCombinedFormData();

                    $.ajax({
                        url: '{{ route('members.store') }}',
                        method: 'POST',
                        data: combinedData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Redirect or refresh the page to show the success message
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Error message
                            console.error('Error submitting form');
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    // Alert the user to fill the required fields
                    toastr.error('Please fill all required fields before submitting.');
                }
            });
        });
    </script>
@endsection
