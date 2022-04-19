<?php

namespace App\Models;

use App\Mail\newUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Laravel\Sanctum\HasApiTokens;
use Mail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){

        parent::boot();

        static::created(function ($user){

            $user->profile()->create(['title'=> $user->username,]); 

            FacadesMail::to($user->email)->send(new newUserWelcomeMail);

        });


    }

    public function post(){
        return $this->hasMany(post::class)->orderBy('created_at','DESC');
    }

    public function profile(){
        return $this->hasOne(profile::class);
    }

    public function following(){
        return $this->belongsToMany(profile::class);
    }
}
