<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

use Validator;

class ContactController extends Controller
{
    public function getIndex() {
        $messages = Contact::all();
        return view('admin.pages.contacts.index', compact('messages'));
    }

    public function getReply(Request $request) {
        $message = Contact::find($request->id);
        return view('admin.pages.contacts.replyTemplate', compact('message'));
    }

    public function postReply(Request $request) {

        $user_mail = $request->user_email;
        $reply     = $request->message;

        $rules = [
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return ['status' => false ,'data' => implode(PHP_EOL, $validator->errors()->all())];
        }

        Mail::send('admin.pages.contacts.replyMessageDraft', ['user_mail'  => $user_mail, 'reply' => $reply],
            function($message) use ($user_mail, $reply) {
                $message->from('arabea169@gmail.com', 'Rosys');
                $message->to($user_mail)->subject('Dental Bemassey');
            });

        return ['status' => 'success', 'data' => 'Message Sent Successfully', 'id' => 'warna'];
    }

    public function deleteMessage(Request $request) {
        $message = Contact::find($request->id);
        $message->delete();

        return redirect()->back()->withC('success')->withM('Deleted Successfully');
    }

}
