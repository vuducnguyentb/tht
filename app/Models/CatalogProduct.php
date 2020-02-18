<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogProduct extends Model
{
    protected $table = 'catalog_products';
    protected $fillable = ['product_id', 'catalog'];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
