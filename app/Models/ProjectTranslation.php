<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $table="project_translations";
    public function projectimages()
    {
        return $this->hasMany(ProjectImage::class,'project_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
    public function projectcategories()
    {
        return $this->belongsTo('App\Models\ProjectCategoryTranslation', 'project_category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
