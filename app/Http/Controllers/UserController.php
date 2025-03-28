<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::search(request()->only('search'))
            ->whereIn('role', ['siswa', 'guru'])
            ->orderByRaw("FIELD(role, 'siswa', 'guru')")
            ->orderBy('name', 'asc')
            ->paginate(10);
        return view("admin.user.index", compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'role' => 'required'
            ], [
                'name.required' => 'Harus Di Isi',
                'email.required' => 'Harus Di Isi',
                'password.required' => 'Harus Di Isi',
                'role.required' => 'Harus Di Isi'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role
            ]);
            return redirect()->route('user.index')->with('success', 'Berhasil menambahkan user');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'role' => 'required'
            ], [
                'name.required' => 'Harus Di Isi',
                'email.required' => 'Harus Di Isi',
                'password.required' => 'Harus Di Isi',
                'role.required' => 'Harus Di Isi'
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role
            ]);
            return redirect()->route('user.index')->with('success', 'Berhasil mengedit user');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('succes', 'Berhasil menghapus user');
    }
}
