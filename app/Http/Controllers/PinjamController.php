<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'buku_id' => 'required'
            ]);

            if (Auth::user()->pinjam) {
                return redirect()->back()->with('error', 'Anda sudah meminjam 1 buku');
            }

            Pinjam::create([
                'user_id' => Auth::id(),
                'buku_id' => $request->buku_id,
                'tanggal_pinjam' => now(),
            ]);

            return redirect()->back()->with('success', 'Menunggu persetujuan guru');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Pinjam buku gagal');
        }
    }

    public function update(Request $request, Pinjam $pinjam)
    {
        // dd($request->all());
        try {

            $request->validate([
                'id' => 'required'
            ]);

            $pinjam = Pinjam::find($request->id);
            // dd($pinjam);
            if ($request->submit === '1') {
                $pinjam->update([
                    'status' => 'dipinjam',
                    'tanggal_kembali' => now()->addDays(7)
                ]);

                return redirect()->back()->with('success', 'Berhasil menyetujui peminjaman buku');
            }

            if ($request->submit === '2') {
                $pinjam->update([
                    'status' => 'ditolak'
                ]);

                return redirect()->back()->with('success', 'Berhasil menolak peminjaman buku');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
