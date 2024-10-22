<?php

namespace App\Http\Controllers\ApiDev;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Company;


class TagController extends Controller
{
    public $pagination = 12;
    public function index(Request $request)
    {
        $search = $request->search;

        $tags = Tag::where('title', 'LIKE', $search);

        return response()->json(['data' => $tags]);
    }

    public function assignTags()
    {
        // $articles = Article::where('status', Article::STATUS_PUBLISHED)->get();

        // $tags = Tag::get();
        // $number_of_tags = rand(1, 10);

        // $shuffled_tags = $tags->shuffle()->take($number_of_tags);

        // foreach ($articles as $article) {
        //     foreach ($shuffled_tags as $tag) {
        //         $article->tags()->attach([$tag->id]);
        //     }
        // }

        return response()->json(['message' => 'Nothing have been assigned successfully!']);
    }
}
