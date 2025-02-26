<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function buku()
    {
        $buku = Buku::orderBy('id')->get();
        // $created = Carbon::parse($buku->created_at);
        return view('dashboard.buku.index', compact('buku'));
    }

    public function show(Buku $buku)
    {
        return view('dashboard.buku.show', compact('buku'));
    }
}
