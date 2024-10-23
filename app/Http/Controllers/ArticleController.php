<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

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

        // Store article data
        Article::create([
            'title' => $validated['title'],
            // 'min_to_read' => $validated['min_to_read'],
            'status' => Article::STATUS_PUBLISHED,
            'teaser' => $validated['content'], // This will be stored as HTML
        ]);

        return redirect()->back()->with('success', 'Article created successfully.');
    }

    public function playWithArticles(Request $request)
    {
        $random_number = rand(1, 102);
        $article = Article::find($random_number);
        if (!$article) {
            return 'Not Found Article';
        }

        return $random_number;
    }

    public function showArticles()
    {
        // $articles = Article::inRandomOrder()->take(5)->get();
        $articles = Article::take(5)->get();

        // $this->batchUpdate();

        return view('show_articles', compact('articles'));
    }

    public function batchUpdate()
    {
        $userInstance = new Article();
        $values = [
            [
                'id' => 1,
                'views_count' => 2,
                'published_at' => now(),
                'slug' => 'slug-first'
            ],
            [
                'id' => 2,
                'views_count' => 1,
            ],

            [
                'id' => 3,
                'views_count' => 0,
                'published_at' => now(),
                'slug' => 'slug-third'
            ],

            [
                'id' => 4,
                'views_count' => 4,
            ],

            [
                'id' => 5,
                'views_count' => 5,
            ],
        ];
        $index = 'id';

        batch()->update($userInstance, $values, $index);
    }

    public function viewArticles($id, Request $request)
    {
        // fetching article.
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article not found']);
        }

        // Randomly change IP for testing.
        $ip = fake()->ipv4();
        request()->server->set('REMOTE_ADDR', $ip);

        // calculate view count for an article.
        $article->logView();

        // returning the article & view count to user.
        return view('view_article', compact('article'));
    }
}
