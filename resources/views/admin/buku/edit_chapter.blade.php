@extends('layouts.admin')

@section('container')
    <div class="mt-4">
        {{-- {{ route('update_chapter') }} --}}
        <form action="{{ route('update_chapter', $chapter) }}" method="post">
            @csrf
            <label for="chapter" class="form-label my-3">Judul Chapter</label>
            <input type="text" id="chapter" class="form-control" name="chapter" value="{{ $chapter->name }}">
            <label for="isi" class="form-label my-3">Isi chapter</label>
            @foreach ($chapter->ceritas as $item)
                <textarea name="isi" id="isi" cols="10" rows="10" class="form-control">{{ $item->isi }}</textarea>
            @endforeach
            <button class="btn btn-success">Edit chapter</button>
        </form>
    </div>
@endsection