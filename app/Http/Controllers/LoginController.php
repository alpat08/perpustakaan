<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function create()
    {
        return view('register.index');
    }

    public function store(StoreRegisterRequest $request)
    {
        try {
            $request->validated();
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'siswa'
            ]);

            return redirect()->route('login')->with('success', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registrasi gagal');
        }
    }

    public function login(StoreLoginRequest $request)
    {
        try {

            $request->validated();

            $user = User::where('name', $request->login)
                ->orWhere('email', $request->login)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Login gagal');
            }

            Auth::login($user);
            if ($user->role === ['admin', 'guru']) {
                return redirect()->route('admin')->with('success', 'Berhasil login');
            } else {
                return redirect()->route('dash')->with('success', 'Berhasil login');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Login gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('public')->with('success', 'Berhasil logout');
    }
}
