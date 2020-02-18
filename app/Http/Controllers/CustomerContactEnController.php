<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Theme;
use Auth, Hash, Validator;
use App\Models\{CustomerContact, Partner};
use App\Traits\ApiMotbit;

class CustomerContactEnController extends Controller
{
    use ApiMotbit;
    protected $model = 'CustomerContact';
    public function processInputs($request)
    {
        $rs = [
            'email' => $request->input('email', ''),
            'phone' => $request->input('phone', ''),
            'full_name' => $request->input('full_name', ''),
            'body' => $request->input('body', ''),
            'status' => $request->input('status', 0),
            'locale' => $request->input('locale', 'vi')
        ];
        return $rs;
    }

    public function contact()
    {
        $partners= $this->getModel('Partner')->where('locale','=','en')->orderBy('created_at')->get();
        return view('themes.tht.en.contacts.contact',compact('partners'));
    }

    public function postContact(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|max:255',

        ], [
            'email.required' => 'Email không được để trống',
            'email.max'=>'Email tối đa 255 kí tự'
        ]);



        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }

        $contact = new CustomerContact;
        $contact->full_name = $req->full_name;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->body = $req->body;
        $contact->save();
        return response()->json($req->all());
    }
}
