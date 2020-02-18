<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends MotbitModel
{
    public function orderdetail(){
        return $this->belongsTo('App\Models\OrderDetail');
    }
    protected $fillable = ['data'];

}
