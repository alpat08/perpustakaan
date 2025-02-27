@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h4 class="card-title">Kelola Peminjaman</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($pinjam as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->buku->title }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>
                                    <form action="{{route('pinjam-update')}}" method="post" class="d-inline">
                                        @csrf
                                        
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit" name="submit" class="btn btn-sm btn-success" value="1"><i class="bi bi-check-lg"></i></button>
                                        <button type="submit" name="submit" class="btn btn-sm btn-danger" value="2"><i class="bi bi-x-lg"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p class="fs-2 text-center fw-medium text-decoration-underline">Belum ada yang meminjam buku.</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
