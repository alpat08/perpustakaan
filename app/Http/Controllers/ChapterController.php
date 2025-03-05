<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Cerita;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Buku $buku)
    {
        $chapter = $buku->chapters;
        return view('admin.buku.view_chapter', compact('buku', 'chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Buku $buku)
    {
        return view('admin.buku.create_chapter', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Buku $buku, Cerita $cerita, Chapter $chapter, Request $request)
    {
        $cerita = Cerita::create([
            'isi' => $request->isi,
        ]);
        $chapter = Chapter::create([
            'name' => $request->chapter,
        ]);
        $chapter->ceritas()->attach($cerita->id);
        $buku->chapters()->attach($chapter->id);

        return redirect()->route('chapters.index', compact('buku'))->with('success', 'Chapter berhasil di tambahkan');
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
    public function update_chapter(Request $request, Chapter $chapter, Buku $buku)
    {
        // dd($chapter);
        $data = [
            'name' => $request->chapter,
        ];
        // dd($data);
        $chapter->update($data);

        $ceritas = $chapter->ceritas;

        $c = ['isi' => $request->isi];
        foreach ($ceritas as $cerita) {
            $cerita->update($c);
        }

        return redirect()->route('chapters.index', $chapter->id)->with('success', 'Chapter berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->ceritas()->detach();
        $chapter->bukus()->detach();
        $chapter->delete();
        return redirect()->back()->with('success', 'chapter berhasil di hapus');
    }

    public function view_chapter(Chapter $chapter)
    {
        $ceritas = $chapter->ceritas;

        foreach ($ceritas as $cerita) {
            return view('admin.buku.view_cerita', compact('cerita'));
        };
    }

    public function edit_chapter(Chapter $chapter)
    {
        return view('admin.buku.edit_chapter', compact('chapter'));
    }

    public function view_isi(Chapter $chapter)
    {
        $ceritas = $chapter->ceritas;
        // dd($chapter);

        return view('admin.buku.view_cerita', compact('ceritas'));
    }
}
