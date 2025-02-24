<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $data=request()->validate([
            'title'=>'string',
            'image'=>'string',
            'content'=>'string'
        ]);
        $data['user_id']=Auth::id();
        $post=Post::create($data);
        foreach (Auth::user()->subscribers as $subscriber){
            Notifications::create([
                'user_id'=>$subscriber->id,
                'category_id'=>2,
                'people_id'=>Auth::id(),
                "post_id"=>$post->id
            ]);
        }
        return redirect()->route('feed');
    }
}
