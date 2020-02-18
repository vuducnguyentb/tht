<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table='catalogs';
    protected $fillable = ['name', 'slug', 'body', 'image', 'link', 'order', 'status','locale'];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
