<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotbitModel extends Model
{
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
