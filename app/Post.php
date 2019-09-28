<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Searchable;

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'category_id', 'slug', 'title', 'body', 'featured', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function userw()
    {
        return $this->belongsTo(user::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }
}
