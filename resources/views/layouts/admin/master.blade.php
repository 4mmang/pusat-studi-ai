<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- judul web -->
    <title>Pusat Studi Artificial Intelligence</title>
    <!-- fontawesome -->
    <link href="{{ asset('admin/master/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- datatable -->
    <link rel="stylesheet" href="{{ asset('admin/master/datatables/datatable.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('admin/master/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- css custom -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- menyertakan sidebar -->
        @include('layouts.admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- menyertakan navbar -->
                @include('layouts.admin.navbar')
                <!-- isi content -->
                @yield('content')
            </div>
        </div>
    </div>


    <!-- jquery -->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('admin/master/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/master/js/sb-admin-2.min.js') }}"></script>
    <!-- datatable -->
    {{-- <script src="{{ asset('admin/master/datatables/datatable.js') }}"></script> --}}
    <!-- validation request -->
    {{-- <script src="{{ asset('admin/assets/js/main.js') }}"></script> --}}
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('message'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ session('message') }}",
                icon: "success"
            });
        </script>
    @endif

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    @stack('scripts')
</body>

</html>
