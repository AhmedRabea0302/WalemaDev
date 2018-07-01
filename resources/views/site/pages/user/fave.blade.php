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
                            <li><a href="{{ route('site.get-update-user-profile', ['id' => $normalUser->id]) }}"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="{{ route('site.get_user_orders', ['id' => $normalUser->id]) }}"><i class="fa fa-delicious"></i>الطلبات</a></li>
                            <li><a href="{{ route('site.get_user_favs', ['id' => $normalUser->id]) }}" class="active"><i class="fa fa-bookmark"></i>المطاعم المفضله</a></li>
                            <li><a href="{{ route('site.userGetLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>
                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">

                    <div class="admin-section-title">
                        <h2>المطاعم المفضله</h2>
                    </div>
                    <br>

                    @foreach($favourites as $favourite)

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="restaurant-item">
                                <a href="{{ route('site.get_one_kitchen', ['id' => $normalUser->id, 'ch_id' => $favourite->getChefs()->first()->id]) }}">
                                    <div class="image">
                                        <div class="vertical-middle">
                                            <img src="{{ url('storage/uploads/chefs-profile-images') . '/' . $favourite->getChefs()->first()->image_name }}" alt="">
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h4 class="heading">{{ $favourite->getChefs()->first()->name }}</h4>
                                        <p class="location"><i class="fa fa-map-marker text-primary"></i> <strong class="text-primary">{{ $favourite->getChefs()->first()->kitchen_type }}</strong> -{{ $favourite->getChefs()->first()->address }}</p>
                                        <p class="date text-muted font12 font-italic">أقل طلب: {{ $favourite->getChefs()->first()->min_order }} LE</p>
                                    </div>
                                </a>

                                <div class="content-bottom">
                                    <div class="sub-category">
                                        <a href="{{ route('site.get_one_kitchen', ['id' => $normalUser->id, 'ch_id' => $favourite->getChefs()->first()->id]) }}">أطلب طلب</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>
@endsection