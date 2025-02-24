<nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-start gap-3">
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/logo.png')}}" class="" style="max-width: 100px">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ request()->is('Beranda') ? 'fw-bold text-primary' : 'text-dark' }}"
                        href="{{ route('dash') }}">Beranda</a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ request()->is('login') ? 'fw-bold text-primary' : 'text-dark' }}"
                            href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ request()->is('registrasi') ? 'fw-bold text-primary' : 'text-dark' }}"
                            href="{{route('create')}}">Registrasi</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="nav-link fs-5"
                                onclick="return confirm('Tetap logout?')">Logout</button>
                        </form>
                    </li>
                    <div class="container mt-1">
                        <h3 class="fw-bold">{{ auth()->user()->name }}</h3>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>