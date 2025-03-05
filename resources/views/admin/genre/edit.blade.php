@extends('layouts.admin')

@section('container')
    <div class="card shadow-sm rounded-4 p-3">
        <div class="card-body">
            <h3 class="card-title">Edit genre</h3>
            <form action="{{ route('genre.update', $genre->id) }}" method="post">
                @csrf
                @method('put')
                <input type="text" name="name" value="{{ $genre->name }}"
                    class="form-control my-2 @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button class="btn btn-success">Update</button>
                <a href="{{ route('genre.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
