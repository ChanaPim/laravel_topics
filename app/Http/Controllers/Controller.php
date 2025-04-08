<?php

namespace App\Http\Controllers;

abstract class Controller
{
    function create()
    {
        return view('topicform');
    }
}
