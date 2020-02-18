<?php

namespace App\Models;

class ProjectImage extends MotbitModel
{
    protected $table="project_images";

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    public function projecttranslation()
    {
        return $this->belongsTo(ProjectTranslation::class);
    }
}
