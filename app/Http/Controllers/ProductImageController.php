<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
class ProductImageController extends Controller
{
    use ApiMotbit;
    protected $model = 'ProductImage';
    public function product(){
        $this->belongsTo('App\Models\Product');
    }
}
