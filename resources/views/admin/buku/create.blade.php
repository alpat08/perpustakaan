@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title">Tambah Buku</h4>
            <form action="{{route('buku.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" />
                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                        id="author" />
                    @error('author')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                        rows="3"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Buku</label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi"
                        rows="3"></textarea>
                    @error('isi')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
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
                            <input class="form-check-input" type="checkbox" id="genre_{{$item->id}}" name="genre[]"
                                value="{{$item->id}}" />
                            <label class="form-check-label" for="genre_{{$item->id}}">{{$item->name}}</label>
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
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <a href="{{route('buku.index')}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>


    <script>
        function preview() {
            const image = document.querySelector('#image');
            const preview = document.querySelector('.preview');

            preview.style.display = 'block';

            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            reader.onload = function (oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection