<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fajar()
    {
        $user = User::orderBy('name', 'asc')->get();
        // dd($user);
        return response()->json($user);
    }
}
