@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <img class="rounded-4 img-fluid" src="{{ asset('storage/' . $buku->image) }}"
                            alt="{{ $buku->title }}">
                    </div>
                    <div class="col-md-6">
                        <h3 class="fw-bolder text-center mb-3">{{ $buku->title }}</h3>
                        <div class="mb-3">
                            <h5 class="fw-bold">Genre:</h5>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($buku->genres as $item)
                                    <span class="badge bg-primary fs-6">{{ $item->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <h6 class="fw-bold">Deskripsi: </h6>
                        <p class="text-muted">{{ $buku->deskripsi }}</p>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <th>Chapter</th>
                                <th>Nama</th>
                                <th>Tindakan</th>
                            </tr>
                            @foreach ($buku->chapters as $no => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        {{-- @dd($item->ceritas) --}}
                                        @foreach ($item->ceritas as $cerita)
                                            <a class="btn btn-info btn-sm" href="{{ route('chapter', $cerita->id) }}"><i
                                                    class="bi bi-eye"></i></a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <a href="{{route('buku.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
