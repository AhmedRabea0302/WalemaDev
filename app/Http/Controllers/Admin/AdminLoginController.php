<?php
namespace App\Http\Controllers\admin;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

//    public function __construct() {
//        $this->middleware('guest', ['except' => 'logout']);
//    }

    public function getAdminLogin() {
        if (auth()->user()) {
            return redirect()->route('admin.home');
        }
        return view('auth.login');
    }

    public function adminAuth(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('login');
        }
    }

    public function postLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
}