<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use Carbon\Carbon;
use App\Traits\ApiMotbit;

class PartnerEnController extends Controller
{
    use ApiMotbit;
    protected $model = 'Partner';

    public function processInputs($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts,id|max:255',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'body' => $request->input('body', ''),
            'slug' => $request->input('slug', ''),
            'image' => $request->input('image', ''),
            'meta_description' => $request->input('meta_description', ''),
            'meta_keywords' => $request->input('meta_keywords', ''),
            'status' => $request->input('status', ''),
            'order' => $request->input('order', ''),
            'locale' => $request->input('locale', 'vi'),
        ];
        $id = $request->input('id', '');
        if (empty($id)) {
            $user_id = auth()->user()->id;
            $rs['author_id'] = $user_id;
        }
        return $rs;
    }
    public function getListPartner()
    {
        Carbon::setLocale('en'); // set langguge Vietnam
        Carbon::now('Asia/Ho_Chi_Minh'); //set time VN
        //get list blog
        $list = $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->get();
        //check null exception
        return view('themes.tht.en.partners.list', ['list' => $list]);

    }
    public function detail($slug){
        $partner=$this->getModel("Partner")->where('locale','=','en')->where('slug',$slug)->first();
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('order')->active()->get();
        if(empty($partner))
        {
            return redirect()->back();
        }
        $partner_more=$this->getModel("Partner")->where('locale','=','en')->where('id','!=',$partner->id)->get();

        return  view('themes.tht.en.partners.detail',compact('partner','partners','partner_more'));
    }
}
