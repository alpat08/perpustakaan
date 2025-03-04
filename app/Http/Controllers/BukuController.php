<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Buku;
use App\Models\Genre;
use App\Models\Cerita;
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
    public function store(StoreBukuRequest $request, Buku $buku, Chapter $chapter)
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

            $cerita = Cerita::create([
                'isi' => $request->isi,
            ]);

            // dd($chapter);
            $buku = Buku::create([
                'title' => $request->title,
                'author' => $request->author,
                'deskripsi' => $request->deskripsi,
                'image' => $image,
            ]);
            // dd($buku, $data);
            $buku->genres()->attach($request->genre);
            $buku->chapters()->attach($chapter->id);
            $chapter->ceritas()->attach($cerita->id);
            return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan buku');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $chapter = Chapter::orderBy('id')->get();
        $genre = Genre::orderBy('id')->get();
        return view('admin.buku.show', compact('buku', 'genre', 'chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku, Request $request)
    {

        $ceritas = $buku->chapters->flatMap(function ($item) {
            return $item->ceritas;
        });

        $genres = Genre::orderBy('id')->get();
        $chapter = Chapter::orderBy('id')->get();

        return view('admin.buku.edit', compact('buku', 'genres', 'chapter', 'ceritas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku, Chapter $chapter)
    {
        try {

            // $ceritas = $buku->chapters->flatMap(function($item) {
            //     return $item->ceritas;
            // });

            // foreach($ceritas as $item) {
            //     $item->update([
            //         'isi' => $request->isi,
            //     ]);

            // }

            $request->validate([
                'title' => 'required',
                'author' => 'required',
                'deskripsi' => 'required',
                'image' => 'nullable|image'
            ]);

            $data = [
                'title' => $request->title,
                'author' => $request->author,
                'deskripsi' => $request->deskripsi,
            ];


            if ($request->file('image')) {

                if ($request->oldImage) {
                    Storage::disk('public')->delete($request->oldImage);
                }

                $data['image'] = $request->file('image')->store('buku-images');
            }

            $buku->update($data);


            // dd($request->oldImage, $data);
            // dd(route('buku.index'));

            $buku->update($data);
            return redirect()->route('buku.index')->with('success', 'Berhasil di  update');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        try {
            if ($buku->image) {
                Storage::disk('public')->delete($buku->image);
            }

            $chapters = $buku->chapters;

            foreach ($chapters as $chapter) {
                // Ambil semua cerita sebelum detach
                $ceritas = $chapter->ceritas;

                // Hapus hubungan pivot chapter-cerita
                $chapter->ceritas()->detach();

                // Hapus semua cerita yang terkait
                foreach ($ceritas as $cerita) {
                    $cerita->delete();
                }

                // Hapus chapter setelah semua cerita dihapus
                $chapter->delete();
            }

            // Hapus hubungan pivot buku-chapter
            $buku->chapters()->detach();

            // Hapus buku
            $buku->delete();

            return redirect()->back()->with('success', 'Berhasil menghapus buku beserta semua chapter dan cerita terkait.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('gagal', 'Gagal menghapus buku beserta semua chapter dan cerita terkait.');
        }
    }


    public function chapter(Cerita $cerita)
    {
        return view('admin.buku.chapter', compact('cerita'));
    }
}
