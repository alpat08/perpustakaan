<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::orderBy('id')->get();
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::orderBy('id')->get();
        // dd($genre);
        return view('admin.buku.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Buku $buku)
    {
        try {
            $data = $request->validate([
                'title' => 'required',
                'author' => 'required',
                'deskripsi' => 'required',
                'isi' => 'required|min:20',
                'image' => 'required|image',
                'genre' => 'required|array',
                'genre.*' => 'required'
            ]);

            if ($request->file('image')) {
                $data['image'] = $request->file('image')->store('buku-images');
            }
            
            $buku = Buku::create($data);
            // dd($buku, $data);
            $buku->genres()->attach($request->genre);
            return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan buku');
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Gagal menambahkan buku');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        try {
            $data = $request->validate([
                'title' => 'required',
                'author' => 'required',
                'deskripsi' => 'required',
                'isi' => 'required|min:20',
                'image' => 'required|image'
            ]);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                
                $data['image'] = $request->file('image')->store('buku-images');
            }

            $buku->update($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan buku');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan buku');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
