<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function language(){
        $this->belongsTo("App\Language");
    }
    public function mention(){
        $this->hasMany("App\Mention");
    }
    public function video(){
        $this->hasMany("App\Video");
    }
    public function videoUser(){
        $this->hasMany("App\VideoUser");
    }
    public function videoList(){
        $this->hasMany("App\VideoList");
    }
    public function suscribe(){
        $this->hasMany("App\Suscribe");
    }
}
