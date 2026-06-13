<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Galeri;
use App\Models\Lomba;

class HomeController extends Controller
{
    public function index()
    {
        $lomba   = Lomba::latest()->take(6)->get();
        $blog    = Blog::latest()->take(3)->get();
        $galeri  = Galeri::where('is_active', true)->latest()->take(9)->get();

        $stats = [
            'lomba'    => Lomba::count(),
            'peserta'  => \App\Models\Pendaftaran::count(),
            'pemenang' => Lomba::where('status', 'closed')->count(),
        ];

        return view('home', compact('lomba', 'blog', 'galeri', 'stats'));
    }
}
