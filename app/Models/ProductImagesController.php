<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
class ProductImagesController extends Controller
{
    //
    use ApiMotbit;
    protected $model = 'ProductImage';
    public function projduct(){
        $this->belongsTo('App\Models\Product');
    }
}
