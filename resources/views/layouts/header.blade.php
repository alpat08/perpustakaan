<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
        @if (Auth::check())
            <button class="navbar-toggler border-0 d-md-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
        @else
            <button class="navbar-toggler border-0 d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endif
        <div class="d-flex justify-content-between w-100 align-items-center">
            <a class="navbar-brand" href="#top">
                <img src="{{ asset('img/logo.png') }}" style="max-width: 100px">
            </a>

            @if (Auth::check())
                <div class="d-lg-none d-flex align-items-center gap-2">
                    <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                    <a href="{{ route('profile') }}">
                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0D6EFD&color=fff&size=150&length=1' }}"
                            class="rounded-circle shadow-sm border" width="40" height="40" alt="User Avatar">
                    </a>
                </div>
            @endif
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ request()->is('/') ? 'fw-bold text-primary' : 'text-dark' }}"
                            href="{{ route('public') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ request()->is('login') ? 'fw-bold text-primary' : 'text-dark' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ request()->is('registrasi') ? 'fw-bold text-primary' : 'text-dark' }}"
                            href="{{ route('registrasi.create') }}">Registrasi</a>
                    </li>
                @endif

                @if (Auth::check())
                    <li class="nav-item d-none d-lg-flex align-items-center gap-2">
                        <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                        <a href="{{ route('profile') }}">
                            <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=0D6EFD&color=fff&size=150&length=1' }}"
                                class="rounded-circle shadow-sm border" width="40" height="40" alt="User Avatar">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
