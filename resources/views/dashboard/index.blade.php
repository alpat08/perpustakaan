@extends('layouts.main')

@section('container')
    <div class="container py-4">
        <div class="card rounded-4 shadow-sm">
            <div class="card-body">

                <div class="row my-4">
                    <div class="col-12 col-md-6 my-3">
                        <a href="{{ route('siswa-pinjam') }}">
                            <div class="card bg-primary text-white shadow-lg" style="height: 160px">
                                <div class="card-body">
                                    <h5 class="card-title"> Buku Dipinjam</h5>
                                    {{-- @dd($pinjam) --}}
                                    @if (Auth::user()->pinjamAktif)
                                        <p class="card-text fs-4 fw-bold">{{ $pinjam->buku->title }}</p>
                                        <p>Sedang dipinjam saat ini</p>
                                    @else
                                        <p class="card-text fs-6 fw-bold">Belum meminjam buku</p>
                                        <p>Sedang dipinjam saat ini</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 my-3">
                        <div class="card bg-warning text-dark shadow-lg" style="height: 160px">
                            <div class="card-body">
                                <h5 class="card-title"> Batas Pengembalian</h5>
                                @if (Auth::user()->pinjamAktif)
                                    <p class="card-text fs-4 fw-bold">{{ $pesan }}</p>
                                    <p>Jangan sampai telat ya!</p>
                                @else
                                    <p class="card-text fs-4 fw-bold">-</p>
                                    <p>Jangan sampai telat ya!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mt-4"> Buku Sedang Dipinjam</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Batas Pengembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pinjams as $item)
                                <tr>
                                    <td>{{ $item->buku->title }}</td>
                                    <td>{{ $item->buku->author }}</td>
                                    <td>{{ $item->tanggal_pinjam->translatedFormat('d F Y') }}</td>
                                    @if ($item->tanggal_kembali === null)
                                        <td class="fw-medium">Belum disetujui oleh guru</td>
                                    @else
                                        <td>{{ $item->tanggal_kembali->translatedFormat('d F Y') }}</td>
                                    @endif
                                    <td>
                                        @switch($item->status)
                                            @case('menunggu_persetujuan')
                                                <span class="badge bg-warning">Menunggu Persetujuan</span>
                                            @break

                                            @case('dipinjam')
                                                <span class="badge bg-primary">Dipinjam</span>
                                            @break

                                            @case('dikembalikan')
                                                <span class="badge bg-success">Dikembalikan</span>
                                            @break

                                            @case('terlambat')
                                                <span class="badge bg-danger">Terlambat</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">-</span>
                                        @endswitch
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
