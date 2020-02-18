<?php

namespace App\Models;

use Spatie\Tags\HasTags;

class Post extends MotbitModel
{
    use HasTags;
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'post_category');
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
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale','=', $locale);
    }
    public function scopePost($query)
    {
        return $query->where('type', 'post');
    }

    protected $table="posts";
}
