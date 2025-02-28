@extends('layouts.admin')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center mt-4">
            @foreach ($buku->ceritas as $item)
                <h5>{{ $item->isi }}</h5>                
            @endforeach
        </div>
    </div>
@endsection