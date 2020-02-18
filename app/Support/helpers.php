<?php

use App\Helpers\Base;
use App\Helpers\Theme;

function asset_theme($url) {
   return Theme::assetsPath($url);
}

function get_site_setting($key, $default = '')
{
    return \App\Helpers\Base::getSetting($key, $default);
}
function setting_js($value){
    return html_entity_decode('&lt;script&gt;'.$value.'&lt;/script&gt;');
}

