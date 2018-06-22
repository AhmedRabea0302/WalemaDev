<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CityController extends Controller
{
    public function getIndex() {
        $types  = Type::all();
        $cities = City::all();
        return view('admin.pages.cities.index', compact('cities', 'types'));

    }

    public function addCity(Request $request) {
        $city = new City();

        $rules = [
            'city' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'city.required' => 'من فضلك أدخل إسم المحافظة',

        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $city->city = $request->city;


        $city->save();
        return ['status' => 'success', 'data' => 'تم إضافة المدينه بنجاح', 'id' => 'warna'];
    }

    public function deleteCity(Request $request) {
        $city = City::find($request->id);
        $city->delete();

        return redirect()->back()->withC('success')->withM('تم حذف المدينه بنجاح');
    }
}
