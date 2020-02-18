<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends MotbitModel
{
    protected $table='services';

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function servicecategories()
    {
        return $this->belongsTo('App\Models\ServiceCategory', 'service_category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale','=', $locale);
    }
}
