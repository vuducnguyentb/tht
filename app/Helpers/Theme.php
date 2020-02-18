<?php
namespace App\Helpers;
class Theme
{
    static public function view($view, $data=[]) {
        $viewPath = self::viewPath($view);
        return view($viewPath, $data);
    }

    static public function viewPath($view) {
        return 'themes.' . env('THEME', 'tht') . '.' . $view;
    }

    static public function assetsPath($path) {
        return asset('themes/' . env('THEME', 'tht') . '/' . $path);
    }
}
