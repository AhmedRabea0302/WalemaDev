<?php

namespace App\Http\Controllers\Site;

use App\Chef;
use App\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class MealController extends Controller
{
    public function getIndex(Request $request) {
        $chef  = Chef::find($request->id);
        return view('site.pages.meals.index', compact('chef'));
    }

    public function postAddMeal(Request $request) {
        $meal = new Meal();

        $rules = [
            'photo' => 'required',
            'meal_name' => 'required',
            'meal_ingredients' => 'required',
            'meal_price' => 'required',
            'meal_description' => 'required',
        ];
        //
        $validator = Validator::make($request->all(), $rules, [
            'photo.required'             => 'من فضك أدخل صورة الوجبه',
            'meal_name.required'         => 'من فضك أدخل اسم الوجبه',
            'meal_ingredients.required'  => 'من فضك مكونات الوجبه',
            'meal_price.required'        => 'من فضك أدخل سعر الوجبه',
            'meal_description.required'  => 'من فضك أدخل وصف الوجبه',
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'data' => implode('<br />', $validator->errors()->all()), 'id' => 'warna'];
        }

        $file = $request->file('photo');
        if(!empty($file)) {
            $destination = 'storage/uploads/meals/';
            @unlink( $destination . $meal->image_name);
            $file_name = $file->getClientOriginalName();
            $file->move($destination, $file_name);
            $meal->image_name = $file_name;
        }

        $meal->chef_id        = $request->id;
        $meal->name           = $request->meal_name;
        $meal->ingredients    = $request->meal_ingredients;
        $meal->price          = $request->meal_price;
        $meal->description    = $request->meal_description;

        $meal->save();

        return ['status' => 'success', 'data' => 'تم إضافة الوجبة بنجاح', 'id' => 'warna'];

    }

    public function getUpdateMeal(Request $request) {
        $meal = Meal::find($request->id);
        $chef = Chef::find($request->ch_id);
        return view('site.pages.meals.update-meal', compact('meal', 'chef'));
    }

    public function postUpdateMeal(Request $request) {
        $meal = Meal::find($request->id);

        $rules = [
            'meal_name' => 'required',
            'meal_ingredients' => 'required',
            'meal_price' => 'required',
            'meal_description' => 'required',
        ];
        //
        $validator = Validator::make($request->all(), $rules, [
            'meal_name.required'         => 'من فضك أدخل اسم الوجبه',
            'meal_ingredients.required'  => 'من فضك مكونات الوجبه',
            'meal_price.required'        => 'من فضك أدخل سعر الوجبه',
            'meal_description.required'  => 'من فضك أدخل وصف الوجبه',
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('photo');
        if(!empty($file)) {
            $destination = 'storage/uploads/meals/';
            @unlink( $destination . $meal->image_name);
            $file_name = $file->getClientOriginalName();
            $file->move($destination, $file_name);
            $meal->image_name = $file_name;
        }


        $meal->update([
            $meal->chef_id        = $request->ch_id,
            $meal->name           = $request->meal_name,
            $meal->ingredients    = $request->meal_ingredients,
            $meal->price          = $request->meal_price,
            $meal->description    = $request->meal_description
        ]);

        $meal->save();

        return redirect()->back()->withC('success')->withM('تم تعديل الوجبة بنجاح');

    }

    public function deleteMeal(Request $request) {
        $meal = Meal::find($request->id);
        $meal->delete();

        @unlink('storage/uploads/meals/' . $meal->image_name);

        return back()->withC('success')->withM('تم حذف الوجبة بنجاح');
    }

}
