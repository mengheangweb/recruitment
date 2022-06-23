<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsToMany(Post::class, 'listing_tag', 'listing_id', 'tag_id');
    }
}
