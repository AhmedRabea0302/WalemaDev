<?php

namespace App\Http\Controllers\Site;

use App\Chef;
use App\Cart;
use App\Meal;
use App\NormalUser;
use App\Order;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    public function getIndex(Request $request) {
        $normalUser = NormalUser::find($request->id);
        return view('site.pages.user.index', compact('normalUser'));
    }

    public function getUserProfile(Request $request) {
        $normalUser = NormalUser::find($request->id);
        return view('site.pages.user.update-user', compact('normalUser'));
    }

    public function postUserProfile(Request $request) {
        $normalUser = NormalUser::find($request->id);

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'govern' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'desc' => 'required',

        ];
        //
        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'من فضك أدخل الاسم',
            'email.required' => 'من فضك أدخل البريد الإلكتروني',
            'address.required' => 'من فضك أدخل العنوان',
            'govern.required' => 'من فضك أدخل البريد المحافظة',
            'phone.required' => 'من فضك أدخل الهاتف',
            'street.required' => 'من فضك أدخل الشارع',
            'desc.required' => 'من فضك أدخل نبذه عنك',
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
        }

        $file = $request->file('photo');
        if(!empty($file)) {
            $destination = 'storage/uploads/users/';
            @unlink( $destination . $normalUser->image_name);
            $file_name = $file->getClientOriginalName();
            $file->move($destination, $file_name);
            $normalUser->image_name = $file_name;
        }

        $normalUser->name        = $request->name;
        $normalUser->email       = $request->email;
        $normalUser->phone       = $request->phone;
        $normalUser->address     = $request->address;
        $normalUser->govern      = $request->govern;
        $normalUser->street      = $request->street;
        $normalUser->description = $request->desc;
        $normalUser->status      = 0;

        $normalUser->save();

        return ['status' => 'success', 'data' => 'تم تعديل بياناتك بنجاح', 'id' => 'warna'];

    }

    public function postSearch(Request $request) {
        $govern = $request->govern;
        $type   = $request->type;

        $kitchens = Chef::where([
            ['kitchen_type', '=',  $type],
            ['kitchen_govern', '=', $govern]
        ])->get();

        return view('site.pages.user.search', compact('kitchens'));
    }

    public function getOneKitchen(Request $request) {
        $kitchen = Chef::find($request->ch_id);
        $meals   = Meal::where('chef_id', $request->ch_id)->get();
        return view('site.pages.user.one-kitchen', compact('kitchen', 'meals'));
    }

    public function getAddCart(Request $request, $id) {
        $meal    = Meal::find($id);
        $chef    = Chef::find($request->ch_id);
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart    = new Cart($oldCart);
        $cart->add($meal, $meal->id);
        $request->session()->put('cart', $cart);
        return redirect()->back();

    }

    public function getReduceByOne($id) {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart    = new Cart($oldCart);
        $cart->reduceByOne($id);

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getIncreaseByOne($id) {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart    = new Cart($oldCart);
        $cart->increaseByOne($id);

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getOrderProcess(Request $request, $id, $ch_id) {
        $kitchen = Chef::find($ch_id);

        return view('site.pages.user.order-process', compact('kitchen'));
    }

    public function postAddOrder(Request $request, $id, $ch_id) {
        if(!session()->has('cart')) {

        }

//        $rules = [
//            'name' => 'required',
//            'email' => 'required',
//            'address' => 'required',
//            'govern' => 'required',
//            'phone' => 'required',
//            'street' => 'required',
//            'desc' => 'required',
//
//        ];
//        //
//        $validator = Validator::make($request->all(), $rules, [
//            'name.required' => 'من فضك أدخل الاسم',
//            'email.required' => 'من فضك أدخل البريد الإلكتروني',
//            'address.required' => 'من فضك أدخل العنوان',
//            'govern.required' => 'من فضك أدخل البريد المحافظة',
//            'phone.required' => 'من فضك أدخل الهاتف',
//            'street.required' => 'من فضك أدخل الشارع',
//            'desc.required' => 'من فضك أدخل نبذه عنك',
//        ]);

//        if ($validator->fails()) {
//            return ['status' => false, 'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
//        }

        $oldCart = session()->get('cart');
        $cart    = new Cart($oldCart);

        $order = new Order();
        $order->cart    = serialize($cart);
        $order->user_id = $id;
        $order->chef_id = $ch_id;
        $order->deliver_date = $request->deliver_date;
        $order->deliver_time = $request->deliver_time;
        $order->deliver_address = $request->deliver_address;
        $order->deliver_plat_number = $request->deliver_plat_number;
        $order->deliver_part_number = $request->deliver_part_number;
        $order->order_requirements = $request->order_requirements;

        $order->save();

        session()->forget('cart');

        return view('site.pages.user.order-complete');
    }

    public function getUserOrders(Request $request, $id) {

    }

    public function getLogout() {
        auth()->guard('normaluser')->logout();
        return redirect()->route('site.getRegister');
    }
}
