<?php

namespace App\Http\Controllers;
use App\Traits\ApiMotbit;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    use ApiMotbit;
    protected $model = 'Slides';
}
