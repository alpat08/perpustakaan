<!-- Sidebar untuk Tablet & Desktop -->
<div class="d-none d-md-block bg-dark text-white vh-100 position-sticky" style="width: 250px;">
    <div class="p-3">
        <h5 class="fw-bold">Perpustakaan</h5>
        <hr class="border-light">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('dashbook') }}">
                    <i class="bi bi-search"></i> Cari Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('siswa-pinjam') }}">
                    <i class="bi bi-book"></i> Buku Pinjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('riwayat') }}">
                    <i class="bi bi-clock-history"></i> Riwayat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('profile') }}">
                    <i class="bi bi-gear"></i> Pengaturan
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Sidebar untuk Mobile (Offcanvas) -->
<div class="offcanvas offcanvas-start bg-dark text-white d-md-none" id="sidebar" style="width: 250px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('dashbook') }}">
                    <i class="bi bi-search"></i> Cari Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('siswa-pinjam') }}">
                    <i class="bi bi-book"></i> Buku Pinjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('riwayat') }}">
                    <i class="bi bi-clock-history"></i> Riwayat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('profile') }}">
                    <i class="bi bi-gear"></i> Pengaturan
                </a>
            </li>
        </ul>
    </div>
</div>
