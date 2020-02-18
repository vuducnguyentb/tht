<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table="service_categories";

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
    protected $fillable = ['name', 'slug','locale'];

  
}
