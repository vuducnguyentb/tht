<?php

namespace App\Models;

class Page extends MotbitModel
{
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale','=', $locale);
    }
}
