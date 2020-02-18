<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiMotbit;
class GuestController extends Controller
{
    use ApiMotbit;
    protected $model = 'Guest';
   
    public function getGuest(){
    
        // get Guet in VietNam
        $guestVN= $model->where('status',0)->get();
        // get Guest foreign
        $guestForeign= $model->where('status',1)->get();

    }
}
