<?php
namespace App\Tables\Builders\Admin;

use App\Models\Category;
use App\Models\ListSlide;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class ListSlideEnTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/listslides.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("ListSlideEnTable->query");
        }
        return ListSlide::select(\DB::raw('
            `id` as `dtRowId`,
            `name`,
            `key`,
            `created_at`
        '))->where('locale','=','en');
    }
}
