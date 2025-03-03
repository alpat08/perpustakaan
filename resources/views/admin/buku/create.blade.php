@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body rounded-3">
            <h4 class="card-title">Tambah Buku</h4>
            <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" value="{{old('title')}}"/>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                        id="author" value="{{old('author')}}"/>
                    @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Buku</label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi" rows="3" >{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="chapter" class="form-label">Judul Chapter</label>
                    <input type="text" name="chapter" class="form-control" id="chapter">
                </div>

                {{-- <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select multiple class="form-select @error('genre') is-invalid @enderror" name="genre" id="genre">
                        <option selected disabled>Select Genre</option>
                        <option value="">New Delhi</option>
                        @error('genre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label for="">Pilih Genre:</label>
                    <br>
                    @foreach ($genre as $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="genre_{{ $item->id }}" name="genre[]"
                                value="{{ $item->id }}" />
                            <label class="form-check-label" for="genre_{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Buku</label>
                    <img class="preview img-fluid col-sm-5 mb-3" style="max-width: 250px">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" onchange="preview()"
                        name="image" id="image" />
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <div id="extraImage"></div>
                </div> <!-- Tempat menambahkan input file tambahan -->

                <div class="mb-3">
                    <button type="button" onclick="addFileInput()" class="btn btn-outline-primary"><i
                            class="bi bi-plus-lg"></i></button>
                </div> --}}

                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>


    <script>
        // let fileIndex = 1; // Untuk memberi ID unik pada setiap input file tambahan

        // function addFileInput() {
        //     const extraImagesDiv = document.getElementById('extraImage');

        //     // Buat elemen div pembungkus
        //     const fileWrapper = document.createElement('div');
        //     fileWrapper.setAttribute("id", "image-" + fileIndex);
        //     fileWrapper.classList.add('mb-3', 'd-flex', 'gap-3');

    

        //     // Buat elemen input file
        //     const fileInput = document.createElement('input');
        //     fileInput.setAttribute("type", "file");
        //     fileInput.setAttribute("name", "image[]");
        //     fileInput.setAttribute("onchange", "preview()");
        //     fileInput.classList.add('form-control');

        //     // Buat tombol hapus
        //     const removeButton = document.createElement('button');
        //     removeButton.innerText = "Hapus";
        //     removeButton.classList.add('btn', 'btn-danger');
        //     removeButton.setAttribute("type", "button");
        //     removeButton.onclick = function() {
        //         fileWrapper.remove();
        //     };

        //     // Masukkan input file dan tombol hapus ke div pembungkus
        //     fileWrapper.appendChild(fileInput);
        //     fileWrapper.appendChild(removeButton);

        //     // Tambahkan ke form
        //     extraImagesDiv.appendChild(fileWrapper);

        //     fileIndex++; // Tambah index agar unik
        // }

        // document.getElementById('form').addEventListener('submit', function() {
        //     event.preventDefault();
        // })

        function preview() {
            const image = document.querySelector('#image');
            const preview = document.querySelector('.preview');

            preview.style.display = 'block';

            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            reader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
