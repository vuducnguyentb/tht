<?php

namespace App\Models;

class Contact extends MotbitModel
{
     public function posts()
       {
         return $this->belongsToMany('App\Models\Post');
        }
}