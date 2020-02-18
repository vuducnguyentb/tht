<?php
namespace App\Traits;
use App\Helpers\Theme;

trait View {
    public function loadView($view, $data=[]) {
        return Theme::view($view, $data);
    }

    public function getMotbitViewPath($view) {
        return Theme::viewPath($view);
    }
}
