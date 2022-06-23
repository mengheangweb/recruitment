<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    protected $table = "listing";
    protected $fillable = ["title", "hiring", "salary", "description", "requirment", 'user_id', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'listing_tag', 'listing_id', 'tag_id');
    }
}
