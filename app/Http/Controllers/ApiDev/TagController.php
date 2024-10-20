<?php

namespace App\Http\Controllers\ApiDev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get();

        return response()->json(['data' => $tags]);
    }
}
