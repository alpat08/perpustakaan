@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="row justify-content-center">
            @if (Auth::user()->banned_until && now()->lessThan(Auth::user()->banned_until))
                <p class="text-danger alert alert-warning w-75 text-center">Anda dilarang meminjam buku hingga
                    {{ Auth::user()->banned_until->translatedFormat('d F Y') }}.</p>
            @endif

            <div class="col-lg-6">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body text-center p-3">

                        <!-- Avatar -->
                        <div class="mb-3">
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D6EFD&color=fff&size=150&length=1' }}"
                                class="rounded-circle shadow-sm border" width="120" height="120" alt="User Avatar">
                        </div>

                        <!-- Nama & Email -->
                        <h2 class="fw-bold">{{ $user->name }}</h2>
                        <p class="text-muted mb-2">
                            <i class="bi bi-envelope fs-5 align-middle"></i> {{ $user->email }}
                        </p>

                        <!-- Informasi Detail -->
                        <div class="d-flex justify-content-center mt-4">
                            <div class="text-start">
                                <p class="mb-2">
                                    <i class="bi bi-person-circle fs-5 align-middle"></i>
                                    <strong>Nama Lengkap:</strong> {{ $user->name }}
                                </p>
                                <p class="mb-2">
                                    <i class="bi bi-envelope fs-5 align-middle"></i>
                                    <strong>Email:</strong> {{ $user->email }}
                                </p>
                                <p class="mb-2">
                                    <i class="bi bi-lock fs-5 align-middle"></i>
                                    <strong>Password:</strong> <span class="text-muted">••••••••</span>
                                    <a href="{{ route('password') }}" class="btn btn-link text-primary p-0 ms-2">
                                        <i class="bi bi-key fs-5 align-middle"></i> Ganti Password
                                    </a>
                                </p>
                                <p class="mb-2">
                                    <i class="bi bi-calendar-check fs-5 align-middle"></i>
                                    <strong>Bergabung:</strong> {{ $user->created_at->translatedFormat('d F Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-4">
                            <a href="{{ route('verify') }}" class="btn btn-primary px-4">
                                <i class="bi bi-pencil fs-5 align-middle"></i> Edit Profil
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
