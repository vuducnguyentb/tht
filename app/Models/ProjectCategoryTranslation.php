<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategoryTranslation extends Model
{
    protected $table="project_category_translations";

    public function projects()
    {
        return $this->hasMany('App\Models\ProjectTranslation','project_category_id');
    }
    protected $fillable = ['name', 'slug'];

}
