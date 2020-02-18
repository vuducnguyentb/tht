<?php
namespace App\Tables\Builders\Admin;

use App\Models\CustomerContact;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class CustomerContactTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/customercontacts.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("CustomerContactTable->query");
        }
        return CustomerContact::select(\DB::raw('
            id as dtRowId,
            email,
            phone,
            full_name,
            created_at
    '));
    }
}
