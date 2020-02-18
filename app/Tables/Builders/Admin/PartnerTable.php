<?php
namespace App\Tables\Builders\Admin;

use App\Models\Partner;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class PartnerTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/partners.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("PartnerTable Query");
        }
        return Partner::select(\DB::raw('
            id as dtRowId,
            name,
            status,
            created_at
        '))->where('locale','=','vi');

    }
}
