@extends('layouts.admin')

@section('container')
    <div class="card shadow-sm rounded-4 p-3">
        <div class="card-body">
            <h3 class="card-title">Tambah genre</h3>
            <form action="{{ route('genre.store') }}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Ussername"
                    class="form-control my-2 @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button class="btn btn-success">Tambahkan</button>
                <a href="{{ route('genre.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
