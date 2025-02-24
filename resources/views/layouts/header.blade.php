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
                    <a class="nav-link fs-5" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>