<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
        if(env('APP_DEBUG', false) == true) {
            Log::info('LangMiddleware->handle->session->language:'.Session::get('language'));
        }
        */
        if (Session::has('language')) {
            App::setLocale(Session::get('language'));
        } else {
            App::setLocale('vi');
        }
        return $next($request);
    }
}
