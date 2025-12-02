<?php

namespace App\Http\Controllers;

use App\Models\PostinganMagang;

class LandingController extends Controller
{
    public function index()
    {
        $postingans = PostinganMagang::with('spesialisasi')
            ->where('kuota', '>', 0)
            ->latest()
            ->get();

        return view('landing.landing', compact('postingans'));
    }
}