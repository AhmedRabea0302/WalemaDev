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
                            <li><a href="{{ route('site.user-profile', ['id' => $normalUser->id]) }}" class="active"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                            <li><a href="{{ route('site.get-update-user-profile', ['id' => $normalUser->id]) }}"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="{{ route('site.get_user_orders', ['id' => $normalUser->id]) }}"><i class="fa fa-delicious"></i>الطلبات</a></li>
                            <li><a href="{{ route('site.get_user_favs', ['id' => $normalUser->id]) }}"><i class="fa fa-bookmark"></i>المطاعم المفضله</a></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>

                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">

                    <div class="admin-section-title">
                        <h2>مرحبا بك {{ $normalUser->name }} !</h2>
                    </div>

                    <div class="admin-content-wrapper">

                        <div class="admin-empty-dashboard">
                            <div class="icon"><i class="fa fa-book"></i></div>
                            <h4>ليس لديك أية أنشطه مؤخرا</h4>
                            <a href=" {{ route('site.home') }} " class="btn btn-primary btn-lg">إبحث معنا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection