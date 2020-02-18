<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends MotbitModel
{
    protected $table='category_translations';
    public function posts()
    {
        return $this->belongsToMany('App\Models\PostTranslation');
    }
}
