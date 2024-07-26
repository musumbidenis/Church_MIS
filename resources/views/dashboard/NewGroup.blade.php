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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Groups</a></li>
                                <li class="breadcrumb-item active">New Group</li>
                            </ol>
                        </div>
                        <h4 class="page-title">New Group</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <div class="card card-body">
                            <h4 class="card-title">New Group</h4>
                            <p class="card-text">
                            <form class="needs-validation" novalidate action="{{ route('groups.store') }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">Group Name</label>
                                    <input type="text" class="form-control" name="groupName" id="validationCustom01"
                                        placeholder="groupName" value="{{ old('groupName') }}" required>
                                    <div class="invalid-feedback">
                                        Please choose a group name!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="groupDescription">Group Description</label>
                                    <textarea name="groupDescription" name="groupDescription" id="groupDescription" rows="5" class="form-control"
                                        required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide group description!
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
