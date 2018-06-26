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
                            <h4>أبو ميمي</h4>
                        </div>

                        <div class="admin-user-action">
                            <a href="#" class="btn btn-primary btn-sm">تعديل</a>
                            <a href="#" class="btn btn-primary btn-sm btn-inverse">توقف مؤقت</a>
                        </div>

                        <ul class="admin-user-menu">
                            <li><a href="{{ route('site.chef-profile',  ['id' => auth()->guard('chef')->user()->id]) }}" class="active"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                            <li><a href="{{ route('site.update-chef-profile', ['id' => auth()->guard('chef')->user()->id]) }}"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="#"><i class="fa fa-delicious"></i>التقييمات</a></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>

                <!-- === Content === -->
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="user-content-wrapper">
                        <br>
                        <div id="warna">

                        </div>
                        <div class="admin-section-title">
                            <h2>أضف وجبه</h2>
                        </div>
                        <form action="{{ route('site.postAddMeal', ['id' => $chef->id]) }}" method="post" class="formAddImage" onsubmit="return false;" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-sm-6 col-md-4">

                                <div class="form-group bootstrap-fileinput-style-01">
                                    <label>صورة الوجبه</label>
                                    <input name="photo" id="form-register-photo" type="file">
                                    <span class="font12 font-italic">الصوره لا يجب أن تكون أكبر من 250KB **</span>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>اسم الوجبه</label>
                                    <input name="meal_name" class="form-control" value="" type="text">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">

                                <div class="form-group">
                                    <label>مكونات الوجبه</label>
                                    <input name="meal_ingredients" class="form-control" value="" type="text">
                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <label for="sel1">سعر الوجبه</label>
                                    <select name="meal_price" class="form-control" id="sel1">
                                        @for($num= 10; $num<=200; $num++)
                                            <option >{{ $num }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-12 col-md-12">

                                <div class="form-group bootstrap3-wysihtml5-wrapper">
                                    <label>وصفه الوجبه</label>
                                    <textarea name="meal_description" class="bootstrap3-wysihtml5 form-control" placeholder="" style="height: 200px;"></textarea>
                                </div>

                            </div>

                            <div class="col-sm-12 mt-10">
                                <input type="submit" value="إضافة وجبة" class="btn btn-primary" />
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