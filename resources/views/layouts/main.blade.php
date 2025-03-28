<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
        }

        .sidebar {
            height: 100vh;
            top: 0;
        }

        .hover-card {
            transition: transform 0.8s ease, box-shadow 0.5s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.15)
        }
    </style>
</head>

<body class="bg-secondary-subtle" id="top">


    @include('layouts.header')


    @if (Auth::guest())
        <div class="py-4 ">
            @yield('container')
        </div>
    @endif

    @if (Auth::check())
        <div class="container-fluid">
            <div class="row">
                @include('layouts.sidebar')

                <main class="col-12 col-sm-12 col-md-8 ms-sm-auto col-lg-9 px-lg-0">
                    @yield('container')
                </main>
            </div>
        </div>
    @endif

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
        @if (session()->has('success'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('success') }}',
                icon: 'success'
            })
        @endif
        @if (session()->has('error'))
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error'
            })
        @endif
    </script>
</body>

</html>
