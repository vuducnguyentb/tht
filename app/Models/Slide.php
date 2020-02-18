<?php

namespace App\Models;

class Slide extends MotbitModel
{
    protected $table ="slides";

    public function scopeLocale($query, $locale)
    {
        return $query->where('locale','=', $locale);
    }
}
