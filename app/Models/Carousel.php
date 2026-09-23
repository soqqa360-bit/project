<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'image'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
