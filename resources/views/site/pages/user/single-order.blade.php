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
                            <li><a href="{{ route('site.get_user_orders', ['id' => $normalUser->id]) }}" class="active"><i class="fa fa-delicious"></i>الطلبات</a></li>
                            <li><a href="#"><i class="fa fa-bookmark"></i>المطاعم المفضله</a></li>
                            <li><a href="{{ route('site.userGetLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>


                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">

                    <div class="admin-section-title">
                        <h2>مرحبا بك {{ $normalUser->name  }} !
                            <span style="float: left;">
                                @if($orderea->status == 'تم التسليم')<label class="btn btn-success" style="padding: 5px 35px">تم التسليم</label>@endif
                                @if($orderea->status == 'تم التسليم' and $orderea->rated == 0) <a href="{{ route('site.get_rating_page', ['id' => auth()->guard('normaluser')->user()->id, 'order_id' => $orderea->id, 'chef_id' => $orderea->getChef()->first()->id]) }}" class="btn btn-info">قم بالتقييم</a> @endif
                                @if($orderea->rated == 1) <a href="{{ route('site.get_rating_page', ['id' => auth()->guard('normaluser')->user()->id, 'order_id' => $orderea->id, 'chef_id' => $orderea->getChef()->first()->id]) }}" class="btn btn-default">تم التقييم</a> @endif
                            </span>
                        </h2>
                    </div>

                    <div class="single-order">
                        <h4 class="lead">طلب: {{ $orderea->getChef()->first()->name }}</h4>
                        <br>
                        <div class="">
                            <p class="lead"><span>اسم الطلب:</span> {{ $orderea->getChef()->first()->name }}</p>
                            <p class="lead"><span>الوجبات:</span>
                                @foreach($orders as $order)
                                    @foreach($order->cart->items as $item)
                                        {{ ($item['item']['name'])  }}({{ $item['qty'] }}) .. |
                                    @endforeach
                                @endforeach
                            </p>

                            <p class="lead"><span>معاد التسليم:</span> {{ $orderea->deliver_date }} - {{ $orderea->deliver_time }}</p>
                            <p class="lead"><span>اسم المطبخ:</span> {{ $orderea->getChef()->first()->name  }}</p>
                            <p class="lead"><span>مكان التسليم:</span> {{ $orderea->deliver_address }}</p>
                            <p class="lead"><span>رقم الطابق:</span> {{ $orderea->deliver_plat_number }}</p>
                            <p class="lead"><span> رقم الشقة:</span> {{ $orderea->deliver_part_number }}</p>
                                {{ csrf_field() }}
                                <p class="lead">
                                    <span> الحاله:
                                    <label @if($orderea->status == null) class="btn btn-success" @else class="btn btn-danger" @endif >في إنتظار الموافقة</label>
                                    <label @if($orderea->status == "تم الموافقة") class="btn btn-success" @else class="btn btn-danger" @endif >تم الموافقة</label>
                                    <label  @if($orderea->status == "تم شراء المكونات") class="btn btn-success" @else class="btn btn-danger" @endif >تم شراء المكونات</label>
                                    <label  @if($orderea->status == "تم التجهيز") class="btn btn-success" @else class="btn btn-danger" @endif >تم تجهيز الوجبات</label>
                                    <label  @if($orderea->status == "تم التسليم") class="btn btn-success" @else class="btn btn-danger" @endif >تم تسليم الطلب</label>
                                    </span>
                                </p>

                            @foreach($orders as $order)
                                    <p class="lead"><span>التكلفة:</span> {{ $order['cart']->totalPrice }} LE</p>
                            @endforeach

                        </div>
                    </div>
                </div>


            </div>
            <br>
            <br>
        </div>

    </section>
@endsection