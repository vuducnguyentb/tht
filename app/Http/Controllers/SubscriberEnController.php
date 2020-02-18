<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, Validator;
use App\Traits\ApiMotbit;
use App\Models\Subscriber;
class SubscriberEnController extends Controller
{
    use ApiMotbit;
    protected $model = 'Subscriber';

    public function processInputs($request)
    {
        $rs = [
            'email' => $request->input('email', ''),
            'status' => $request->input('status', 0),
            'locale' => $request->input('locale', 'vi')
        ];
        return $rs;
    }

    public function postSubscriber(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:subscribers',
            'name' => 'required',

        ], [
            'email.required' => 'Enter your email',
            'email.unique'=>'Email has been registered',
            'name.required' => 'Enter your first name'
        ]);
          if($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }

        $contact = new Subscriber;

        $contact->email = $req->email;
        $contact->name = $req->name;

        $contact->save();
        return response()->json($req->all());
    }
}
