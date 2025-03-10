@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title">Siswa</h4>
            <form class="float-end gap-3 d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search">
                <button class="btn btn-success"><i class="bi bi-search"></i></button>
                <a href="{{ route('user.index') }}" class="btn btn-primary">Clear</a>
            </form>
            <a href="{{ route('user.create') }}" class="btn btn-success my-3">Tambah</a>

            {{ $user->links() }}

            <div class="table-responsive my-4">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($user as $key => $item)
                            <tr>
                                <td>{{ $user->firstItem() + $key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-warning my-1"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('apakah yakin ingin menghapus user ini?')"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Data Tidak Ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $user->links() }}
        </div>
    </div>
@endsection