<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title', 'tagline', 'address', 'email', 'phone', 'link_facebook', 'link_twitter', 'link_instagram', 'link_youtube'
    ];
}
