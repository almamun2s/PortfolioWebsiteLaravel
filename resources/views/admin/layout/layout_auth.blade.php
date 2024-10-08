<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontImg/favicon.png') }}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('packages/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- CSS for DataTables -->
    <link rel="stylesheet" href="{{ asset('packages/datatables/dataTables.bootstrap4.min.css') }}">

    <!-- Tags input css -->
    <link rel="stylesheet" href="{{ asset('packages/tagsinput/bootstrap-tagsinput.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('packages/jquery/jquery.js') }}"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.layout.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.layout.topbar')

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>All &copy; right reserved by Abdullah Almamun</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Logout">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript-->
    <script src="{{ asset('packages/bootstrap4/bootstrap.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('packages/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('packages/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>

    <!-- JS for DataTables -->
    <script src="{{ asset('packages/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('packages/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- JS for tinymce -->
    <script src="https://cdn.tiny.cloud/1/7wyduspokn9tbg1s1ash2crnk8rnzaelrvkqtf9teeq5i3x3/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- JS for Sweetalart -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tags input JS -->
    <script src="{{ asset('packages/tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('packages/tagsinput/bootstrap-tagsinput-angular.js') }}"></script>
    <script src="{{ asset('packages/tagsinput/typehead.min.js') }}"></script>

    <script src="{{ asset('admin/js/script.js') }}"></script>


    <!-- Tags input JS -->
    <script>
        let elt = $('#categories');

        if (elt) {
            let categoriesEndpoint = "{{ route('admin.get_categories') }}";
            var categories = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: {
                    url: categoriesEndpoint,
                    cache: false,
                    transform: function(response) {
                        return response;
                    }
                }
            });
            categories.initialize();
            elt.tagsinput({
                itemValue: 'id',
                itemText: 'name',
                typeaheadjs: {
                    name: 'categories',
                    displayKey: 'name',
                    source: categories.ttAdapter()
                }
            });
        }
    </script>
    @yield('customScript')
</body>

</html>
