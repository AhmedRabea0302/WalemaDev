<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    public function getIndex() {
        $panel_users = User::all();
        return view('admin.pages.users.index', compact('panel_users'));
    }

    public function postAddUser(Request $request) {
        $user = new User();
        $rules = [
            'user_name' => 'required',
            'email' => 'email|unique:users|required',
            'user_pass' => 'required|min:4'
        ];


        $validator = Validator::make($request->all(), $rules, [
            'user_name.required'  => 'Please Enter A Username',
            'email.required'      => 'Please Enter An Email',
            'email.email   '      => 'Please Enter A Valid Email',
            'email.unique'        => 'This Email Has Already Been Taken',
            'user_pass.required'  => 'Please Enter A Password',
            'user_pass.min'       => 'The Password Must Be 4 or More',
        ]);

        if($validator->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
        }

        $user->name     = $request->user_name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->user_pass);

        $user->save();

        return ['status' => 'success' ,'data' => 'User Added Successfully', 'id' => 'warna'];

    }

    public function postUpdateUser(Request $request) {
        $user = User::find($request->id);

        $rules = [
            'new_name'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'new_name.required'   => 'Please Enter A Username',
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        if(($request->new_name) != '' ) {
            $user->name = $request->new_name;
        }

        if($request->new_password != '') {
            $user->password = bcrypt($request->new_password);
        }

        $user->update();

        session()->push('m', 'success');
        session()->push('m', 'Updated Successfully');

        return ['status' => 'success', 'data' => 'User Updated Successfully', 'id' => 'update-user'];
    }

    public function postDeleteUser(Request $request) {
        User::destroy(($request->id));
        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }

}
