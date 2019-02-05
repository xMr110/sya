<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name','email','password','role'
    ];
    protected $hidden = [
        'password','remmeber_token',
    ];

    public function posts()
    {
       return $this->hasMany(Post::class);
    }
    public function whatwedos()
    {
        return $this->hasMany(Whatwedo::class);
    }


}
