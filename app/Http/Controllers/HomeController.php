<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork; 
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function blog()
    {
        return view('frontend.blog.blog');
    }

    public function articleShow($slug)
    {
        // Find article by slug
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Increment view count (optional)
        $article->increment('views');

        // Get related articles (optional)
        $relatedArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->take(3)
            ->get();

        return view('frontend.blog.blog-details', compact('article', 'relatedArticles'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function artworks()
    {
        $artworks = Artwork::all();
        return view('frontend.artworks.artworks', compact('artworks'));
    }

    public function artworkShow($id)
    {
        // Find artwork by its slug instead of ID
        $artwork = Artwork::where('id', $id)->firstOrFail();

        return view('frontend.artworks.artwork-show', compact('artwork'));
    }
}