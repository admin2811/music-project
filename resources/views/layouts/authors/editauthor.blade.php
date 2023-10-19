<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Tác giả</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/datatables/datatables.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/toastr.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    </div>

                    <!-- Page Heading -->
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Edit Category</h1>
                    </div>
                    <hr />
                    <form id="updateForm" action="{{route('author.update',$author->ma_tgia)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">ID Of Author</label>
                                <input type="text" name="ma_tgia" class="form-control" placeholder="ID" value="{{ $author->ma_tgia}}" readonly>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label">Name Of Author</label>
                                <input type="text" name="ten_tgia" class="form-control" placeholder="Name Of Author" value="{{ $author->ten_tgia}}" require>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                    @if(file_exists(public_path('img/' . $author->hinh_tgia)))
                                        <img src="{{ asset('img/' . $author->hinh_tgia) }}" width="100" height="100" class="rounded-circle mt-3" alt="hình">
                                        @else
                                        <img src="{{ asset($author->hinh_tgia) }}" width="100" height="100" class="rounded-circle mt-3" alt="không có hình">
                                        @endif
                                </div>
                        </div>
                </div>
                <div class="row">
                    <div class="d-grid">
                        <button class="btn btn-primary" id="openModal">Update</button>
                        <a href="{{route('author')}}" class="btn btn-warning">Quay Lại</a>
                    </div>
                </div>
                </form>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Do you want to update</h5>
                            </div>
                            <div class="modal-body">
                                Please choose the option
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="Close">Close</button>
                                <button type="button" class="btn btn-primary" id="confirmUpdate">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Content Row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <!-- Page level plugins -->

    <!-- Page level custom scripts -->
    <script src="{{asset('admin_assets/vendor/datatables/datatables.min.js')}}"></script>
    <!-- <script src = "{{asset('js/jquery-3.6.3.min.js')}}"></script> -->
    <script src="{{ asset('admin_assets/js/toastr.min.js') }}"></script>
</body>
<script>
    let modalOpened = false;

    document.getElementById("openModal").addEventListener("click", function() {
        if (!modalOpened) {
            $('#exampleModal').modal('show');
            modalOpened = true;
            event.preventDefault();
        }
    });
    document.getElementById("confirmUpdate").addEventListener("click", function() {
        // Gửi form sau khi xác nhận trong modal
        document.getElementById("updateForm").submit();
    });
    document.getElementById("Close").addEventListener("click", function() {
        modalOpened = false;
        $('#exampleModal').modal('hide');
    })
</script>