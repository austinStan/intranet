<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::latest()->get();

        return Inertia::render('News/News', ['news' => $news]);
    }

    public function show($id)
    {
        $news = News::find($id);

        return Inertia::render('SingleNews/SingleNews', ['news' => $news]);
    }
}
