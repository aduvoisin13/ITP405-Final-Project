<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['character_ids', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Services\User');
    }
}
