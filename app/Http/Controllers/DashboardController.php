<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        Auth::user()->update([
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
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

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
}
