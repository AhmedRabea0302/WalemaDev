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
                            <li><a href="#"><i class="fa fa-delicious"></i>التقييمات</a></li>
                            <li><a href="{{ route('site.getLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>


                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="admin-section-title">
                        <h2>مرحبا بك {{ $chef->name }} !</h2>
                    </div>

                    <div class="orders">
                        <h2> الطلبات الغير مكتملة</h2>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>الإسم</th>
                                <th>العميل</th>
                                <th>الحالة</th>
                                <th>المزيد</th>
                            </tr>

                            @foreach($orders as $order)
                                @if($order->status != 'تم التسليم')
                                    <tr>
                                        <td>
                                            <input readonly type="text" name="order_name" class="form-control user_name" value="{{ $order->getUser()->first()->name }}" />
                                        </td>
                                        <td><input readonly type="text" name="order_client" class="form-control" value="{{ $order->getUser()->first()->name }}" /></td>
                                        <td><input readonly type="text" name="order_status" class="form-control" value="{{ $order->status }}" /></td>
                                        <td><a href="{{ route('site.get_single_order', ['id' => $chef->id, 'order_id' => $order->id]) }}" class="updateUser btn btn-info">المزيد</a></td>
                                    </tr>
                                @endif
                            @endforeach

                        </table>

                        <hr style="height: 2px; background: #e7604a">
                        <br>
                        <h2> الطلبات المكتملة</h2>
                        <br>

                        <table class="table table-bordered">
                            <tr>
                                <th>الإسم</th>
                                <th>العميل</th>
                                <th>الحالة</th>
                                <th>المزيد</th>
                                <th>تقييم</th>
                                <th>حذف</th>
                            </tr>

                            @foreach($orders as $order)
                                @if($order->status == 'تم التسليم')
                                    <tr>
                                        <td>
                                            <input readonly type="text" name="order_name" class="form-control user_name" value="{{ $order->getUser()->first()->name }}" />
                                        </td>
                                        <td><input readonly type="text" name="order_client" class="form-control" value="{{ $order->getUser()->first()->name }}" /></td>
                                        <td><input readonly type="text" name="order_status" class="form-control" value="{{ $order->status }}" /></td>
                                        <td><a href="{{ route('site.get_single_order', ['id' => $chef->id, 'order_id' => $order->id]) }}" class="updateUser btn btn-info">المزيد</a></td>
                                        <td><a href="{{ route('site.get_single_order', ['id' => $chef->id, 'order_id' => $order->id]) }}" class="updateUser btn btn-success">تقييم</a></td>
                                        <td>
                                            <form action="">
                                                <a href="" class="updateUser btn btn-danger">حذف</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach


                        </table>
                    </div>

                </div>


            </div>
            <br>
            <br>
        </div>

    </section>
@endsection