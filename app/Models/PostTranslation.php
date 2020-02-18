<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class PostTranslation extends MotbitModel
{
    use HasTags;
    public function categories()
    {
        return $this->belongsToMany('App\Models\CategoryTranslation', 'post_category_translations','post_id','category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopePost($query)
    {
        return $query->where('type', 'post');
    }

    protected $table="post_translations";
}
