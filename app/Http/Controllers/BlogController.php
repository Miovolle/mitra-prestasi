<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blog->increment('views');
        $related = Blog::where('id', '!=', $blog->id)
            ->where('kategori', $blog->kategori)
            ->latest()->take(3)->get();
        return view('blog.show', compact('blog', 'related'));
    }
}
