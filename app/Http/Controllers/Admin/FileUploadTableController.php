<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Tables\Builders\Admin\UserTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\PostForm;
use App\Models\Post;
use App\Http\Requests\Admin\ValidatePostRequest;

class FileUploadTableController extends Controller
{
    use Datatable;
    protected $tableClass = UserTable::class;

    public function destroy(User $user)
    {
        $user->delete();
        return [
            'message' => __('The Users was successfully deleted'),
            'redirect' => 'admin.users',
        ];
    }

    public function create(PostForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' PostTableController-> store');
        }
        $post = Post::create($request->all());

        return [
            'message' => __('The post was successfully created'),
            'redirect' => 'admin.post.edit',
            'param' => ['post' => $post->id],
        ];
    }
    public function show(Post $post) {
        return ['post', $post];
    }

    public function edit(Post $post, PostForm $form) {
        return ['form' => $form->edit($post)];
    }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}
