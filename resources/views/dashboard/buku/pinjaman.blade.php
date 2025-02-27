@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="card rounded-4 shadow-sm p-3">
            <div class="card-body">
                <h2 class="text-center card-title mb-4">Buku yang Sedang Dipinjam</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">
                            <img src="{{ asset('storage/' . $buku->buku->image) }}" class="card-img-top"
                                style="background-size: cover; height: 180px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $buku->buku->title }}</h5>
                                <p class="card-text">Penulis: {{ $buku->buku->author }}</p>
                                <p class="card-text"><strong>Tanggal Pinjam:</strong>
                                    {{ $buku->tanggal_pinjam->translatedFormat('d F Y') }}</p>
                                <p class="card-text"><strong>Tanggal Kembali:</strong>
                                    {{ $buku->tanggal_kembali->translatedFormat('d F Y') }}</p>
                                <a href="{{route('show', $buku->buku_id)}}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
