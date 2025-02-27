@extends('layouts.main')

@section('container')
    <div class="container py-4">
        <div class="card rounded-4 shadow-sm p-3">
            <div class="card-body">
                <h4 class="card-title text-center">Riwayat Peminjaman Buku</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Batas Pengembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($peminjaman as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->buku->title }}</td>
                                    <td>{{ $item->tanggal_pinjam->translatedFormat('d F Y') }}</td>
                                    @if ($item->tanggal_kembali === null)
                                        <td class="fw-medium">Belum disetujui oleh guru</td>
                                    @else
                                        <td>{{ $item->tanggal_kembali->translatedFormat('d F Y') }}</td>
                                    @endif
                                    <td>
                                        @if ($item->status === 'dipinjam')
                                            <span class="badge bg-primary">Dipinjam</span>
                                        @endif
                                        @if ($item->status === 'ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                        @if ($item->status === 'menunggu_persetujuan')
                                            <span class="badge bg-secondary">Menunggu Persetejuan</span>
                                        @endif
                                        @if ($item->status === 'dikembalikan')
                                            <span class="badge bg-success">Dikembalikan</span>
                                        @endif
                                        @if ($item->status === 'terlambat')
                                            <span class="badge bg-danger">Terlambat</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada riwayat peminjaman</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
