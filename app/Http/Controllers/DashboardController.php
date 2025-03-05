<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Pinjam;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $pinjam = Pinjam::where('user_id', Auth::id())->with('buku')->first();
        $pinjams = Pinjam::where('user_id', Auth::id())->with('buku')->get();
        // dd($pinjam);
        $pinjamss = Auth::user()->pinjam()->where('status', 'dipinjam')->latest()->first();
        if (!$pinjamss || !$pinjamss->tanggal_kembali) {
            $pesan = "Belum ada peminjaman aktif";
        } else {
            $daysLeft = round(now()->diffInDays($pinjamss->tanggal_kembali, false));

            if ($daysLeft > 0) {
                $pesan = "$daysLeft hari lagi";
            } elseif ($daysLeft == 0) {
                $pesan = "Hari terakhir pengembalian!";
            } else {
                $pesan = "Terlambat " . abs($daysLeft) . " hari!";
            }
        }
        // dd($daysLeft);

        return view('dashboard.index', compact('pinjam', 'pinjams', 'pesan', 'pinjamss'));
    }

    public function buku(Request $request)
    {
        $buku = Buku::search(request(['search']))->orderBy("id")->simplePaginate(5);
        // dd($request->all);
        return view('dashboard.buku.index', compact('buku'));
    }

    public function show(Buku $buku)
    {
        $chapter = $buku->chapters;
        $userPinjaman = Auth::user()->pinjam()->whereIn('status', ['menunggu_persetujuan', 'dipinjam'])->exists();
        // dd($chapter);
        return view('dashboard.buku.show', compact('buku', 'chapter', 'userPinjaman'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
    }

    public function password()
    {
        return view('dashboard.profile.password');
    }

    public function update_password(Request $request, User $user)
    {
        $data = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

        if (! Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Password salah');
        }
        $user = Auth::user();
        $user->update([
            'password' => bcrypt($request->new_password)
        ]);
        return redirect()->route('profile')->with('success', 'Berhasil mengubah password');
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('profile-images');
            $image = $data['image'];
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $image;
        $user->save();
        // dd($user);

        return redirect()->route('profile')->with('success', 'Akun berhasil diperbarui!');
    }

    public function verify()
    {
        return view('dashboard.profile.verify');
    }

    public function check(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('profile-edit');
        }
        return redirect()->back()->with('error', 'Password Salah');
    }

    public function pinjaman()
    {
        $buku = Pinjam::where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->first();
        // dd($buku);
        return view('dashboard.buku.pinjaman', compact('buku'));
    }

    public function riwayat()
    {
        $peminjaman = Pinjam::where('user_id', Auth::id())->get();
        return view('dashboard.buku.riwayat', compact('peminjaman'));
    }

    public function kembali(Request $request, Pinjam $pinjam)
    {
        try {

            $request->validate([
                'id' => 'required'
            ]);

            $pinjam = Pinjam::find($request->id);
            $tanggal_kembali = $pinjam->tanggal_kembali;
            $hari_terlambat = now()->diffInDays($tanggal_kembali, false);

            // Jika terlambat
            if ($hari_terlambat < 0) {
                $banned_days = abs($hari_terlambat) * 2; // Dihukum 2x lipat jumlah hari keterlambatan
                Auth::user()->banned_until = now()->addDays($banned_days);
                Auth::user()->save();
            }
            // dd($pinjam);

            if ($hari_terlambat >= 0) {
                $pinjam->update([
                    'status' => 'dikembalikan'
                ]);
            } else {
                $pinjam->update([
                    'status' => 'terlambat'
                ]);
            }
            return redirect()->back()->with('success', 'Buku Berhasil dikembalikan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
