<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscribersController extends Controller
{
    public function index()
    {
        if (!empty($_GET['id']) && User::find($_GET["id"])){
            $user=User::find($_GET["id"]);
        }else{
            $user=Auth::user();
        }
        return view("Sub.subscribers",compact('user'));
    }

}
