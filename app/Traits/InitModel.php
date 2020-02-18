<?php
namespace App\Traits;

trait InitModel {
    protected function getModel($modelName = null)
    {
        if ($modelName == 'User') {
            return app('\App\User');
        }
        if (!empty($modelName)) {
            return app('\App\Models\\'.$modelName);
        }
        if ($this->model == 'User') {
            return app('\App\User');
        }
        return app('\App\Models\\'.$this->model);
    }
}
