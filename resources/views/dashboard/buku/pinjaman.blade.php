@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="card rounded-4 shadow-sm p-3">
            <div class="card-body">
                <h2 class="text-center card-title mb-4">Buku yang Sedang Dipinjam</h2>
                <div class="row justify-content-center">
                    @if (Auth::user()->pinjam->status === 'dipinjam')
                        <div class="col-md-4">
                            <div class="card hover-card shadow-sm">
                                <a href="{{ route('show', $buku->buku_id) }}">
                                    <img src="{{ asset('storage/' . $buku->buku->image) }}" class="card-img-top"
                                        style="background-size: cover; height: 180px;">
                                </a>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $buku->buku->title }}</h5>
                                    <p class="card-text">Penulis: {{ $buku->buku->author }}</p>
                                    <p class="card-text"><strong>Tanggal Pinjam:</strong>
                                        {{ $buku->tanggal_pinjam->translatedFormat('d F Y') }}</p>
                                    <p class="card-text"><strong>Batas Pengembalian:</strong>
                                        {{ $buku->tanggal_kembali->translatedFormat('d F Y') }}</p>
                                    <a href="{{ route('show', $buku->buku_id) }}" class="btn btn-primary">Detail</a>
                                    <form action="{{ route('kembali') }}" method="post" class="d-inline">
                                        @csrf
                                        {{-- @dd($buku->id) --}}
                                        <input type="hidden" name="id" value="{{ $buku->id }}">
                                        <button type="submit" class="btn btn-danger">Kembalikan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <h1 class="text-decoration-underline text-secondary">Belum Meminjam Buku.</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
