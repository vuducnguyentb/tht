<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash;
use App\Traits\ApiMotbit;

class UserController extends Controller
{
    use ApiMotbit;
    protected $model = 'User';
    public function checkLogin() {
        $login = Auth::check() ? ['login' => true] : ['login' => false];
        return response()->json($login);
    }

    public function processInputs($request) {
        $validatedData = $request->validate([
            'email' => 'required|unique:users,id|email|max:255',
            'name' => 'required',
        ]);
        $rs = [
            'name' => $request->input('name', ''),
            'email' => $request->input('email', ''),
            'locale' => $request->input('locale', ''),
        ];
        $password = $request->input('password', '');
        if (!empty($password)) {
            $rs['password'] = Hash::make($password);
        }
        return $rs;
    }
}
