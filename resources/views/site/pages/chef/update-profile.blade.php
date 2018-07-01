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
                            <h4>{{$chef->name}}</h4>
                        </div>

                        <div class="admin-user-action">
                            <a href="{{ route('site.update-chef-profile', ['id' => $chef->id]) }}" class="btn btn-primary btn-sm">تعديل</a>
                            <a href="#" class="btn btn-primary btn-sm btn-inverse">توقف مؤقت</a>
                        </div>

                        <ul class="admin-user-menu">
                            <li><a href="{{ route('site.chef-profile',  ['id' => $chef->id]) }}"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                            <li><a href="{{ route('site.update-chef-profile',  ['id' => $chef->id]) }}) }}" class="active"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="{{ route('site.get_chef_orders', ['id' => $chef->id]) }}"><i class="fa fa-check"></i>الطلبات</a></li>
                            <li><a href="{{ route('site.get_chef_rates', ['id' => $chef->id]) }}"><i class="fa fa-delicious"></i>التقييمات</a></li>
                            <li><a href="{{ route('site.getLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>

                <!-- =================== Content Section ============ -->
                <section class="content">
                    <div class="container">
                            <!-- === Content === -->
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <br>
                                <div id="warna">

                                </div>

                                <div class="admin-section-title">
                                    <h2>هل تريد تعديل ملفك</h2>
                                </div>

                                <div class="user-content-wrapper">
                                    <form method="post" action="{{ route('site.post-update-chef', ['id' => $chef->id]) }}" class="formAddImage" onsubmit="return false;" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group bootstrap-fileinput-style-01">
                                                <label>الصوره</label>
                                                <input name="photo" id="form-register-photo" type="file">
                                                <span class="font12 font-italic">الصوره لا يجب أن تكون أكبر من 250KB **</span>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-sm-6 col-md-8">
                                            <div class="form-group">
                                                <label>اسم المطعم</label>
                                                <input name="chef_name" class="form-control" value="{{ $chef->name }}" type="text">
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="sel1">نوع المطعم</label>
                                                <select name="chef_type" class="form-control selectaboxa" id="sel1">
                                                    @foreach($types as $type)
                                                        <option @if( $chef->kitchen_type == $type->type) selected @endif>{{ $type->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">
                                                <label>المحافظه</label>
                                                <select name="chef_govern" class="form-control selectaboxa">
                                                    @foreach($governs as $govern)
                                                        <option @if( $chef->kitchen_govern == $govern->city) selected @endif>{{ $govern->city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">
                                                <label>العنوان</label>
                                                <input name="chef_address" class="form-control" value="{{ $chef->address }}" type="text">
                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">
                                                <label>الشارع</label>
                                                <input name="chef_street" class="form-control" value="{{ $chef->street }}" type="text">
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">
                                                <label>التليفون</label>
                                                <input name="chef_phone" class="form-control" value="{{ $chef->phone }}" type="text">
                                            </div>

                                        </div>

                                        <div class="col-sm-6 col-md-4">

                                            <div class="form-group">
                                                <label>البريد الإلكتروني</label>
                                                <input readonly name="chef_email" class="form-control" value="{{ $chef->email }}" type="email">
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="sel1">أقل سعر للوجبه</label>
                                                <select class="form-control selectaboxa" id="sel1">
                                                    @for($num= 15; $num<=100; $num++)
                                                    <option @if( $chef->min_order == $num) selected @endif>{{ $num }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-md-12">

                                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                <label>عني</label>
                                                <textarea name="chef_desc" class="bootstrap3-wysihtml5 form-control" placeholder="أكتب نبذه عنك" style="height: 200px;">
                                                    {{ $chef->description }}
                                                </textarea>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 mt-10">
                                            <input type="submit" class="btn btn-primary" value="حفظ التعديلات"/>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                </section>

            </div>
        </div>

    </section>

@endsection

@section('scripts')
    <script src="{{asset('assets/site/js/ajax-validation.js')}}"></script>
@endsection