<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taggable extends MotbitModel
{
    protected $table ="taggables";
    public $timestamps = false;
}
