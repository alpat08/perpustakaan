@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Selamat Datang, {{ Auth::user()->name }}</h2>

            <div class="row">
                <div class="col-md-6 my-3">
                    <div class="card bg-primary text-white p-3">
                        <div class="card-body">
                            <h5>Total Pengguna</h5>
                            <h2>{{ $user }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-3">
                    <div class="card bg-success text-white p-3">
                        <div class="card-body">
                            <h5>Buku Dipinjam</h5>
                            <h2>{{ $pinjam }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
