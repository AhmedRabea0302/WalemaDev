@extends('site.layouts.master-2')
@section('content')
    <!-- =================== Content Section ============ -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- === Side Bar === -->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="admin-sidebar">
                        <div class="admin-item">
                            <div class="imagea">
                                <img src="{{ url('storage/uploads/chefs-profile-images') . '/' . $chef->image_name }}" alt="">
                            </div>
                            <h4>{{ $chef->name }}</h4>
                        </div>

                        <div class="admin-user-action">
                            <a href="{{ route('site.update-chef-profile', ['id' => $chef->id]) }}" class="btn btn-primary btn-sm">تعديل</a>
                            <a href="#" class="btn btn-primary btn-sm btn-inverse">توقف مؤقت</a>
                        </div>

                        <ul class="admin-user-menu">
                            <li><a href="{{ route('site.chef-profile', ['id' => $chef->id]) }}"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                            <li><a href="{{ route('site.update-chef-profile', ['id' => $chef->id]) }}"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="{{ route('site.get_chef_orders', ['id' => $chef->id]) }}" class="active"><i class="fa fa-check"></i>الطلبات</a></li>
                            <li><a href="{{ route('site.get_chef_rates', ['id' => $chef->id]) }}"><i class="fa fa-delicious"></i>التقييمات</a></li>
                            <li><a href="{{ route('site.getLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>


                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">

                    <div class="admin-section-title">
                        <h2>مرحبا بك {{ $chef->name  }} !
                            <span style="float: left;">@if($order->status == 'تم التسليم')<label class="btn btn-success" style="padding: 5px 35px">تم التسليم</label>@endif</span>
                        </h2>
                    </div>

                    <div class="single-order">
                        <h4 class="lead">طلب: {{ $order->getUser()->first()->name }}</h4>
                        <br>
                        <div class="">
                            <p class="lead"><span>اسم الطلب:</span> {{ $order->getUser()->first()->name }}</p>
                            <p class="lead"><span>الوجبات:</span>
                                @foreach($orders as $order)
                                    @foreach($order->cart->items as $item)
                                        {{ ($item['item']['name'])  }}({{ $item['qty'] }}) .. |
                                    @endforeach
                                @endforeach
                            </p>
                            <p class="lead"><span>معاد التسليم:</span> {{ $order->deliver_date }} - {{ $order->deliver_time }}</p>
                            <p class="lead"><span>اسم العميل:</span> {{ $order->getUser()->first()->name  }}</p>
                            <p class="lead"><span>مكان التسليم:</span> {{ $order->deliver_address }}</p>
                            <p class="lead"><span>رقم الطابق:</span> {{ $order->deliver_plat_number }}</p>
                            <p class="lead"><span> رقم الشقة:</span> {{ $order->deliver_part_number }}</p>
                            <form action="{{ route('site.update_order_status', ['id' => $order->id]) }}" method="post">
                                {{ csrf_field() }}
                                @if($order->status == 'تم التسليم')

                                @else
                                <p class="lead"><span> الحاله:</span>
                                    <select name="status" style="padding: 5px">
                                        <option value="" >إختر الحالة</option>
                                        <option value="تم الموافقة" @if($order->status == "تم الموافقة") selected @endif>تم الموافقة</option>
                                        <option value="تم شراء المكونات" @if($order->status == "تم شراء المكونات") selected @endif>تم شراء المكونات</option>
                                        <option value="تم التجهيز" @if($order->status == "تم التجهيز") selected @endif>تم التجهيز</option>
                                        <option value="تم التسليم" @if($order->status == "تم التسليم") selected @endif>تم التسليم</option>
                                    </select>
                                </p>
                                @endif
                            @foreach($orders as $order)
                                    <p class="lead"><span>التكلفة:</span> {{ $order['cart']->totalPrice }} LE</p>
                            @endforeach

                                @if($order->status == 'تم التسليم')

                                @else
                                <input type="submit" class="btn btn-danger" value="تعديل" />
                                @endif
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <br>
        </div>

    </section>
@endsection