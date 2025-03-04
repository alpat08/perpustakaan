@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div>
            <a href="{{ route('buku.edit', $buku) }}" class="btn btn-secondary btn-sm float-end">Kembali</a>
            <a href="{{ route('chapters.create', $buku->id) }}" class="btn btn-success btn-sm float-end mx-2">Buat chapter
                baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    @foreach ($chapter as $no => $item)
                        <tr>
                            <th>Chapter : {{ $no + 1 }} {{ $item->name }}</th>
                            <th>
                                <a href="{{ route('view_chapter', $item) }}" class="btn btn-info btn-sm"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ route('edit_chapter', $item) }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{route('delete_chapter', $item)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus chapter ini?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
