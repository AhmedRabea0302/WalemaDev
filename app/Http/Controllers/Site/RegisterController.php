<?php

namespace App\Http\Controllers\Site;

use App\Chef;
use App\NormalUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    public function getIndex() {
        return view('site.pages.register.index');
    }

    public function postRegister(Request $request) {
        $chef = new Chef();

        if($request->type == 'طباخ') {

            $rules = [
                'chef_name'     => 'required|min:3',
                'email'    => 'required|email|unique:chefs',
                'password'      => 'required|min:6|confirmed',
                'password_confirmation'   => 'required:min:6',
            ];
//
            $validator = Validator::make($request->all(), $rules, [
                'chef_name.required'    => 'من فضلك أدخل الاسم',
                'chef_name.min:3'       => 'أدخل اسم اكبر من 3 حروف',
                'email.required'   => 'من فضك أدخل البريد الإلكتروني',
                'email.unique'     => 'هذا البريد الالكتروني مستخدم من قبل',
                'email.email'      => 'من فضلك أدخل بريد الكتروني صحيح',
                'password.required'     => 'من فضلك أدخل كلمة السر',
                'password.min:6'        => 'كلمة السر يجب أن تكون على الأقل 6 حروف',
                'password.confirmed'    => 'كلمة السر يجب أن تتطابق',
                'password_confirmation.required' => 'من فضلك أدخل كلمة السر',
            ]);
//
            if($validator->fails()) {
                return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
            }

            $chef->name          = $request->chef_name;
            $chef->password      = bcrypt($request->password);
            $chef->password_conf = bcrypt($request->password_confirmation);
            $chef->email         = $request->email;

            $chef->save();

            return ['status' => 'success', 'data' => 'تم إنشاء الحساب بنجاح, يمكنك تسجيل الدخول الآن', 'id' => 'warna'];

        } else {

            $normalUser = new NormalUser();

            $rules = [
                'chef_name'     => 'required|min:3',
                'email'    => 'required|email|unique:chefs',
                'password'      => 'required|min:6|confirmed',
                'password_confirmation'   => 'required:min:6',
            ];
//
            $validator = Validator::make($request->all(), $rules, [
                'chef_name.required'    => 'من فضلك أدخل الاسم',
                'chef_name.min:3'       => 'أدخل اسم اكبر من 3 حروف',
                'email.required'   => 'من فضك أدخل البريد الإلكتروني',
                'email.unique'     => 'هذا البريد الالكتروني مستخدم من قبل',
                'email.email'      => 'من فضلك أدخل بريد الكتروني صحيح',
                'password.required'     => 'من فضلك أدخل كلمة السر',
                'password.min:6'        => 'كلمة السر يجب أن تكون على الأقل 6 حروف',
                'password.confirmed'    => 'كلمة السر يجب أن تتطابق',
                'password_confirmation.required' => 'من فضلك أدخل كلمة السر',
            ]);
//
            if($validator->fails()) {
                return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
            }

            $normalUser->name          = $request->chef_name;
            $normalUser->password      = bcrypt($request->password);
            $normalUser->password_conf = bcrypt($request->password_confirmation);
            $normalUser->email         = $request->email;

            $normalUser->save();

            return ['status' => 'success', 'data' => 'تم إنشاء الحساب بنجاح, يمكنك تسجيل الدخول الآن', 'id' => 'warna'];

        }


    }

    public function getLogout() {
        Auth::guard('chef')->logout();
        return redirect()->route('site.getRegister');
    }
}
