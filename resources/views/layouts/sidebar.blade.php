<nav class="col-md-3 col-lg-2 bg-dark text-white sidebar vh-100 position-sticky">
    <div class="d-flex flex-column align-items-center pt-3 h-100">
        <h4 class="fw-bold">Perpustakaan</h4>
        <hr class="border-light w-75">
        <ul class="nav flex-column w-100">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'text-primary fw-bold' : 'text-light' }}"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door"></i>
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/buku*') ? 'text-primary fw-bold' : 'text-light' }}"
                    href="{{ route('dashbook') }}">
                    <i class="bi bi-search"></i> Cari Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/pinjaman-buku*') ? 'text-primary fw-bold' : 'text-light' }}"
                    href="{{ route('siswa-pinjam') }}">
                    <i class="bi bi-book"></i>
                    Buku Pinjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/riwayat*') ? 'text-primary fw-bold' : 'text-light' }}"
                    href="{{ route('riwayat') }}">
                    <i class="bi bi-clock-history"></i>
                    Riwayat Peminjaman
                </a>
            </li>
            @if (Auth::user()->role === 'guru')
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('admin') }}">
                        <i class="bi bi-layout-text-window-reverse"></i>
                        Dashboard Guru
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard/profile') ? 'text-primary fw-bold' : 'text-light' }}"
                    href="{{ route('profile') }}">
                    <i class="bi bi-gear"></i>
                    Pengaturan
                </a>
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
