<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
class LangController extends Controller
{
    //
    public function setLanguage($language)
    {
        Session::put('language', $language);
        /*
        if(env('APP_DEBUG', false) == true) {
            Log::info('LangController->setLanguage->session->language:'.Session::get('language'));
        }
        */
        return $language;
    }
}
