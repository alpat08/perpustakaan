@extends('layouts.main')

@section('container')
    
<div class="row justify-content-center text-center">
    <div class="col-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1>Registrasi</h1>
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Ussername" class="mt-2 form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="text" name="email" placeholder="Email" class="mt-2 form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Password" class="mt-2 form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary btn-sm mt-2">Registrasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection