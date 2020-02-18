<?php

namespace App\Models;

class Partner extends MotbitModel
{
    protected $table="partners";
    protected $fillable = ['name', 'body', 'image', 'slug','status','order','locale'];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
