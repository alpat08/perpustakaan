@extends('layouts.admin')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center mt-4">
            <h5>{{ $cerita->isi }}</h5>
        </div>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
