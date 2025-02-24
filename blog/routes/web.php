<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/feed',[App\Http\Controllers\FeedController::class,'index'])->name('feed');
Route::get('/user/{user}',[App\Http\Controllers\UserController::class,'index'])->name('user');

Route::group(['prefix'=>"posts"],function (){
    Route::get('/create',[\App\Http\Controllers\Post\CreateController::class,'index'])->name('post.create');
    Route::post('/',[\App\Http\Controllers\Post\StoreController::class,'index'])->name('post.store');
    Route::get('/{post}',[\App\Http\Controllers\Post\ShowController::class,'index'])->name('post.show');
});
Route::group([],function (){
    Route::get("/subscribers",[\App\Http\Controllers\Sub\SubscribersController::class,'index'])->name('subscribers');
    Route::get("/subscriptions",[\App\Http\Controllers\Sub\SubscriptionsController::class,'index'])->name('subscriptions');
    Route::post('/users/{user}/subscribe', [\App\Http\Controllers\Sub\SubscribeController::class, 'index'])->name('subscribe');
    Route::delete('/users/{user}/unsubscribe', [\App\Http\Controllers\Sub\UnsubscribeController::class, 'index'])->name('unsubscribe');
});
Route::get("/notifications",[\App\Http\Controllers\Notification\IndexController::class,'index'])->name('notifications');
