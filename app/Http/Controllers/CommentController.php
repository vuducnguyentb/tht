<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, Validator;
use App\Traits\ApiMotbit;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    use ApiMotbit;
    protected $model = 'Comment';

    public function processInputs($request)
    {
        $rs = [
            'name' => $request->input('name', ''),
            'email' => $request->input('email', ''),
            'content' => $request->input('content', ''),
            'status' => $request->input('status', 0)
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $post_id = post()->id;
            $rs['post_id'] = $post_id;
        }
        return $rs;
    }

    public function resultOne($request, $data)
    {
        $data->load('posts');
        return $data;
    }

    public function resultCollection($request, $data)
    {
        $data->load('posts');
    }
}
