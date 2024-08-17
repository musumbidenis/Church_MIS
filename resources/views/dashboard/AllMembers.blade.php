@extends('layouts.main')

@section('css')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Datatables css -->
    <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
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
                                <li class="breadcrumb-item active">All Members</li>
                            </ol>
                        </div>
                        <h4 class="page-title">All Members</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Render DataTable -->
            {!! $dataTable->table(['class' => 'table table-striped']) !!}
        </div> <!-- container -->
    </div> <!-- content -->
@endsection

@section('scripts')
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Buttons JS -->
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

    <!-- Required for Excel and PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Initialize DataTable -->
    {!! $dataTable->scripts() !!}

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>>

    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let form = $(this).closest('form');
                let memberID = form.data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You won't be able to revert this! Do you want to delete member ${memberID}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form when the user clicks "Yes, delete it"
                        Swal.fire(
                            'Deleted!',
                            'Member record has been deleted.',
                            'success'
                        )
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Cancelled',
                            'Delete action canceled. Record is safe!',
                            'info'
                        )
                    }
                });
            });
        });
    </script>



    <!-- Deleting a member -->
    {{-- <script>
        $(document).on('click', '.delete-member', function() {
            var button = $(this);
            var deleteUrl = button.data('url');
            var memberId = button.data('id');

            if (confirm('Are you sure you want to delete this member?')) {
                $.ajax({
                    url: deleteUrl,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        toastr.success('Member deleted successfully!');
                        $('#members-table').DataTable().ajax.reload(null,
                            false); // Reload the DataTable without resetting pagination
                    },
                    error: function(xhr) {
                        toastr.error('Failed to delete member.');
                    }
                });
            }
        });
    </script> --}}
@endsection
