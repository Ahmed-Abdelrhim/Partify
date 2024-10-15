<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Stack;

class PlayPlayingController extends Controller
{

    public function play()
    {

        return view('play');

        // $stack = new Stack();

        // $stack->push('Item 1');
        // $stack->push('Item 2');
        // $stack->push('Item 3');

        // $item1 = $stack->pop();
        // $item2 = $stack->pop();
        // // $item2 = $stack->pop();

        // // LIFO Data structure


        // if ($stack->isEmpty()) {
        //     echo 'The stack is empty';
        // } else {
        //     echo 'The stack is not empty';
        // }


        // return '<br />' . 'Stack Count = ' . $stack->count();

    }
}
