<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-icons/font/bootstrap-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-secondary-subtle">


    @include('layouts.header')


    <div class="container py-4">
        @yield('container')
    </div>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <script>
        @if (session()->has('success'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{session('success')}}',
                icon: 'success'
            })
        @endif
        @if (session()->has('error'))
            Swal.fire({
                title: 'Error',
                text: '{{session('error')}}',
                icon: 'error'
            })
        @endif
    </script>
</body>

</html>