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

    public function buku(Request $request)
    {
        $buku = Buku::search(request(['search']))->orderBy("title")->simplePaginate(5);
        // dd($request->all);
        return view('dashboard.buku.index', compact('buku'));
    }

    public function show(Buku $buku)
    {
        return view('dashboard.buku.show', compact('buku'));
    }
}
