<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\ValidatePostRequest;
use App\Tables\Builders\Admin\CategoryTable;
class CategoryTableController extends Controller
{
    use Datatable;
    protected $tableClass = CategoryTable::class;

    public function destroy(Category $category)
    {
        $category->delete();
        return [
            'message' => __('The Category was successfully deleted'),
            'redirect' => 'admin.categories',
        ];
    }

    // public function create(PostForm $form)
    // {
    //     return ['form' => $form->create()];
    // }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' CategoryTableController-> store');
        }
        $categorie = Category::create($request->all());

        return [
            'message' => __('The categorie was successfully created'),
            'redirect' => 'admin.categorie.edit',
            'param' => ['categorie' => $categorie->id],
        ];
    }
    public function show(Category $categorie) {
        return ['categorie', $categorie];
    }

    // public function edit(Post $categorie, PostForm $form) {
    //     return ['form' => $form->edit($post)];
    // }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}
