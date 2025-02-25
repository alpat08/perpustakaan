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
</head>

<body class="bg-light">


    <nav class="navbar navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <div class="d-flex justify-content-start gap-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin')}}">Dashboard</a>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" style="max-width: 250px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        Dashboard
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link fs-5 {{Request()->is('admin') ? 'text-primary fw-bold' : ''}}"
                                href="{{route('admin')}}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 {{Request()->is('admins/user*') ? 'text-primary fw-bold' : ''}}"
                                href="{{route('user.index')}}">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 {{Request()->is('admins/buku*') ? 'text-primary fw-bold' : ''}}"
                                href="{{route('buku.index')}}">Buku</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="nav-link fs-5 text-danger"
                                    onclick="return confirm('Tetap logout?')">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



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