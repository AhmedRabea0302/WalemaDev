<?php

namespace App\Http\Controllers\Site;

use App\Chef;
use App\Cart;
use App\Favourite;
use App\Meal;
use App\NormalUser;
use App\Order;

use App\Ratea;
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

    public function postSearchByMeal(Request $request) {
        $meal   = $request->meal_name;
        $meals = Meal::where('name', 'LIKE', '%' . $meal . '%')->get();
        return view('site.pages.user.search_meals', compact('meals'));
    }

    public function getOneKitchen(Request $request) {
        $kitchen = Chef::find($request->ch_id);
        $meals   = Meal::where('chef_id', $request->ch_id)->get();
        $rates   = Ratea::where('chef_id', $request->ch_id)->get();

        $average = round($rates->avg('rate_number'));
        return view('site.pages.user.one-kitchen', compact('kitchen', 'meals', 'average', 'rates'));
    }

    public function getKitchenRates($id) {
        $rates = Ratea::where('chef_id', $id)->get();
        return view('site.pages.user.rates', compact('rates'));
    }

    public function addToFavourite($id, $user_id) {

        if(Favourite::where('chef_id', $id)->exists()) {
            return redirect()->back()->withC('info')->withM('هذ المطبخ في قائمتك المفضله بالفعل');
        } else {
            $favourite = new Favourite();
            $favourite->user_id = $user_id;
            $favourite->chef_id = $id;

            $favourite->save();

            return redirect()->back()->withC('success')->withM('تم إضافة المطبخ في قائمتك المفضله');
        }
    }

    public function getUserFavourites($id) {

        $normalUser = NormalUser::find($id);
        $favourites = Favourite::where('user_id', $id)->get();
        return view('site.pages.user.fave', compact('normalUser', 'favourites'));
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
        $orders = Order::where('user_id', $id)->get();
//        dd($orders);
        $normalUser = NormalUser::find($id);
        return view('site.pages.user.orders', compact('orders', 'normalUser'));
    }

    public function getUserSingleOrder(Request $request, $id, $order_id, $chef_id) {
        $orderea  = Order::find($order_id);
        $orders = Order::where('id', $order_id)->get();

        $normalUser = NormalUser::find(auth()->guard('normaluser')->user()->id);

        $orders->transform(function ($ord, $key) {
            $ord->cart = unserialize($ord->cart);
            return $ord;
        });

        return view('site.pages.user.single-order', compact('orderea', 'orders', 'normalUser'));
    }

    public function getUserRatingPage(Request $request, $id, $order_id, $chef_id) {
        $orderea  = Order::find($order_id);
        $orders = Order::where('id', $order_id)->get();

        $normalUser = NormalUser::find(auth()->guard('normaluser')->user()->id);

        $orders->transform(function ($ord, $key) {
            $ord->cart = unserialize($ord->cart);
            return $ord;
        });
        return view('site.pages.user.rate', compact('orderea', 'orders' ,'normalUser'));
    }

    public function postRateMeal(Request $request, $id, $order_id) {
        $user    = NormalUser::find($id);
        $order   = Order::find($order_id);
        $chef_id = $order->getChef()->first()->id;
        $chef    = Chef::find($chef_id);
        $rate = new Ratea();


        $rules = [
            'comment' => 'required',

        ];
        //
        $validator = Validator::make($request->all(), $rules, [
            'comment.required' => 'من فضك أدخل رأيك وتقييمك',
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $validator->errors()->all()), 'id' => 'warna'];
        }

        if(Ratea::where('order_id',$order->id)->exists()) {
            return redirect()->back()->withC('danger')->withM('لقد قمت بتقييم هذا الطلب من قبل لا يمكنك اعادة التقييم');
        } else {
            $rate->user_id     = $user->id;
            $rate->order_id    = $order->id;
            $rate->chef_id     = $chef_id;
            $rate->rate_number = $request->rate_number;
            $rate->chef_name   = $chef->name;
            $rate->user_name   = $user->name;
            $rate->comment     = $request->comment;

            $rate->image_name  = $user->image_name;

            $order->rated = 1;
            $order->save();

            $rate->save();

            return redirect()->back()->withC('success')->withM('تم التقييم بنجاح');

        }


    }

    public function getLogout() {
        auth()->guard('normaluser')->logout();
        return redirect()->route('site.getRegister');
    }
}
