<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('post.create');
    }
}
