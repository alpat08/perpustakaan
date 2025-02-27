@extends('layouts.admin')

@section('container')
<a href="{{ route('create_chapter') }}" class="btn btn-success btn-sm float-end my-3"><i class="bi bi-penci"></i>Buat chapter baru</a>
<table class="table">
        <tr>
            @foreach ($buku->chapters as $item)
                <th>Chapter : {{ $item->id }} {{ $item->name }}</th>
            @endforeach
            <th>
                <a href="" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
            </th>
        </tr>
    </table>
@endsection