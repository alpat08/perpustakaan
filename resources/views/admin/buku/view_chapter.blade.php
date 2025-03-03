@extends('layouts.admin')

@section('container')
<div class="d-flex gap-3 float-end my-3">
    <a href="{{ route('chapters.create', $buku->id) }}" class="btn btn-success btn-sm ">Buat chapter baru</a>
    <a href="{{ route('buku.edit', $buku) }}" class="btn btn-secondary btn-sm">Kembali</a>
</div>
<table class="table">
    @foreach ($chapter as $no=>$item)
        <tr>
            <th>Chapter : {{ $no+1 }} {{ $item->name }}</th>
            <th>
                {{-- @dd($item) --}}
                <a href="{{ route('view_chapter',$item) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                <a href="{{ route('edit_chapter', $item) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
            </th>
        </tr>
        @endforeach
    </table>
@endsection