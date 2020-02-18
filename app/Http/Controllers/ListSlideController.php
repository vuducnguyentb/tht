<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Log;
class ListSlideController extends Controller
{
    use ApiMotbit;
    protected $model = 'ListSlide';
    public function processInputs($request)
    {
        if(env('APP_DEBUG', false) == true) {
            Log::info('ListSlideController->processInputs');
        }
        $rs = [
            'name' => $request->input('name', ''),
            'key' => $request->input('key', ''),
            'status' => $request->input('status', 0),
            'locale' => $request->input('locale', 'vi'),
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
            $rs['author_id'] = $user_id;
        }
        return $rs;
    }
    public function processAfterSave($request, $data)
    {
        $slides = $request->input('slides', []);
        $filterSlides = array_filter($slides, function($el) { return !empty($el['image']);});
        if(count($filterSlides)) {
            $processSlides = array_map(function($el) use ($data) {
                if (empty($el['list_slide_id'])) {
                    $el['list_slide_id'] = $data->id;
                }
                return $el;
            }, $filterSlides);
            $this->proccesRelationWithRequest(
                $data->slides(),
                $processSlides
            );
        }
    }
    public function resultOne($request, $data)
    {
        $data->load(['slides', 'author']);
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load(['slides', 'author']);
        return $data;
    }
}
