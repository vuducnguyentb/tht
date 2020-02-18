<?php

namespace App\Models;

class Product extends MotbitModel
{
    protected $table="products";
    protected $fillable = ['product_type_id','product_cate_id', 'sku', 'name', 'price', 'excerpt', 'description', 'body', 'slug', 'status', 'meta_description', 'meta_keywords','locale'];
    public function bill_detail(){
        return $this->hasMany('App\Models\BillDetail','id_product','id');
    }

    public function producttypes()
    {
        return $this->belongsTo('App\Models\ProductType','product_type_id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }
    public function catalogs()
    {
        return $this->hasMany('App\Models\CatalogProduct');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale','=', $locale);
    }
    public function productcategories()
    {
        return $this->belongsTo('App\Models\ProductCategory','product_cate_id');
    }
}
