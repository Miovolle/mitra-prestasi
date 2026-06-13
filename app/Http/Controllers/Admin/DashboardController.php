<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Galeri;
use App\Models\Lomba;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_lomba'      => Lomba::count(),
            'lomba_aktif'      => Lomba::where('status', 'open')->count(),
            'total_pendaftar'  => Pendaftaran::count(),
            'menunggu'         => Pendaftaran::where('status', 'menunggu')->count(),
            'total_blog'       => Blog::count(),
            'total_galeri'     => Galeri::count(),
        ];

        $lomba_terbaru       = Lomba::latest()->take(5)->get();
        $pendaftar_terbaru   = Pendaftaran::with('lomba')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'lomba_terbaru', 'pendaftar_terbaru'));
    }
}
