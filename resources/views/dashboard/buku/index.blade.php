@extends('layouts.main')

@section('container')
    <div class="container py-4">
        <div class="card rounded-4 shadow-sm p-3">
            <div class="card-body">
                <form class="d-flex gap-2 mb-3">
                    <input class="ms-auto rounded-3 border-1" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>


                <div class="row">
                    @foreach ($buku as $item)
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card justify-content-center align-content-stretch pb-1">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
