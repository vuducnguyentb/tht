<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\ProjectTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Models\Project;
use App\Http\Requests\Admin\ValidatePostRequest;

class ProjectTableController extends Controller
{
    use Datatable;
    protected $tableClass = ProjectTable::class;

    public function destroy(Project $project)
    {
        $project->delete();
        return [
            'message' => __('The Project was successfully deleted'),
            'redirect' => 'admin.projects',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' ProjectTableController-> store');
        }
        $project = Project::create($request->all());

        return [
            'message' => __('The project was successfully created'),
            'redirect' => 'admin.project.edit',
            'param' => ['project' => $project->id],
        ];
    }
    public function show(Project $project) {
        return ['project', $project];
    }

    // public function edit(Service $service, PostForm $form) {
    //     return ['form' => $form->edit($service)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}