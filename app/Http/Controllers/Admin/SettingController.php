<?php
namespace App\Http\Controllers\Admin;

use App\Setting;
use App\SocalLink;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SMKFontAwesome\SMKFontAwesome;


class SettingController extends Controller
{
    public function getIndex() {
        $settings = Setting::first();
        $social_links = SocalLink::all();
        $icons = SMKFontAwesome::getArray();
        return view('admin.pages.settings.index', compact('settings', 'icons', 'social_links'));
    }

    public function postUpdateSettings(Request $request) {
        $update = Setting::first();

        $rules = [
            'site_name'        => 'required',
            'site_url'         => 'required|url',
            'site_name_search' => 'required',
            'site_email'       => 'required',
            'site_address'     => 'required',
            'site_number'      => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'site_name.required'        => trans('trans.site_name_message'),
            'site_url.required'         => trans('trans.site_url_message'),
            'site_url.url'              => trans('trans.site_url_message_2'),
            'site_name_search.required' => trans('trans.site_name_search_message'),
            'site_email.required'       => trans('trans.site_email_message'),
            'site_address.required'     => trans('trans.site_address_message'),
            'site_number.required'      => trans('trans.site_number_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $file = $request->file('image_name');
        if(!empty($file)) {
            $destination = 'storage/uploads/settings/';
            @unlink( $destination . $update->image_name);
            $file_name = $file->getClientOriginalName();
            $file->move($destination, $file_name);
            $update->image_name = $file_name;
        }

        $update->site_name    = $request->site_name;
        $update->site_url     = $request->site_url;
        $update->site_lang    = $request->site_lang;
        $update->site_address      = $request->site_address;
        $update->site_email   = $request->site_email;
        $update->site_number = $request->site_number;
        $update->site_name_search  = $request->site_name_search;

        $update->save();

        return ['status' => 'success', 'data' => 'Updated Successfully'];
    }

    public function postAddSocialLink(Request $request) {
        $socila_link = new SocalLink();

        $rules = [
            'link' => 'required|url',
            'icon' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'link.required' => trans('trans.add_link_message'),
            'link.required' => trans('trans.add_link_url_message'),
            'icon.required' => trans('trans.add_icon_message'),
        ]);

        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $socila_link->link = $request->link;
        $socila_link->icon = $request->icon;

        $socila_link->save();
        return ['status' => 'success', 'data' => 'Added Successfully'];

    }

    public function postUpdateSocialLink(Request $request) {
//        dd($request->all());
        $social_link = SocalLink::find($request->id);
//        dd($social_link);
        $rules = [
            'link' => 'required|url'
        ];

        $validator = Validator::make($request->all(), $rules, [
            'link.required' => 'من فضلك أدخل رابط لموقع التواصل',
            'link.url' => 'من فضلك أضف رابط صحيح لموقع التواصل',
        ]);

        if ($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        $social_link->link = $request->link;
        $social_link->icon = $request->icon;

        if ($social_link->save()){
            return ['status' => 'success', 'data' => 'Updated Successfully'];
        }
        return ['status' => false, 'data' => 'failed to update'];
    }

    public function postDeleteSocialLink(Request $request) {
        $social_link = SocalLink::find($request->id);
        $social_link->delete();

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }
}
