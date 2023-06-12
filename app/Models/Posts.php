<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'post-content',
        'post-img',
        'user_id',
        'shared_from'
    ];

    public function likes() {
        return $this->hasMany(Likes::class);
    }

}
