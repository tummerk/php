<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
    public function index(Post $post)
    {
        return view('post.show',compact('post'));
    }
}
