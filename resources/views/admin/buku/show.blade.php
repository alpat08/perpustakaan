@extends('layouts.admin')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img class="rounded-4 img-fluid" src="{{ asset('storage/' . $buku->image) }}" alt="{{ $buku->title }}">
            </div>
            <div class="col-md-6">
                <h3 class="text-decoration-underline fw-bolder text-center mb-3">{{ $buku->title }}</h3>
                <div class="mb-3">
                    <h5 class="text-info fw-bold">Genre:</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($buku->genres as $item)
                            <span class="badge bg-primary fs-6">{{ $item->name }}</span>
                        @endforeach
                    </div>
                </div>
                <p class="text-muted">{{ $buku->deskripsi }}</p>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <h5 class="border-top pt-3 text-center">{{ $buku->isi }}</h5>
        </div>
    </div>
@endsection