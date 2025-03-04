<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $books = Buku::orderBy('id')->get();
        return view('welcome',compact('books'));
    }
}
