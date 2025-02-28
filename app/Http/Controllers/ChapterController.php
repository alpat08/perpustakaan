<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Buku $buku)
    { 
        $chapter = Chapter::orderBy('id')->get();
        return view('admin.buku.view_chapter', compact('buku','chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buku.create_chapter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Chapter $chapter,Request $request)
    {
        // $chapter->create([
        //     'name' => $request->chapter,
        // ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
