@extends('layouts.admin')

@section('container')
<a href="{{ route('chapters.create') }}" class="btn btn-success btn-sm float-end my-3">Buat chapter baru</a>
<table class="table">
        <tr>
            @foreach ($buku->chapters as $no=>$item)
                <th>Chapter : {{ $no+1 }} {{ $item->name }}</th>
            @endforeach
            <th>
                <a href="" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
            </th>
        </tr>
    </table>
@endsection