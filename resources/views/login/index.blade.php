@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center my-4 text-center">
            <div class="card rounded-4 shadow-sm p-3 w-100 mx-auto" style="max-width: 400px">
                <div class="card-body">
                    <h4 class="card-title text-center">Login</h4>
                    <form action="{{ route('login.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="login" class="form-label">Name/Email</label>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" name="login"
                                id="login" autofocus />
                            @error('login')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" />
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <p>Belum Punya Akun? <a href="{{ route('registrasi.create') }}">Register!</a>
                            <a href="" class="ms-5">Lupa sandi</a>
                        </p>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
