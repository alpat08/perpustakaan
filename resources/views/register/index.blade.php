@extends('layouts.main')

@section('container')
    <div class="row justify-content-center text-center">
        <div class="col-5">
            <div class="card shadow-sm rounded-4 mt-5">
                <div class="card-body">
                    <h1>Registrasi</h1>
                    <form action="{{ route('registrasi.store') }}" method="post">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="text" id="name" name="name" placeholder="Username"
                                class="mt-2 form-control @error('name') is-invalid @enderror">
                            <label for="name">Username</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" id="email" name="email" placeholder="Email"
                            class="mt-2 form-control @error('email') is-invalid @enderror">
                            <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" id="password" name="password" placeholder="Password"
                            class="mt-2 form-control @error('password') is-invalid @enderror">
                            <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>

                        <button class="btn btn-primary mt-2">Registrasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
