<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'thumbnail',
        'summary',
        'content',
        'date_of_publication',
        'slug',
        'status',
        'sort_order',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post', 'post_id', 'tag_id');
    }
}
