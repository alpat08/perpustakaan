<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'siswa')->count();
        $pinjam = Pinjam::where('status', 'dipinjam')->count();
        
        return view('admin.index', compact('user', 'pinjam'));
    }

    public function peminjaman()
    {
        $pinjam = Pinjam::where('status', 'menunggu_persetujuan')->orderBy('id')->get();
        // dd($pinjam);
        return view('admin.peminjaman.index', compact('pinjam'));
    }
}
