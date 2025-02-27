@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="card rounded-4 shadow-sm p-3">
            <div class="card-body">
                <h2 class="text-center card-title mb-4">Daftar Buku yang Sedang Dipinjam</h2>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Buku 1">
                            <div class="card-body">
                                <h5 class="card-title">Judul Buku 1</h5>
                                <p class="card-text">Penulis: John Doe</p>
                                <p class="card-text"><strong>Tanggal Pinjam:</strong> 20 Februari 2025</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                    <!-- Buku 2 -->
                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Buku 2">
                            <div class="card-body">
                                <h5 class="card-title">Judul Buku 2</h5>
                                <p class="card-text">Penulis: Jane Smith</p>
                                <p class="card-text"><strong>Tanggal Pinjam:</strong> 18 Februari 2025</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                    <!-- Buku 3 -->
                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Buku 3">
                            <div class="card-body">
                                <h5 class="card-title">Judul Buku 3</h5>
                                <p class="card-text">Penulis: Alice Johnson</p>
                                <p class="card-text"><strong>Tanggal Pinjam:</strong> 15 Februari 2025</p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
