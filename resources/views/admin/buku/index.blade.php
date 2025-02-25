@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title">Buku</h4>
            <a href="{{route('buku.create')}}" class="btn btn-success my-2">Tambah</a>
            <div class="row">
                <div class="col-4">
                    <div class="card my-2 rounded-3">
                        <img src="" class="card-img-top" />
                        <div class="card-body">
                            <h4 class="card-title">Judul</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection