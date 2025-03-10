<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $books = Buku::search(request(['search']))->orderBy("id")->simplePaginate(5);
        $pinjam = Buku::withCount(['pinjam' => function ($query) {
            $query->where('status', 'menunggu_persetujuan')
                ->orWhere('status', 'dipinjam')
                ->orWhere('status', 'dikembalikan')
                ->orWhere('status', 'ditolak')
                ->orWhere('status', 'terlambat');
        }])->having('pinjam_count', '>', 0)
            ->orderByDesc('pinjam_count')
            ->limit(5)
            ->get();


        // dd($pinjam);
        return view('welcome', compact('books', 'pinjam'));
    }

    public function real()
    {
        return view('rill');
    }
}
