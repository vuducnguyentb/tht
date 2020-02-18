<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\ProjectCategoryTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\PostForm;
use App\Models\ProjectCategory;
use App\Http\Requests\Admin\ValidatePostRequest;

class ProjectCategoryTableController extends Controller
{
    use Datatable;
    protected $tableClass = ProjectCategoryTable::class;

    public function destroy(ProjectCategory $projectcategorie)
    {
        $projectcategorie->delete();
        return [
            'message' => __('The ProjectCategory was successfully deleted'),
            'redirect' => 'admin.projectcategories',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' ProjectCategoryTableController-> store');
        }
        $projectcategorie = ProjectCategory::create($request->all());

        return [
            'message' => __('The projectcategorie was successfully created'),
            'redirect' => 'admin.projectcategorie.edit',
            'param' => ['projectcategorie' => $projectcategorie->id],
        ];
    }
    public function show(ProjectCategory $projectcategorie) {
        return ['projectcategorie', $projectcategorie];
    }

    // public function edit(ProjectCategory $projectcategorie, PostForm $form) {
    //     return ['form' => $form->edit($projectcategorie)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}