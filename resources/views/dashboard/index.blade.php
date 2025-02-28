@extends('layouts.main')

@section('container')
    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 me-auto">

        <!-- Card Info -->
        <div class="row my-4">
            <div class="col-12 col-md-6">
                <div class="card bg-primary text-white shadow-lg" style="height: 160px">
                    <div class="card-body">
                        <h5 class="card-title"> Buku Dipinjam</h5>
                        @if ($pinjam?->isEmpty())
                            <p class="card-text fs-6 fw-bold">Belum meminjam buku</p>
                            <p>Sedang dipinjam saat ini</p>
                        @else
                            <p class="card-text fs-4 fw-bold">{{ $pinjam->buku->title }}</p>
                            <p>Sedang dipinjam saat ini</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card bg-warning text-dark shadow-lg" style="height: 160px">
                    <div class="card-body">
                        <h5 class="card-title"> Batas Pengembalian</h5>
                        @if ($pinjam?->isEmpty())
                            <p class="card-text fs-4 fw-bold">-</p>
                            <p>Jangan sampai telat ya!</p>
                        @else
                            <p class="card-text fs-4 fw-bold">{{ $pinjam->tanggal_kembali->diffForhumans() }}</p>
                            <p>Jangan sampai telat ya!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Buku Sedang Dipinjam -->
        <h4 class="mt-4"> Buku Sedang Dipinjam</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Batas Pengembalian</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pinjam as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada riwayat peminjaman</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
