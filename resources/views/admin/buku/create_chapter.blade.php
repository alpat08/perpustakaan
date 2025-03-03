@extends('layouts.admin')

@section('container')
<h1>Buat Chapter Baru</h1>
    <div class="row py-3">
        <form action="{{ route('chapters.store', $buku->id) }}" method="post">
            @csrf
            <input type="text" name="chapter" placeholder="Judul Chapter" class="form-control py-3">
            <label for="isi" class="form-label fw-bold mt-3">Isi cerita</label>
            <textarea name="isi" id="isi" class="form-control"></textarea>
            <button class="btn btn-success mt-4 float-end">Tambahkan chapter</button>
        </form>
    </div>
@endsection