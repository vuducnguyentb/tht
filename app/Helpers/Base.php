<?php
namespace App\Helpers;
use App\Models\Setting;

class Base
{
    static function getIconString($str) {
        $words = explode(" ", $str);
        $arr = array_map(function($el) {
            return substr(trim($el), 0, 1);
        },$words);
        return implode("",$arr);
    }

    static function buildCategoryIcon($post) {
        $category = $post->categories->first();
        if ($category) {
            return self::getIconString($category->name);
        }
        else {
            return 'NEW';
        }
    }

    static function getSetting($key, $default = '') {
        $setting = \App\Models\Setting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    static function getModel($modelName = null) {
        if ($modelName == 'User') {
            return app('\App\User');
        }
        if (!empty($modelName)) {
            return app('\App\Models\\'.$modelName);
        }
    }
}
