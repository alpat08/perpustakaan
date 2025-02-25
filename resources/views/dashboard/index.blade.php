@extends('layouts.main')

@section('container')
    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 me-auto">

        <!-- Card Info -->
        <div class="row my-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title"> Buku Dipinjam</h5>
                        <p class="card-text fs-4 fw-bold">3 Buku</p>
                        <p>Sedang dipinjam saat ini</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title"> Batas Pengembalian</h5>
                        <p class="card-text fs-4 fw-bold">2 Hari Lagi</p>
                        <p>Jangan sampai telat ya!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title"> Buku Populer</h5>
                        <p class="card-text fs-4 fw-bold">"Harry Potter"</p>
                        <p>J.K. Rowling</p>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Matematika Dasar</td>
                        <td>Ahmad Dahlan</td>
                        <td>20 Feb 2025</td>
                        <td>27 Feb 2025</td>
                        <td><span class="badge bg-success">Aman</span></td>
                        <td><a href="#" class="btn btn-sm btn-warning"> Perpanjang</a></td>
                    </tr>
                    <tr>
                        <td>Sejarah Indonesia</td>
                        <td>Sri Hartono</td>
                        <td>18 Feb 2025</td>
                        <td>25 Feb 2025</td>
                        <td><span class="badge bg-danger">Tersisa 1 Hari</span></td>
                        <td><a href="#" class="btn btn-sm btn-warning"> Perpanjang</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
