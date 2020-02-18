<?php
namespace App\Tables\Builders\Admin;

use App\Models\Setting;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class SettingsTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/settings.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("SettingsTable->query");
        }
        return Setting::select(\DB::raw('
            `id` as `dtRowId`,
            `key`,
            `name`,
            `value`,
            `created_at`
        '))->where('locale','=','vi');

    }
}
