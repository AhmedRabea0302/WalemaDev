@extends('site.layouts.master')
@section('content')
    <!-- =================== Content Section ============ -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- === Side Bar === -->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="admin-sidebar">
                        <div class="admin-item">
                            <div class="image">
                                <img src="{{ url('storage/uploads/users') . '/' . $normalUser->image_name }}" alt="">
                            </div>
                            <h4>{{ $normalUser->name }}</h4>
                        </div>

                        <div class="admin-user-action">
                            <a href="{{ route('site.get-update-user-profile', ['id' => $normalUser->id]) }}" class="btn btn-primary btn-sm">تعديل</a>
                            <a href="#" class="btn btn-primary btn-sm btn-inverse">توقف مؤقت</a>
                        </div>

                        <ul class="admin-user-menu">
                            <li><a href="{{ route('site.user-profile', ['id' => $normalUser->id]) }}"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                            <li><a href="{{ route('site.get-update-user-profile', ['id' => $normalUser->id]) }}" class="active"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="#"><i class="fa fa-delicious"></i>الطلبات</a></li>
                            <li><a href="#"><i class="fa fa-bookmark"></i>المطاعم المفضله</a></li>
                            <li><a href="{{ route('site.userGetLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>

                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <br>
                    <div id="warna">

                    </div>
                    <div class="admin-section-title">
                        <h2>الحساب</h2>
                    </div>

                    <div class="user-content-wrapper">
                        <form action="{{ route('site.postUpdateUser', ['id' => $normalUser->id]) }}" method="post" class="formAddImage" onsubmit="return false;" enctype="multipart/form-data">
                            <div class="col-sm-6 col-md-4">
                            {{ csrf_field() }}
                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>الصوره</label>
                                    <div class="image">
                                        <img src="{{ url('storage/uploads/users') . '/' . $normalUser->image_name }}" alt="">
                                    </div>
                                    <input name="photo" id="form-register-photo" type="file">
                                    <span class="font12 font-italic">الصوره لا يجب أن تكون أكبر من 250KB **</span>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input name="name" class="form-control" value="{{ $normalUser->name }}" type="text">
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-6 col-md-4">

                                <div class="form-group">
                                    <label>البريد الإلكتروني</label>
                                    <input name="email" class="form-control" value="{{ $normalUser->email }}" type="email">
                                </div>

                            </div>

                            <div class="col-sm-6 col-md-4">

                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input name="address" class="form-control" value="{{ $normalUser->address }}" type="text">
                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-6 col-md-4">

                                <div class="form-group">
                                    <label>المحافظة</label>
                                    <input name="govern" class="form-control" value="{{ $normalUser->govern }}" type="text">
                                </div>

                            </div>

                            <div class="col-sm-6 col-md-4">

                                <div class="form-group">
                                    <label>الشارع</label>
                                    <input name="street" class="form-control" value="{{ $normalUser->street }} " type="text">
                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-6 col-md-4">

                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input name="phone" class="form-control" value="{{ $normalUser->phone }}" type="text">
                                </div>

                            </div>


                            <div class="col-sm-12 col-md-12">

                                <div class="form-group bootstrap3-wysihtml5-wrapper">
                                    <label>عني</label>
                                    <textarea name="desc" class="bootstrap3-wysihtml5 form-control" placeholder="أكتب نبذه عنك" style="height: 200px;">
                                        {{ $normalUser->description }}
                                    </textarea>
                                </div>

                            </div>

                            <div class="col-sm-12 mt-10">
                                <input type="submit" class="btn btn-primary" value="حفظ التعديلات" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="{{asset('assets/site/js/ajax-validation.js')}}"></script>
@endsection