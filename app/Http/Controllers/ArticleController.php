<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'min_to_read' => 'required|integer',
            'content' => 'required',
        ]);

        // return $request;

        // Store article data
        Article::create([
            'title' => $validated['title'],
            // 'min_to_read' => $validated['min_to_read'],
            'teaser' => $validated['content'], // This will be stored as HTML
        ]);

        return redirect()->back()->with('success', 'Article created successfully.');
    }
}
