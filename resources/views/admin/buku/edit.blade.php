@extends('dashboard/layouts/main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/produk/{{ $produk->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Buku</label>
                <input type="text" class="form-control @error('buku') is-invalid @enderror" name="title"
                    id="title" />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                    id="author" />
                @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3"></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi Buku</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi" rows="3"></textarea>
                @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select multiple class="form-select @error('genre') is-invalid @enderror" name="genre" id="genre">
                    <option selected disabled>Select Genre</option>
                    <option value="">New Delhi</option>
                    @error('genre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar produk</label>
                <input type="hidden" name="oldImage" value="{{ $produk->image }}">
                @if ($produk->image)
                    <img src="{{ asset('storage/' . $produk->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Body" class="form-label">Dekskripsi</label>
                <input id="body" type="hidden" name="deks" class="form-control @error('body') is-invalid @enderror"
                    value="{{ old('body', $produk->deks) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Updated produk</button>
        </form>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
