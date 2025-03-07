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
        $chart = Buku::withCount(['pinjam' => function ($query) {
            $query->where('status', 'menunggu_persetujuan')
                ->orWhere('status', 'dipinjam')
                ->orWhere('status', 'dikembalikan')
                ->orWhere('status', 'ditolak')
                ->orWhere('status', 'terlambat');
        }])->orderByDesc('pinjam_count')->get();
        $labels = $chart->pluck('title');
        $data = $chart->pluck('pinjam_count');
        // dd($labels, $data);
        // return response()->json($data);
        return view('admin.index', compact('user', 'pinjam', 'labels', 'data'));
    }

    public function peminjaman()
    {
        $pinjam = Pinjam::where('status', 'menunggu_persetujuan')->orderBy('id')->get();
        // dd($pinjam);
        return view('admin.peminjaman.index', compact('pinjam'));
    }
}
