<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;

class TestimonialController extends Controller
{
    use ApiMotbit;
    protected $model = 'Testimonial';
    public function processInputs($request)
    {
        $rs = [
            'author' => $request->input('author', ''),
            'content' => $request->input('content', ''),
            'avatar' => $request->input('avatar', ''),
            'order' => $request->input('order', 0),
            'status' => $request->input('status', 0)
        ];
        return $rs;
    }
}
