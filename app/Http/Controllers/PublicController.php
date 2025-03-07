<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $books = Buku::search(request(['search']))->orderBy("id")->simplePaginate(5);
        return view('welcome', compact('books'));
    }

    public function real()
    {
        return view('rill');
    }
}
