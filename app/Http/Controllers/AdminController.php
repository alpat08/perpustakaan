<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'siswa')->count();
        $pinjam = Pinjam::where('status', 'dipinjam')->count();

        $chartData = [];

        for ($i = 1; $i <= 12; $i++) {
            $data = Buku::withCount(['pinjam' => function ($query) use ($i) {
                $query->whereMonth('created_at', $i)
                    ->whereIn('status', ['dipinjam', 'dikembalikan', 'ditolak', 'terlambat']);
            }])->havingRaw('pinjam_count > 0') // Hanya ambil buku dengan pinjaman lebih dari 0
                ->orderByDesc('pinjam_count')
                ->get();

            $chartData[$i] = [
                'labels' => $data->pluck('title')->toArray(),
                'data' => $data->pluck('pinjam_count')->toArray(),
            ];
        }

        return view('admin.index', compact('user', 'pinjam', 'chartData'));
    }

    public function peminjaman()
    {
        $pinjam = Pinjam::where('status', 'menunggu_persetujuan')->orderBy('id')->get();
        // dd($pinjam);
        return view('admin.peminjaman.index', compact('pinjam'));
    }
}
