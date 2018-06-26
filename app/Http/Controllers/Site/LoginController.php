<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request) {

        if($request->type == 'طباخ') {

            $rules = [
                'email' => 'required',
                'password' => 'required',
            ];
            //
            $validator = Validator::make($request->all(), $rules, [
                'email.required' => 'من فضك أدخل البريد الإلكتروني',
                'password.required' => 'من فضلك أدخل كلمة السر',
            ]);

            if ($validator->fails()) {
                return ['status' => false, 'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
            }

            if (auth()->guard('chef')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('site.chef-profile', ['id' => auth()->guard('chef')->user()->id]);
            }

            else {
                return redirect()->back();
            }

        }
    }
}
