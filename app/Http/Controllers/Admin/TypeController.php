<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TypeController extends Controller
{

    public function addType(Request $request) {
        $type = new Type();

        $rules = [
            'type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'type.required' => 'من فضلك أدخل النوع',

        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $type->type = $request->type;
        $type->save();
        return ['status' => 'success', 'data' => 'تم إضافة النوع بنجاح', 'id' => 'warna'];
    }

    public function deleteType(Request $request) {
        $type = Type::find($request->id);
        $type->delete();

        return redirect()->back()->withC('success')->withM('تم حذف النوع بنجاح');
    }
}
