<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork; // Make sure your Artwork model exists

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
        return view('frontend.blog');
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