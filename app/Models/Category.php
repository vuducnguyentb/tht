<?php

namespace App\Models;

class Category extends MotbitModel
{
    protected $table='categories';
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

}
