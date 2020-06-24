<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'password', 'remember_token','encryptedpassword',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function incidentreportings()
    {
        return $this->hasMany('App\Models\Incidentreporting', 'user_id');
    }
    
    public function computerassistance()
    {
        return $this->hasMany('App\Models\computerassistance', 'user_id');
    }
    public function staff()
    {
        return $this->hasOne('App\Models\Staff', 'user_id');
    }
}
