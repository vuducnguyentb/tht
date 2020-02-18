<?php
namespace App\Tables\Builders\Admin;

use App\User;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class UserTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/users.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("UserTable Query");
        }
        return User::select(\DB::raw('
            id as dtRowId,
            name,
            email,
            created_at
        '));

    }
}
