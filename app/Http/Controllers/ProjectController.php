<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use App\Traits\ApiMotbit;
use App\Models\ProjectImage;
use App\Models\Partner;
use Carbon\Carbon;
use App\Models\ProjectTranslation;
use App\Models\PostCategoryTranslation;

class ProjectController extends Controller
{
    use ApiMotbit;
    protected $model = 'Project';
    public function processInputs($request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,id|max:255',
        ]);
        $rs = [
            'title' => $request->input('title', ''),
            'body' => $request->input('body', ''),
            'slug' => $request->input('slug', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', 0),
            'project_category_id' => $request->input('projectcategories', ''),
            'locale' => $request->input('locale', 0),
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
        $categories = $request->input('projectcategories', []);
        if (is_array($categories)) {
            $data->projectcategories()->sync($categories);
        }

        $images = $request->input('images', []);
        $filterImages = array_filter($images, function($el) { return !empty($el['image']);});
        if(count($filterImages)) {
            $processImages = array_map(function($el) use ($data) {
                if (empty($el['project_id'])) {
                    $el['project_id'] = $data->id;
                }
                return $el;
            }, $filterImages);
            $this->proccesRelationWithRequest(
                $data->images(),
                $processImages
            );
        }
    }
    public function resultOne($request, $data)
    {
        $data->load(['projectcategories', 'author', 'images']);
        return $data;
    }
    public function resultCollection($request, $data)
    {
        $data->load(['projectcategories', 'author']);
        return $data;
    }
    public function getProject()
    {
        $model = $this->getModel()->where('locale','=','vi');
        $projectimages = $model->with('projectimages')->get();
        $project=$model->active()->orderBy('created_at')->paginate(8);
        $model_cate = $this->getModel("ProjectCategory")->where('locale','=','vi');
        $cate = $model_cate->with('projects')->orderBy('created_at')->get();
        $partners= $this->getModel('Partner')->where('locale','=','vi')->active()->orderBy('created_at')->get();
        //check null exception
            return view('themes.tht.project.list',compact('project','projectimages','cate','partners'));

    }
    public function getProjectTran(){
        $model = $this -> getModel("ProjectTranslation");
        $projectimages = $model->with('projectimages')->get();
        $project=$model->active()->orderBy('created_at')->paginate(8);
        $model_cate = $this->getModel("ProjectCategoryTranslation");
        $cate = $model_cate->with('projects')->orderBy('created_at')->get();

        $partners= $this->getModel('Partner')->active()->orderBy('created_at')->get();

        //check null exception
        return view('themes.tht.project.list',compact('project','projectimages','cate','partners'));
    }


    public function detailProject($slug)
    {
        Carbon::setLocale('vi'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        $model_cate = $this->getModel('ProjectCategory')->where('locale','=','vi');
        $cate=$model_cate->orderBy('created_at')->get();
        $model = $this->getModel()->where('locale','=','vi');
        $project=$model->where('slug',$slug)->first();
        if(empty($project)){
            return view('themes.tht.errors.404');
        }

        $projectImages=ProjectImage::where('project_id',$project->id)->where('locale','=','vi')->get();
        $all = $model->with('projectimages')->active()->orderBy('created_at')->take(3)->get();
        $partners= $this->getModel('Partner')->where('locale','=','vi')->active()->orderBy('created_at')->get();
            return view('themes.tht.project.detail',compact('project','projectImages','all','cate','partners'));

    }

    public function detailProjectTran($slug)
    {
        Carbon::setLocale('vi'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        $model_cate = $this->getModel('ProjectCategoryTranslation');
        $cate=$model_cate->orderBy('created_at')->get();

        $model = $this->getModel('ProjectTranslation');
        $project=$model->where('slug',$slug)->first();
        if(empty($project)){
            return view('themes.tht.errors.404');
        }

        $projectImages=ProjectImage::where('project_id',$project->id)->get();
        $all = $model->with('projectimages')->active()->orderBy('created_at')->take(3)->get();
        $partners= $this->getModel('Partner')->active()->orderBy('created_at')->get();
        return view('themes.tht.project.detail',compact('project','projectImages','all','cate','partners'));
    }

    public function listCate($slug){
        // set Model
        $model_cate     =   $this -> getModel("ProjectCategory")->where('locale','=','vi');
        $cate=$model_cate->orderBy('created_at')->get();
        $model_project     =   $this -> getModel("Project")->where('locale','=','vi');
        $projectImages= $this -> getModel("ProjectImage")->where('locale','=','vi');
        // find ID of category
        $cate_id = $model_cate->where('slug', $slug)->first();
     if(empty($cate_id)){
        return redirect()->route('project');
        }
        // get list Category
        $list      =   $model_cate->get();
        // get name category
        $cate_name =   $cate_id->name;
        $project   =   $model_project->where('project_category_id',$cate_id->id)->paginate(6);
        $count    = $project->total();
        $partners= $this->getModel('Partner')->where('locale','=','vi')->orderBy('created_at')->active()->get();
//        dd($cate[0]->id);
//        dd($project[0]['projectimages']->first()['image']);

            return  view('themes.tht.project.category',compact('cate_id','project','cate_name','list','count','cate','partners','projectImages'));
    }


    public function listCateTran($slug){
        // set Model
        $model_cate     =   $this -> getModel("ProjectCategoryTranslation");
        $cate=$model_cate->orderBy('created_at')->get();

        $model_project     =   $this -> getModel("ProjectTranslation");
        $projectImages= $this -> getModel("ProjectImage");

        // find ID of category
        $cate_id = $model_cate->where('slug', $slug)->first();

        if(empty($cate_id)){
            return redirect()->route('projectTran');
        }
        // get list Category
        $list      =   $model_cate->all();

        // get name category
        $cate_name =   $cate_id->name;
        $project   =   $model_project->where('project_category_id',$cate_id->id)->paginate(6);
        $count    = $project->total();
        $partners= $this->getModel('Partner')->orderBy('created_at')->active()->get();
//        dd($cate[0]->id);
//        dd($project[0]['projectimages']->first()['image']);
        return  view('themes.tht.project.category',compact('cate_id','project','cate_name','list','count','cate','partners','projectImages'));
    }
}
