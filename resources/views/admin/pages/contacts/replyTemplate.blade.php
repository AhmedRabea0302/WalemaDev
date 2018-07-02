@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <h2 class="text-center">إضافة رد</h2>

                <div class="alert " id="warna">

                </div>

                <form action="{{ route('admin.post_reply_message') }}" onsubmit="return false;" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>المرسل إليه</label>
                        <input type="text" value="{{ $message->email }}" name="user_email" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>الرسالة</label>
                        <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <input type="submit" class="btn btn-info addBTN" value="إرسال">
                </form>
            </div>
        </div>
    </div>
@stop