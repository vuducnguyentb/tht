<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table="project_categories";

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
    protected $fillable = ['name', 'slug','locale'];


}
