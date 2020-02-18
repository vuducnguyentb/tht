<?php

namespace App\Models;


class ProductImage extends MotbitModel
{
    public function product()
    {

        return $this->belongsTo('App\Models\Product');
    }
    protected $fillable = ['product_id', 'image'];
    protected $table="product_images";

}
