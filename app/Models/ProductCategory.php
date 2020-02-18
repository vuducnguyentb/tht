<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    public function producttypes()
    {
        return $this->hasMany('App\Models\ProductType');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected $table="product_categories";
    protected $fillable = ['name', 'slug', 'order','locale'];
}
