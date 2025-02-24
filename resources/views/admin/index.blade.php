@extends('layouts.admin')

@section('container')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Selamat Datang, {{Auth::user()->name}}</h4>
        </div>
    </div>

@endsection