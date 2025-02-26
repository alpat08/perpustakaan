@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Ganti Password</h2>

                        <form action="{{ route('update-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Password Lama</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Simpan Password</button>
                        </form>

                        <hr>

                        <div class="text-center">
                            <a href="{{ route('profile') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
