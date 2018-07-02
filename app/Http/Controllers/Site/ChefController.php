<?php

namespace App\Http\Controllers\Site;

use App\Chef;
use App\City;
use App\Meal;
use App\NormalUser;
use App\Order;
use App\Ratea;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ChefController extends Controller
{
    public function getIndex(Request $request) {
        $chef = Chef::find($request->id);
        $meals = Meal::where('chef_id', $request->id)->get();
        return view('site.pages.chef.index', compact('chef', 'meals'));
    }

    public function getUpdateChefProfile(Request $request) {
        $chef  = Chef::find($request->id);
        $types = Type::all();
        $governs = City::all();
        return view('site.pages.chef.update-profile', compact('chef', 'types', 'governs'));
    }

    public  function postUpdateChefProfile(Request $request) {
        $chef = Chef::find($request->id);

        $rules = [
            'chef_name' => 'required',
            'chef_type' => 'required',
            'chef_govern' => 'required',
            'chef_address' => 'required',
            'chef_street' => 'required',
            'chef_phone' => 'required',
            'chef_email' => 'required',
            'chef_desc' => 'required',

        ];
        //
        $validator = Validator::make($request->all(), $rules, [
            'chef_name.required' => 'من فضك أدخل الاسم',
            'chef_type.required' => 'من فضك أدخل النوع',
            'chef_govern.required' => 'من فضك أدخل المحافظة',
            'chef_address.required' => 'من فضك أدخل البريد العنوان',
            'chef_street.required' => 'من فضك أدخل البريد الشارع',
            'chef_phone.required' => 'من فضك أدخل البريد التليفون',
            'chef_email.required' => 'من فضك أدخل البريد الإلكتروني',
            'chef_desc.required' => 'من فضك أدخل نبذه عنك',
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'data' => implode('<br />', $validator->errors()->all()), 'id' => 'warna'];
        }

        $file = $request->file('photo');
        if(!empty($file)) {
            $destination = 'storage/uploads/chefs-profile-images/';
            @unlink( $destination . $chef->image_name);
            $file_name = $file->getClientOriginalName();
            $file->move($destination, $file_name);
            $chef->image_name = $file_name;
        }

        $chef->name           = $request->chef_name;
        $chef->email          = $request->chef_email;
        $chef->phone          = $request->chef_phone;
        $chef->kitchen_type   = $request->chef_type;
        $chef->kitchen_govern = $request->chef_govern;
        $chef->address         = $request->chef_address;
        $chef->street         = $request->chef_street;
        $chef->description    = $request->chef_desc;
        $chef->status    = 0;

        $chef->save();

        return ['status' => 'success', 'data' => 'تم تعديل بياناتك بنجاح', 'id' => 'warna'];

    }

    public function getChefOrders(Request $request, $id) {
        $chef = Chef::find($id);
        $orders = Order::where('chef_id', $id)->get();
        return view('site.pages.chef.orders', compact('chef', 'orders'));
    }

    public function getChefSingleOrder(Request $request, $id, $order_id) {
        $chef = Chef::find($id);
        $order  = Order::find($order_id);
        $orders = Order::where('id', $order_id)->get();

        $orders->transform(function ($ord, $key) {
            $ord->cart = unserialize($ord->cart);
            return $ord;
        });

        return view('site.pages.chef.single-order', compact('chef', 'order', 'orders'));
    }

    public function updateChefSingleOrder(Request $request, $id) {
        $order  = Order::find($id);
        $order->status =  $request->status;
        $order->save();
        return back();
    }

    public function getChefRates($id) {
        $chef  = Chef::find($id);
        $rates = Ratea::where('chef_id', $chef->id)->get();

        return view('site.pages.chef.rates', compact('chef', 'rates'));
    }
}

