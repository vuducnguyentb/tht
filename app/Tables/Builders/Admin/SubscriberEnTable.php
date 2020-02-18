<?php
namespace App\Tables\Builders\Admin;

use App\Models\Subscriber;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class SubscriberEnTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/subscribers.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("SubscriberEnTable->query");
        }
        return Subscriber::select(\DB::raw('
            id as dtRowId,
            email,
            name,
            `read`,
            created_at
        '))->where('locale','=','en');

    }
}
