<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
    public function __invoke($page)
    {
        return view('static_pages.'. $page);
    }
}
