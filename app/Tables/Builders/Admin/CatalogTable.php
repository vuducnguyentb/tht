<?php
namespace App\Tables\Builders\Admin;

use App\Models\Catalog;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class CatalogTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/catalogs.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("CatalogTable->query");
        }
        return Catalog::select(\DB::raw('
            `id` as `dtRowId`,
            `name`,
            `slug`,
            `body`,
            `image`,
            `link`,
            `order`,
            `status`,
            `created_at`
        '))->where('locale','=','vi');

    }
}
