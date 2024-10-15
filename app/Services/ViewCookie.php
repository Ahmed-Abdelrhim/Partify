<?php
namespace App\Services;
use App\Interfaces\IViewService;
use Illuminate\Support\Facades\Cookie;

class ViewCookie implements IViewService
{
    public function getViews($request = null): int
    {
        return $post_id = 20;

        // $cookieName = 'post_' . $post_id . '_viewed';

        // if (!$request->hasCookie($cookieName)) {
        //     // Set a cookie that expires in 1 day (or any duration you want)
        //     Cookie::queue($cookieName, 'true', 1440); // 1440 minutes = 1 day

        //     // Increment the views count
        //     $post->increment('views');
        // }


    }
}
