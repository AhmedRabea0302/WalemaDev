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
                            <li><a href="{{ route('site.chef-profile', ['id' => $chef->id]) }}" class="active"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                            <li><a href="{{ route('site.update-chef-profile', ['id' => $chef->id]) }}"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="#"><i class="fa fa-delicious"></i>التقييمات</a></li>
                            <li><a href="{{ route('site.getLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>

                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <br>

                    @if(session()->has('c'))
                        <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
                    @endif

                    <div class="admin-section-title">
                        <h2>مرحبا بك {{ $chef->name }} !</h2>
                    </div>

                    <div class="add-meal">
                        <a href="{{ route('site.add-meal', ['id' => $chef->id]) }}" class="btn btn-default btn-lg"><i class="fa fa-plus"></i> إضافة وجبة</a>
                    </div>

                    <div class="meals">
                        <h2>وجبات {{ $chef->name }}</h2>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>إسم الوجبة</th>
                                <th>وصف الوجبة</th>
                                <th>سعر الوجبة</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>

                            @foreach($meals as  $meal)
                                <tr>
                                    <form class="AddForm" method="post">
                                        <td>
                                            <input readonly type="text" name="meal_name" class="form-control user_name" value="{{ $meal->name }}" />
                                        </td>
                                        <td><input readonly type="text" name="meal_desc" class="form-control" value="{{ $meal->description }}" /></td>
                                        <td><input readonly type="text" name="meal_price" class="form-control" value="{{ $meal->price }}" /></td>
                                        <td><a href="{{ route('site.getUpdateMeal', ['id' => $meal->id, 'ch_id' => $chef->id ]) }}" class="updateUser btn btn-info">تعديل</a></td>
                                    </form>
                                    <form action="{{ route('site.deleteMeal', ['id' => $meal->id]) }}" name="post" method="post">
                                        {{{ csrf_field() }}}
                                        <td><input type="submit" class="btn btn-danger" value="حذف"></td>
                                    </form>

                                </tr>
                            @endforeach


                        </table>

                        <hr style="height: 1px; background-color: #e7604a; margin: 56px 0">

                    </div>

                    <div class="orders">
                        <h2>الطلبات</h2>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>الإسم</th>
                                <th>الوجبات</th>
                                <th>ميعاد التسليم</th>
                                <th>العميل</th>
                                <th>مكان التسليم</th>
                                <th>توصيات</th>
                                <th>الحالة</th>
                                <th>التكلفه</th>
                                <th>المزيد</th>
                                <th>حذف</th>
                            </tr>

                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <input type="text" name="order_name" class="form-control user_name" value="عصام أوره" />
                                    </td>
                                    <td><input type="text" name="order_meals" class="form-control" value="كوارع, عكاويو .." /></td>
                                    <td><input type="text" name="order_date" class="form-control" value="15/2/2018 - 8:00am" /></td>
                                    <td><input type="text" name="order_client" class="form-control" value="عصام أوره" /></td>
                                    <td><input type="text" name="order_deliver" class="form-control" value="المنوفيه/شبين الكوم/ شارع الجلا.." /></td>
                                    <td><input type="text" name="order_desc" class="form-control" value="لوريم ايبسوم .." /></td>
                                    <td><input type="text" name="order_status" class="form-control" value="قيد التنفيذ" /></td>
                                    <td><input type="text" name="order_price" class="form-control" value="200 LE" /></td>
                                    <td><a class="updateUser btn btn-info">المزيد</a></td>
                                </form>
                                <form action="" method="post">
                                    <td><input type="submit" class="btn btn-danger" value="حذف"></td>
                                </form>

                            </tr>

                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <input type="text" name="order_name" class="form-control user_name" value="عصام أوره" />
                                    </td>
                                    <td><input type="text" name="meal_desc" class="form-control" value="كوارع, عكاويو .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="15/2/2018 - 8:00am" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="عصام أوره" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="المنوفيه/شبين الكوم/ شارع الجلا.." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="لوريم ايبسوم .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="قيد التنفيذ" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="200 LE" /></td>
                                    <td><a class="updateUser btn btn-info">المزيد</a></td>
                                </form>
                                <form action="" method="post">
                                    <td><input type="submit" class="btn btn-danger" value="حذف"></td>
                                </form>

                            </tr>
                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <input type="text" name="order_name" class="form-control user_name" value="عصام أوره" />
                                    </td>
                                    <td><input type="text" name="meal_desc" class="form-control" value="كوارع, عكاويو .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="15/2/2018 - 8:00am" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="عصام أوره" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="المنوفيه/شبين الكوم/ شارع الجلا.." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="لوريم ايبسوم .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="قيد التنفيذ" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="200 LE" /></td>
                                    <td><a class="updateUser btn btn-info">المزيد</a></td>
                                </form>
                                <form action="" method="post">
                                    <td><input type="submit" class="btn btn-danger" value="حذف"></td>
                                </form>

                            </tr>
                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <input type="text" name="order_name" class="form-control user_name" value="عصام أوره" />
                                    </td>
                                    <td><input type="text" name="meal_desc" class="form-control" value="كوارع, عكاويو .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="15/2/2018 - 8:00am" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="عصام أوره" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="المنوفيه/شبين الكوم/ شارع الجلا.." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="لوريم ايبسوم .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="قيد التنفيذ" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="200 LE" /></td>
                                    <td><a class="updateUser btn btn-info">المزيد</a></td>
                                </form>
                                <form action="" method="post">
                                    <td><input type="submit" class="btn btn-danger" value="حذف"></td>
                                </form>

                            </tr>
                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <input type="text" name="order_name" class="form-control user_name" value="عصام أوره" />
                                    </td>
                                    <td><input type="text" name="meal_desc" class="form-control" value="كوارع, عكاويو .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="15/2/2018 - 8:00am" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="عصام أوره" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="المنوفيه/شبين الكوم/ شارع الجلا.." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="لوريم ايبسوم .." /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="قيد التنفيذ" /></td>
                                    <td><input type="text" name="meal_price" class="form-control" value="200 LE" /></td>
                                    <td><a class="updateUser btn btn-info">المزيد</a></td>
                                </form>
                                <form action="" method="post">
                                    <td><input type="submit" class="btn btn-danger" value="حذف"></td>
                                </form>

                            </tr>





                        </table>

                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>

    </section>

@endsection