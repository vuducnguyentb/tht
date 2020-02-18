<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends MotbitModel
{
    protected $table="product_types";
    protected $fillable = ['name', 'slug','product_category_id','locale'];
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function productcategories()
    {
        return $this->belongsTo('App\Models\ProductCategory','product_category_id');
    }
}
