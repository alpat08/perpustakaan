@extends('layouts.main')

@section('container')
    <div class="container py-4">
        <div class="card rounded-4 shadow-sm p-3">
            <div class="card-body">
                <form class="d-flex gap-2 mb-3">
                    <input class="ms-auto rounded-3 border-1" type="search" name="search" id="search" placeholder="Search"
                        autocomplete="off" />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                    <a href="{{ route('dashbook') }}" class="btn btn-secondary">Clear</a>
                </form>


                <div class="row">
                    @forelse ($buku as $item)
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card my-3 justify-content-center align-content-stretch pb-1">
                                <a href="{{ route('show', $item->id) }}">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}"
                                        style="background-size: cover;" />
                                </a>
                                <div class="card-body">
                                    <small class="text-secondary">{{ $item->author }}</small>
                                    <a href="{{ route('show', $item->id) }}">
                                        <h4 class="card-title text-dark fw-medium fs-6">{{ $item->title }}</h4>
                                    </a>
                                    <p class="card-text">{{ $item->created_at->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <h1 class="text-decoration-underline text-secondary">Produk Tidak ditemukan</h1>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
