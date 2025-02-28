@extends('layouts.admin')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center mt-4">
            <h5>{{ $buku->isi }}</h5>
        </div>
    </div>
@endsection