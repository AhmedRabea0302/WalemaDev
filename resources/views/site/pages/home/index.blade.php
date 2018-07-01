@extends('site.layouts.master')
@section('content')

    <!-- =================== Banner Section ============ -->

    <section class="banner">
        <div class="banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="title-content text-center">
                        <h1>إنجز عزومتك</h1>
                        <p style="margin-bottom: 25px">جد مجموعة من أفضل المطابخ لإنجاز العزومة</p>
                    </div><!-- End title-content -->

                    <div class="form-contenta">
                        <form action="{{ route('site.user_search') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-xs-6">
                                <select name="govern" class="form-control selectaboxa" id="sel1">
                                    <option value="">المحافظه</option>
                                    @foreach($governs as $govern)
                                        <option value="{{ $govern->city }}">{{ $govern->city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xs-6">
                                <select name="type" class="form-control selectaboxa" id="sel1">
                                    <option value="">نوع المطبخ</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div><!-- End col-xs-6 -->
                            <input type="submit" style="border-top: 2px solid #fff" value="بحث" class="form-btn form-control" />

                        </form>
                    </div>

                    <div class="form-contenta">
                        <p style="margin-bottom: 15px">أو يمكنك البحث بإسم الوجبة</p>

                        <form action="{{ route('site.search_by_meal') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-xs-12">
                                <input name="meal_name" class="form-control" type="text" placeholder="اسم الوجبة"/>
                            </div>
                            <input type="submit" style="border-top: 2px solid #fff" value="بحث" class="form-btn form-control" />

                        </form>
                    </div>

                    </div><!-- End form-content -->
                </div><!-- End Row -->
            </div><!-- End Container -->
        </div><!-- End banner-wrapper -->
    </section><!-- End Banner -->

    <!-- =================== Steps Section ============ -->
    <section class="section-icons">
        <div class="steps-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-box">
                            <div class="icon-img">
                                <i class="fa fa fa-cutlery"></i>
                            </div>
                            <div class="icon-name">
                                إختر المطبخ
                            </div>
                            <div class="icon-number">
                                1
                            </div>
                        </div><!--End icon-box-->
                    </div><!--End Col-->
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-box">
                            <div class="icon-img">
                                <i class="fa fa fa-car"></i>
                            </div>
                            <div class="icon-name">
                                اطلب طلب
                            </div>
                            <div class="icon-number">
                                2
                            </div>
                        </div><!--End icon-box-->
                    </div><!--End Col-->
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-box">
                            <div class="icon-img">
                                <i class="fa fa fa-beer"></i>
                            </div>
                            <div class="icon-name">
                                طلبك يتوصل
                            </div>
                            <div class="icon-number">
                                3
                            </div>
                        </div><!--End icon-box-->
                    </div><!--End Col-->
                    <div class="col-md-3 col-sm-6">
                        <div class="icon-box">
                            <div class="icon-img">
                                <i class="fa fa fa-thumbs-up"></i>
                            </div>
                            <div class="icon-name">
                                استمتع
                            </div>
                            <div class="icon-number">
                                4
                            </div>
                        </div><!--End icon-box-->
                    </div><!--End Col-->
                </div><!--End Row-->

            </div><!-- End Container -->
        </div><!-- End steps-wrapper -->
    </section><!-- End Steps -->

    <!-- =================== Top Kitchens Section ============ -->
    <section class="top-kitchens">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="title">
                        <h2>الأعلى تقيما</h2>
                    </div><!-- End col-sm-8 -->

                    <div class="kitchen-wrapper">
                        <a href="#">
                            <div class="middle-grid">
                                <div class="col-xs-4">
                                    <div class="content">
                                        <h4>أم ميمي </h4>
                                        <p>مصري</p>
                                    </div><!-- End content -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-5">
                                    <div class="location">
                                        <i class="fa fa-map-marker text-primary"></i>
                                        المطريه, القاهره
                                    </div><!-- End location -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-3 ordera">
                                    <div class="res-btn label label-danger">
                                        لا تتردد اطلب
                                    </div>
                                    <span class="font12 block spacing1 font400 text-center">Min: le15</span>
                                </div><!-- End col-xs-6 -->
                            </div><!-- End middle-grid -->
                        </a>
                        <div class="clearfix"></div>
                        <a href="#">
                            <div class="middle-grid">
                                <div class="col-xs-4">
                                    <div class="content">
                                        <h4>أم سامح</h4>
                                        <p>مصري</p>
                                    </div><!-- End content -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-5">
                                    <div class="location">
                                        <i class="fa fa-map-marker text-primary"></i>
                                        المطريه, القاهره
                                    </div><!-- End location -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-3 ordera">
                                    <div class="res-btn label label-danger">
                                        لا تتردد اطلب
                                    </div>
                                    <span class="font12 block spacing1 font400 text-center">Min: le15</span>
                                </div><!-- End col-xs-6 -->
                            </div><!-- End middle-grid -->
                        </a>
                        <div class="clearfix"></div>
                        <a href="#">
                            <div class="middle-grid">
                                <div class="col-xs-4">
                                    <div class="content">
                                        <h4>أم تامر</h4>
                                        <p>مصري</p>
                                    </div><!-- End content -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-5">
                                    <div class="location">
                                        <i class="fa fa-map-marker text-primary"></i>
                                        المطريه, القاهره
                                    </div><!-- End location -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-3 ordera">
                                    <div class="res-btn label label-danger">
                                        لا تتردد اطلب
                                    </div>
                                    <span class="font12 block spacing1 font400 text-center">Min: le15</span>
                                </div><!-- End col-xs-6 -->
                            </div><!-- End middle-grid -->
                        </a>
                        <div class="clearfix"></div>
                        <a href="#">
                            <div class="middle-grid">
                                <div class="col-xs-4">
                                    <div class="content">
                                        <h4>أم تغريد</h4>
                                        <p>مصري</p>
                                    </div><!-- End content -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-5">
                                    <div class="location">
                                        <i class="fa fa-map-marker text-primary"></i>
                                        المطريه, القاهره
                                    </div><!-- End location -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-3 ordera">
                                    <div class="res-btn label label-danger">
                                        لا تتردد اطلب
                                    </div>
                                    <span class="font12 block spacing1 font400 text-center">Min: le15</span>
                                </div><!-- End col-xs-6 -->
                            </div><!-- End middle-grid -->
                        </a>
                        <div class="clearfix"></div>
                        <a href="#">
                            <div class="middle-grid">
                                <div class="col-xs-4">
                                    <div class="content">
                                        <h4>أم ميمي </h4>
                                        <p>مصري</p>
                                    </div><!-- End content -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-5">
                                    <div class="location">
                                        <i class="fa fa-map-marker text-primary"></i>
                                        المطريه, القاهره
                                    </div><!-- End location -->
                                </div><!-- End col-xs-6 -->

                                <div class="col-xs-3 ordera">
                                    <div class="res-btn label label-danger">
                                        لا تتردد اطلب
                                    </div>
                                    <span class="font12 block spacing1 font400 text-center">Min: le15</span>
                                </div><!-- End col-xs-6 -->
                            </div><!-- End middle-grid -->
                        </a>
                        <div class="clearfix"></div>

                    </div><!-- End kitchen-wrapper -->
                </div><!-- End col-sm-8 -->

                <div class="col-sm-4">
                    <div class="left-title">
                        <h2>الأكثر طلبا</h2>
                    </div><!-- End left-title -->

                    <div class="left-kitchens">
                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <div class="top">
                                <div class="image">
                                    <img src="{{asset('assets/site/images/vantage.png')}}" alt="vantage logo">
                                </div>
                                <h5>أم مدحت</h5>
                                <a href="#">اطلب الآن</a>
                            </div>
                        </div><!-- End col-xs-6 -->
                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <div class="top">
                                <div class="image">
                                    <img src="{{asset('assets/site/images/spice.png')}}" alt="vantage logo">
                                </div>
                                <h5>أم شوقي</h5>
                                <a href="#">اطلب الآن</a>
                            </div>
                        </div><!-- End col-xs-6 -->

                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <div class="top">
                                <div class="image">
                                    <img src="{{asset('assets/site/images/tree.png')}}" alt="vantage logo">
                                </div>
                                <h5>أم مالك</h5>
                                <a href="#">اطلب الآن</a>
                            </div>
                        </div><!-- End col-xs-6 -->
                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <div class="top">
                                <div class="image">
                                    <img src="{{asset('assets/site/images/magna.png')}}" alt="vantage logo">
                                </div>
                                <h5>أم مدحت</h5>
                                <a href="#">اطلب الآن</a>
                            </div>
                        </div><!-- End col-xs-6 -->

                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <div class="top">
                                <div class="image">
                                    <img src="{{asset('assets/site/images/gree.png')}}" alt="vantage logo">
                                </div>
                                <h5>أم ربيع</h5>
                                <a href="#">اطلب الآن</a>
                            </div>
                        </div><!-- End col-xs-6 -->
                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <div class="top">
                                <div class="image">
                                    <img src="{{asset('assets/site/images/bengal.png')}}" alt="vantage logo">
                                </div>
                                <h5>أم صلاح</h5>
                                <a href="#">اطلب الآن</a>
                            </div>
                        </div><!-- End col-xs-6 -->

                    </div><!-- End left-kitchens -->
                </div><!-- End col-sm-4 -->
            </div><!-- End row -->
        </div><!-- End Container -->
    </section><!-- End top-kitchens -->

    <!-- =================== Top Kitchens Section ============ -->
    <section class="parallex">
        <div class="container">
            <div class="row">
                <div class="content">
                    <h2 class="text-center">
                        وليمه هيساعدك تلاقي عشرات المطابخ الموثوقه من خلال تقييمات مئات المستخدمين
                    </h2>
                </div><!-- End content -->
            </div><!-- End row -->
        </div><!-- End container -->
    </section><!-- End Parallex -->

    <!-- =================== Top Kitchens Section ============ -->
    <section class="new-kitchens">
        <div class="container">
            <div class="row">
                <div class="content text-center">
                    <h2>إكتشف مطاعم جديده وإحجز الآن</h2>
                </div><!-- End content -->

                <div class="col-md-2 col-xs-4 col-sm-2">
                    <a href="#">
                        <img src="{{asset('assets/site/images/vantage.png')}}" alt="chata">
                    </a>
                </div><!-- end col-md-2 -->

                <div class="col-md-2 col-xs-4 col-sm-2">
                    <a href="#">
                        <img src="{{asset('assets/site/images/spice.png')}}" alt="chata">
                    </a>
                </div><!-- end col-md-2 -->

                <div class="col-md-2 col-xs-4 col-sm-2">
                    <a href="#">
                        <img src="{{asset('assets/site/images/rose.png')}}" alt="chata">
                    </a>
                </div><!-- end col-md-2 -->

                <div class="col-md-2 col-xs-4 col-sm-2">
                    <a href="#">
                        <img src="{{asset('assets/site/images/magna.png')}}" alt="chata">
                    </a>
                </div><!-- end col-md-2 -->

                <div class="col-md-2 col-xs-4 col-sm-2">
                    <a href="#">
                        <img src="{{asset('assets/site/images/gree.png')}}" alt="chata">
                    </a>
                </div><!-- end col-md-2 -->

                <div class="col-md-2 col-xs-4 col-sm-2">
                    <a href="#">
                        <img src="{{asset('assets/site/images/chata.png')}}" alt="chata">
                    </a>
                </div><!-- end col-md-2 -->

            </div><!-- End row -->
        </div><!-- End container -->
    </section><!-- End new-kichens -->

    <!-- =================== App Section ============ -->
    <section class="app">
        <div class="mask">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <h2>الأكل في جيبك !</h2>
                        <h4>احصل على تطبيقنا ودي أسرع طريقه تطلب بيها أكل وتعمل عزومات</h4>

                        <ul class="list-unstyled appstor-buttons">
                            <li><a href="#" class="btn-appstor btn-store">App Stpre</a></li>
                            <li><a href="#" class="btn-googleplay btn-store">GooglePlay</a></li>

                        </ul>
                    </div><!-- col-md-7 -->

                    <div class="col-md-4">
                        <div class="left-area visible-lg">
                            <img src="{{asset('assets/site/images/app.png')}}" alt="walema app">
                        </div>
                    </div>
                </div><!-- End row -->
            </div><!-- End container -->
        </div><!-- End mask -->
    </section><!-- End app -->

@endsection