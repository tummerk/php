<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function subscriptions()
    {
        return $this->belongsToMany(User::class,'subs','user_id','subscription_id');
    }
    public function subscribers()
    {
        return $this->belongsToMany(User::class,'subs','subscription_id','user_id');
    }
    public function isSub($id)
    {
        if ($id==$this->id){return true;}
        foreach ($this->subscribers as $sub){
            if ($sub->id==$id){
                return true;
            }
        }return false;
    }

    public function feedPosts()
    {
        $feedPosts=[];
        foreach ($this->subscriptions as $user){
            $feedPosts+=$user->posts->toArray();
        }
        shuffle($feedPosts);
        return $feedPosts;
    }
}
