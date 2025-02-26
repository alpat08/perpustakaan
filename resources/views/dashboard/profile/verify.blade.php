@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body p-4 text-center">
                        <h4 class="mb-3">Konfirmasi Password</h4>
                        <p class="text-muted">Masukkan password Anda untuk melanjutkan.</p>

                        <form action="{{ route('check-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                                    required>
                                @if (session('error'))
                                    <div class="text-danger mt-2">{{ session('error') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Lanjutkan</button>
                            <a href="{{ route('profile') }}" class="btn btn-outline-secondary w-100 mt-2">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
