<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:8',
            ],[
                'name.required' => 'Nama wajib di isi',
                'email.required' => 'Email wajib di isi',
                'password.required' => 'Password wajib di isi',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
    
            return redirect()->route('login')->with('success','Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registrasi gagal');
        }
    }

    public function login(Request $request)
    {
        try {

            $data = $request->validate([
                'login' => 'required',
                'password' => 'required|min:8'
            ], [
                'login.required' => 'Harus Di isi',
                'password' => 'Harus Di isi'
            ]);

            $user = User::where('name', $request->login)
            ->orWhere('email', $request->login)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Login gagal');
            }

            Auth::login($user);
            return redirect()->back()->with('success', 'Berhasil login');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Login gagal');
        }   
    }
}
