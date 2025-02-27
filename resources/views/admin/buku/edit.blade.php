@extends('layouts.admin')

@section('container')

    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title mb-3">Edit Buku</h4>
            <form method="POST" action="{{route('buku.update', $buku->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" value="{{old('title', $buku->title)}}"
                        class="form-control @error('buku') is-invalid @enderror" name="title" id="title" />
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" value="{{old('author', $buku->author)}}"
                        class="form-control @error('author') is-invalid @enderror" name="author" id="author" />
                    @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                        rows="3">{{ $buku->deskripsi }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Buku</label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi"
                        rows="3">{{ $buku->isi }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    @foreach ($genres as $genre)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="genre_{{ $genre->id }}" name="genre[]"
                                value="{{ $genre->id }}" {{ $buku->genres->contains($genre->id) ? 'checked' : '' }} />
                            <label class="form-check-label" for="genre_{{ $genre->id }}">{{ $genre->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ $buku->image }}">
                    @if ($buku->image)
                        <img src="{{ asset('storage/' . $buku->image) }}" style="max-width: 250px" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                        onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <a href="{{route('buku.index')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection