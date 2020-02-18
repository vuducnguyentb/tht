<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\SettingsTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\SettingsForm;
use App\Models\Setting;
use App\Http\Requests\Admin\ValidatePostRequest;

class SettingTableController extends Controller
{
    use Datatable;
    protected $tableClass = SettingsTable::class;

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return [
            'message' => __('The Setting was successfully deleted'),
            'redirect' => 'admin.settings',
        ];
    }

    public function create(SettingsForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' SettingsTableController-> store');
        }
        $settings = Setting::create($request->all());

        return [
            'message' => __('The settings was successfully created'),
            'redirect' => 'admin.settings.edit',
            'param' => ['settings' => $settings->id],
        ];
    }
    public function show(Setting $settings) {
        return ['settings', $settings];
    }

    public function edit(Setting $settings, SettingsForm $form) {
        return ['form' => $form->edit($settings)];
    }
    public function update(Setting $settings) {
        return [];
    }
}