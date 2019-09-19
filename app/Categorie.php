<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'image'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
