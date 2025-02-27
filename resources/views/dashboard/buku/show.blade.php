@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <img class="rounded-4 img-fluid" src="{{ asset('storage/' . $buku->image) }}"
                    style="background-size: cover; width: 100%; height: 350px;;" alt="{{ $buku->title }}">
            </div>
            <div class="col-md-9">
                <h3 class="fw-bolder mb-3">{{ $buku->title }}</h3>
                <small class="fw-medium">Penulis: {{ $buku->author }}</small>
                <br>
                <small class="fw-medium">Tanggal Rilis: {{ $buku->created_at->translatedFormat('d F Y') }}</small>
                <div class="mb-3">
                    <h5 class="fw-bold">Genre:</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($buku->genres as $item)
                            <span class="badge bg-primary fs-6">{{ $item->name }}</span>
                        @endforeach
                    </div>
                </div>
                <p class="text-muted"><b>Deskripsi Buku</b>
                    <br>
                    {{ $buku->deskripsi }}
                </p>
            </div>
        </div>
        {{-- @if (!Auth::user()->pinjam) --}}
        <form action="{{ route('pinjam') }}" method="post">
            @csrf
            <input type="hidden" name="buku_id" value="{{ $buku->id }}">

            @if (Auth::user()->pinjam->status === 'dipinjam')
                @if (Auth::user()->pinjam->buku_id === $buku->id)
                    <button type="submit" class="btn btn-secondary float-end" disabled>Sudah Dipinjam</button>
                @else
                    <button type="submit" class="btn btn-secondary float-end" disabled>Hanya Bisa Meminjam 1 Buku</button>
                @endif
            @else
                <button type="submit" class="btn btn-success float-end">Pinjam Buku</button>
            @endif
        </form>
        {{-- @endif --}}

        @if (Auth::user()->pinjam->status === 'dipinjam' && Auth::user()->pinjam->buku_id === $buku->id)
            <div class="row justify-content-center mt-4">
                <h5 class="border-top pt-3 text-center fw-normal">{{ $buku->isi }}</h5>
            </div>
        @endif

        <a href="{{route('dashbook')}}" class="btn btn-secondary px-3">Back</a>
    </div>
@endsection
