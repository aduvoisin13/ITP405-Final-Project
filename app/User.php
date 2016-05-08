<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Validator;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validate($data)
    {
        return Validator::make($data, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
    }
    
    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }
    
    public function comparisons()
    {
        return $this->hasMany('App\Models\Comparison');
    }
}
