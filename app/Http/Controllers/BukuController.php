<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Buku;
use App\Models\Genre;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBukuRequest;
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
    public function store(StoreBukuRequest $request, Buku $buku)
    {
        try {
            $data = $request->validated();

            if ($request->file('image')) {
                $data['image'] = $request->file('image')->store('buku-images');
                $image = $data['image'];
            }
            
            $chapter = Chapter::create([
                'name' => $request->chapter,
            ]);


            // dd($chapter);
            $buku = Buku::create([
                'title' => $request->title,
                'author' => $request->author,
                'deskripsi' => $request->deskripsi,
                'isi' => $request->isi,
                'image' => $image,
            ]);
            // dd($buku, $data);
            $buku->genres()->attach($request->genre);
            $buku->chapters()->attach($chapter->id);
            return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan buku');
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Gagal menambahkan buku');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $chapter = Chapter::orderBy('id')->get();
        $genre = Genre::orderBy('id')->get();
        return view('admin.buku.show',compact('buku','genre','chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku, Request $request)
    {
        $genres = Genre::orderBy('id')->get();
        return view('admin.buku.edit', compact('buku', 'genres'));
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
                    Storage::disk('public')->delete($request->oldImage);
                }

                $data['image'] = $request->file('image')->store('buku-images');
            }

            // dd($request->oldImage, $data);

            $buku->update($data);
            return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan buku');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan buku');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus buku');
    }

    public function chapter($title, $id) {
        $buku = Buku::find($id);
        return view('admin.buku.chapter',compact('buku'));
    }

    public function view_chapter(Buku $buku) {
        $chapter = Chapter::orderBy('id')->get();
        return view('admin.buku.view_chapter', compact('buku','chapter'));
    }

    public function create_chapter() {
        return view('admin.buku.create_chapter');
    }
}
