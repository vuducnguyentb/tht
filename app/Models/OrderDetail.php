<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends MotbitModel
{
    public function order(){
        return $this->belongsTo('App\Models\Order','id_order');
    }
}
