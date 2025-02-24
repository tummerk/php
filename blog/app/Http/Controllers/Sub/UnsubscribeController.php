<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UnsubscribeController extends Controller
{
    public function index(User $user)
    {
        Auth::user()->subscriptions()->detach($user->id);
        return redirect()->back();
    }
}
