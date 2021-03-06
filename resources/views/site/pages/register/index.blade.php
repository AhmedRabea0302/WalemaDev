@extends('site.layouts.master')
@section('content')
    <!-- =================== Navbar Section ============ -->
    <section class="register">
        <div class="register">

            <div class="register-form">
                <div id="warna">

                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#signIn" aria-controls="home" role="tab" data-toggle="tab">
                            <i class="fa fa-sign-in"></i>
                            تسجيل دخول
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#signUp" aria-controls="home" role="tab" data-toggle="tab">
                            <i class="fa fa-pencil"></i>
                            حساب جديد
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#contact" aria-controls="home" role="tab" data-toggle="tab">
                            <i class="fa fa-envelope"></i>
                            تواصل
                        </a>
                    </li>
                </ul>
                <div class="tab-content">

                    <form method="post" action="{{ route('site.postLogin') }}" role="tabpanel" class="tab-pane fade in active" id="signIn">
                        {{ csrf_field() }}
                        <h3 class="form-title">تسجيل دخول</h3>
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input name="email" class="form-control" value="" type="text" placeholder="ادخل اسم المستخدم">
                        </div>
                        <div class="form-group">
                            <label>الرقم السري</label>
                            <input name="password" class="form-control" value="" type="password" placeholder="ادخل الرقم السري">
                        </div>

                        <div class="form-group">
                            <select name="type" class="form-control selectaboxa">
                                <option value="طباخ">طباخ</option>
                                <option value="مستخدم عادي">مستخدم عادي</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary form-control" value="دخول" />
                        </div>

                    </form>
                    <form method="post" action="{{ route('site.postRegister') }}" role="tabpanel" onsubmit="return false;" class="register-forma tab-pane fade in" id="signUp">
                        {{ csrf_field() }}
                        <h3 class="form-title">حساب جديد</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>اسم المستخدم</label>
                                    <input name="chef_name" class="form-control" value="" type="text" placeholder="ادخل اسم المستخدم">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> البريد الالكتروني</label>
                                    <input name="email" class="form-control" value="" type="email" placeholder="ادخل  البريد الالكتروني">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>الرقم السري</label>
                                    <input name="password" class="form-control" value="" type="password" placeholder="ادخل الرقم السري">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>تاكيد الرقم السري</label>
                                    <input  name="password_confirmation" class="form-control" value="" type="password" placeholder="تاكيد الرقم السري">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>اختار النوع</label>
                                    <select name="type" class="form-control selectaboxa">
                                        <option value="طباخ">طباخ</option>
                                        <option value="مستخدم عادي">مستخدم عادي</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- End row -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="تسجيل"/>
                            </div>
                        </div>
                    </form>

                    <form method="post" action="{{ route('site.post_contact') }}" method="post" class="tab-pane fade in register-forma" id="contact">
                        {{ csrf_field() }}
                        <h3 class="form-title">تواصل</h3>
                        <div class="form-group">
                            <label>الاسم </label>
                            <input name="name" class="form-control" type="text" placeholder="ادخل  الاسم">
                        </div>
                        <div class="form-group">
                            <label>البريد الالكتروني </label>
                            <input  name="email" class="form-control" type="email" placeholder="ادخل  البريد الالكتروني">
                        </div>
                        <div class="form-group">
                            <label>العنوان </label>
                            <input name="address" class="form-control" type="text" placeholder="ادخل  العنوان للموضوع">
                        </div>
                        <div class="form-group">
                            <label>رسالتك </label>
                            <textarea class="form-control" name="message"  placeholder="ادخل  العنوان للموضوع"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="إرسال" class="btn btn-primary form-control">
                        </div>
                    </form>

                </div>
            </div> <!-- End register-form -->
        </div> <!-- End register -->
    </section><!-- End register -->
@endsection
