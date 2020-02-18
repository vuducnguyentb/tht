<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Project extends MotbitModel
{
    protected $table="projects";
    public function projectimages()
    {
    	return $this->hasMany(ProjectImage::class);
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
        return $this->belongsTo('App\Models\ProjectCategory', 'project_category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
