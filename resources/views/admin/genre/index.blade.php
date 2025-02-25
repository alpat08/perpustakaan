@extends('layouts.admin')

@section('container')
    <a href="{{ route('genre.create') }}" class="btn btn-success float-end">Tambah Genre</a>
    <div class="table-responsive d-inline">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $no => $genre)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <form action="{{ route('genre.destroy', $genre->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection