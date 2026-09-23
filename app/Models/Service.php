<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'icon', 'image'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
