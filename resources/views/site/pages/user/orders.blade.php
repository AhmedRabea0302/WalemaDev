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
                            <li><a href="{{ route('site.get_user_favs', ['id' => $normalUser->id]) }}"><i class="fa fa-bookmark"></i>المطاعم المفضله</a></li>
                            <li><a href="{{ route('site.userGetLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>


                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="admin-section-title">
                        <h2>مرحبا بك {{ $normalUser->name }} !</h2>
                    </div>

                    <div class="orders">
                        <h2> الطلبات الغير مكتملة</h2>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>الإسم</th>
                                <th>المطبخ</th>
                                <th>الحالة</th>
                                <th>المزيد</th>
                            </tr>

                            @foreach($orders as $order)
                                @if( ($order->status) != 'تم التسليم')
                                    <tr>
                                        <td>
                                            <input readonly type="text" name="order_name" class="form-control user_name" value="{{ $order->getChef()->first()->name }}" />
                                        </td>
                                        <td><input readonly type="text" name="order_client" class="form-control" value="{{ $order->getChef()->first()->name }}" /></td>
                                        <td><input readonly type="text" name="order_status" class="form-control" value="{{ $order->status == null ?  'في إنتظار الموافقة' : $order->status }}" /></td>
                                        <td><a href="{{ route('site.get_single_user_order', ['id' => $normalUser->id, 'order_id' => $order->id, 'chef_id' => $order->getChef()->first()->id]) }}" class="updateUser btn btn-info">المزيد</a></td>
                                    </tr>
                                @endif
                            @endforeach

                        </table>

                        <hr style="height: 2px; background: #e7604a">
                        <br>
                        <h2> الطلبات المكتملة ولم يتم تقييمها</h2>
                        <br>

                        <table class="table table-bordered">
                            <tr>
                                <th>الإسم</th>
                                <th>المطبخ</th>
                                <th>الحالة</th>
                                <th>المزيد</th>
                                {{--<th>حذف</th>--}}
                            </tr>

                            @foreach($orders as $order)
                                @if($order->status == 'تم التسليم' and $order->rated == 0)
                                    <tr>
                                        <td>
                                            <input readonly type="text" name="order_name" class="form-control user_name" value="{{ $order->getUser()->first()->name }}" />
                                        </td>
                                        <td><input readonly type="text" name="order_client" class="form-control" value="{{ $order->getChef()->first()->name }}" /></td>
                                        <td><input readonly type="text" name="order_status" class="form-control" value="{{ $order->status }}" /></td>
                                        <td><a href="{{ route('site.get_single_user_order', ['id' => $normalUser->id, 'order_id' => $order->id, 'chef_id' => $order->getChef()->first()->id]) }}" class="updateUser btn btn-info">المزيد</a></td>

                                    </tr>
                                @endif
                            @endforeach
                        </table>

                        <hr style="height: 2px; background: #e7604a">
                        <br>
                        <h2> الطلبات التي تم تقييمها</h2>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>الإسم</th>
                                <th>المطبخ</th>
                                <th>الحالة</th>
                                <th>المزيد</th>

                            </tr>

                            @foreach($orders as $order)
                                @if($order->status == 'تم التسليم' and $order->rated == 1)
                                    <tr>
                                        <td>
                                            <input readonly type="text" name="order_name" class="form-control user_name" value="{{ $order->getUser()->first()->name }}" />
                                        </td>
                                        <td><input readonly type="text" name="order_client" class="form-control" value="{{ $order->getChef()->first()->name }}" /></td>
                                        <td><input readonly type="text" name="order_status" class="form-control" value="{{ $order->status }}" /></td>
                                        <td><a href="{{ route('site.get_single_user_order', ['id' => $normalUser->id, 'order_id' => $order->id, 'chef_id' => $order->getChef()->first()->id]) }}" class="updateUser btn btn-info">المزيد</a></td>
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