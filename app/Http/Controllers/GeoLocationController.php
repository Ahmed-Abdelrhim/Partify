<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class GeoLocationController extends Controller
{
    public function index(Request $request)
    {
        $ip = fake()->ipv4();
        $request->server->set('REMOTE_ADDR', fake()->ipv4());
        // dd($request);
        return $data = Location::get($ip );
        dd($data);


        // git revert e4405a51e8b56afb27d92ef5ddaacdc13e0b64b6
        // git push origin master
    }
}
