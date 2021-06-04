<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        "title",
        "phone",
        "about",
        "logo"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    function halls(){
        return $this->hasMany(Hall::class,"user_id","id");
    }

    function getLogoAttribute($value){
        return URL::to("public/images/".$value);
    }

    function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
