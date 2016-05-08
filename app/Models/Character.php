<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'realm', 'class', 'specialization', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Services\User');
    }
}
