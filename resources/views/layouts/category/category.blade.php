<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Thể Loại</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/datatables/datatables.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    </div>
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
                        <h1 class="mb-0">List Category</h1>
                        <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
                    </div>
                    <hr />
                    <table class="table table-hover" id="dataTable">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Name Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($category->count() > 0)
                            @foreach($category as $ctg)
                            <tr>
                                <td class="align-middle">{{ $ctg->ma_tloai}}</td>
                                <td class="align-middle">{{ $ctg->ten_tloai}}</td>
                                <td class="align-middle">
                                    <div class="btn-group " role="group" aria-label="Basic example">
                                        <a href="{{ route('category.show', $ctg->ma_tloai) }}" class="btn btn-link"><i class="fas fa-solid fa-eye text-success"></i></a>
                                        <a href="{{ route('category.edit', $ctg->ma_tloai) }}" class="btn btn-link"><i class="fas fa-solid fa-pen text-primary"></i></a>
                                        <button class="btn m-0 deleteCategoryBtn" data-toggle="modal" data-target="#deleteModal{{$ctg->ma_tloai}}" value="{{ $ctg->ma_tloai}}">
                                            <i class="fas fa-solid fa-trash" style="color: red"></i>
                                        </button>
                                        <form action="{{route('category.destroy',$ctg->ma_tloai)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="deleteModal{{$ctg->ma_tloai}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Cảnh báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="category_delete_id" id="category_id">
                                                            Bạn có chắc chắn muốn xóa?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Cancel">Hủy</button>
                                                            <button type="submit" class="btn btn-danger" id="deleteConfirm">Xóa</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                        @else
                            <tr>
                                <td class="text-center" colspan="5">Category not found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <!-- Page level plugins -->
    <!-- Page level custom scripts -->
    <script src="{{asset('admin_assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin_assets/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/datatables/datatables.min.js')}}"></script>
    <!-- <script src = "{{asset('js/jquery-3.6.3.min.js')}}"></script> -->
    <script src="{{ asset('admin_assets/js/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

</body>
<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteCategoryBtn', function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');
        })
    })

    $('#Cancel').click(function() {
        $('#deleteModal').modal('hide');
    });
</script>

</html>