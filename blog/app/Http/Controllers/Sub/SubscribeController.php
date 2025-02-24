<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

class SubscribeController extends Controller
{
    public function index(User $user)
    {
        Auth::user()->subscriptions()->attach($user->id);
        Notifications::create([
            'user_id'=>$user->id,
            'category_id'=>1,
            'people_id'=>Auth::id()
        ]);
        Auth::user()->subscriptions()->syncWithoutDetaching([$user->id]);
        return redirect()->back();
    }
}
