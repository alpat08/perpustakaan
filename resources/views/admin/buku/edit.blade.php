@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-3">Edit Buku</h4>
                <a href="{{ route('chapters.index', $buku) }}" class="btn btn-warning btn-sm">Lihat chapter</a>
            </div>
            <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" value="{{ old('title', $buku->title) }}"
                        class="form-control @error('buku') is-invalid @enderror" name="title" id="title" />
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" value="{{ old('author', $buku->author) }}"
                        class="form-control @error('author') is-invalid @enderror" name="author" id="author" />
                    @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3">{{ $buku->deskripsi }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Genre:</label>
                    <div class="row">
                        @foreach ($genres as $item)
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="genre_{{ $item->id }}"
                                        name="genre[]" value="{{ $item->id }}">
                                    <label class="form-check-label"
                                        for="genre_{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ $buku->image }}">
                    @if ($buku->image)
                        <img src="{{ asset('storage/' . $buku->image) }}" style="max-width: 250px"
                            class="img-preview img-fluid mb-3 col-sm-5 d-block">
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

                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
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
