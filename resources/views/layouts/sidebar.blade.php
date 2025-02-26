<nav class="col-md-3 col-lg-2 bg-dark text-white sidebar vh-100 position-sticky">
    <div class="d-flex flex-column align-items-center pt-3 h-100">
        <h4 class="fw-bold">Perpustakaan</h4>
        <hr class="border-light w-75">
        <ul class="nav flex-column w-100">
            <li class="nav-item"><a class="nav-link text-light" href="#"><i class="bi bi-house-door"></i>
                    Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link text-light" href="{{ route('dashbook') }}"><i
                        class="bi bi-search"></i> Cari Buku</a>
            </li>
            <li class="nav-item"><a class="nav-link text-light" href="#"><i class="bi bi-book"></i> Buku
                    Pinjaman</a>
            </li>
            <li class="nav-item"><a class="nav-link text-light" href="#"><i class="bi bi-clock-history"></i>
                    Riwayat Peminjaman</a></li>
            <li class="nav-item"><a class="nav-link text-light" href="{{route('profile')}}"><i class="bi bi-gear"></i> Pengaturan</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="nav-link text-danger" onclick="return confirm('Tetap logout?')"><i
                            class="bi bi-door-open"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
