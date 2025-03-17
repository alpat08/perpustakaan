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

        $tahunTersedia = Pinjam::selectRaw('YEAR(created_at) as tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->pluck('tahun')
            ->toArray();

        $tahunSekarang = date('Y');
        $tahunList = array_unique(array_merge($tahunTersedia, [$tahunSekarang - 1, $tahunSekarang, $tahunSekarang + 1]));
        sort($tahunList); // Urutkan dari yang paling lama ke terbaru

        $chartData = [];

        for ($i = 1; $i <= 12; $i++) {
            $data = Buku::withCount(['pinjam' => function ($query) use ($i, $tahunSekarang) {
                $query->whereMonth('created_at', $i)
                    ->whereYear('created_at', $tahunSekarang)
                    ->whereIn('status', ['dipinjam', 'dikembalikan', 'ditolak', 'terlambat']);
            }])->orderByDesc('pinjam_count')->get();

            $chartData[$i] = [
                'labels' => $data->pluck('title'),
                'data' => $data->pluck('pinjam_count'),
            ];
        }

        return view('admin.index', compact('user', 'pinjam', 'chartData', 'tahunList'));
    }
    public function getChartData(Request $request)
    {
        $year = $request->query('year', date('Y')); 
        $month = $request->query('month', date('m'));

        $data = Buku::withCount(['pinjam' => function ($query) use ($month, $year) {
            $query->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->whereIn('status', ['dipinjam', 'dikembalikan', 'ditolak', 'terlambat']);
        }])->orderByDesc('pinjam_count')->get();

        return response()->json([
            'labels' => $data->pluck('title'),
            'data' => $data->pluck('pinjam_count'),
        ]);
    }

    public function peminjaman()
    {
        $pinjam = Pinjam::where('status', 'menunggu_persetujuan')->orderBy('id')->get();
        // dd($pinjam);
        return view('admin.peminjaman.index', compact('pinjam'));
    }
}
