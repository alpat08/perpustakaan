@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body p-5">
                        <h4 class="fw-bold text-center">Edit Profil</h4>
                        <p class="text-muted text-center">Perbarui informasi akun Anda</p>

                        <!-- Form Edit Profile -->
                        <form action="{{ route('profile-update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan
                                    Perubahan</button>
                                <a href="{{ route('profile') }}" class="btn btn-outline-secondary"><i
                                        class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
