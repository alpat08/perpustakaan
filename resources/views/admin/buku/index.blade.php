@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title">Buku</h4>
            <a href="{{ route('buku.create') }}" class="btn btn-success my-2">Tambah</a>
            <div class="row">
                @foreach ($buku as $item)
                    <div class="col-12 col-md-4">
                        <div class="card my-2 rounded-3" style="max-width: 280px">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                style="max-width: 280px; height: 280px; background-size: cover" class="card-img-top" />
                            <div class="card-body">
                                {{-- @dd($item->genres) --}}
                                <h4 class="card-title">Judul: {{ $item->title }}</h4>
                                
                                <p class="card-text">Deskripsi: <br> {{ Str::limit($item->deskripsi, '50') }}</p>
                                <a href="{{ route('buku.show', $item->id) }}" class="btn btn-sm btn-info my-1"><i
                                        class="bi bi-eye"></i> Lihat</a>
                                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning my-1"><i
                                        class="bi bi-pencil-square"></i> Edit</a>
                                <form action="{{ route('buku.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus buku ini?')"><i
                                            class="bi bi-trash"></i>
                                        Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
