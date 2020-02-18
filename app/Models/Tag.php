<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends MotbitModel
{
    protected $table ="tags";
    protected $casts = [
        'name' => 'json',
        'slug' => 'json'
    ];
}
