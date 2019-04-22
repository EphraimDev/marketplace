<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'role', 'email', 'password', 'phone', 
        'title', 'image_url', 'image_name'
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

    // protected $with = ['therapist'];


    //Table Relationships: Don't edit any relationship if you are not sure
    public function therapist()
    {
        return $this->hasOne('App\Therapist', 'user_id', 'id')->withDefault();
    }

    public function userAppointments()
    {
        return $this->hasMany('App\Appointment', 'user_id', 'id');
    }

    public function therapistAppointments()
    {
        return $this->hasMany('App\Appointment', 'therapist_id', 'id');
    }
}
