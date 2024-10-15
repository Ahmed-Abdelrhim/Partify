<?php

namespace App\Http\Controllers;

use App\Interfaces\IViewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ViewController extends Controller
{
    public function __invoke(Request $request, IViewService $viewService)
    {
        $user = auth('api')->user();


        $count = $viewService->getViews();
        $views = 18;


        $ipAddress = $request->ip();





        return response()->json([
            'views' => $post->views,
        ], 200);
    }
}
