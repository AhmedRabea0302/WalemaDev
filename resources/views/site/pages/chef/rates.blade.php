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
                            <li><a href="{{ route('site.get_chef_orders', ['id' => $chef->id]) }}"><i class="fa fa-check"></i>الطلبات</a></li>
                            <li><a href="{{ route('site.get_chef_rates', ['id' => $chef->id]) }}" class="active"><i class="fa fa-delicious"></i>التقييمات</a></li>
                            <li><a href="{{ route('site.getLogout') }}"><i class="fa fa-sign-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </div>
                </div>

                <!-- =================== Content Section ============ -->
                <section class="order-rate">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="comments">
                                @foreach($rates as $rate)

                                        <div class="comment">

                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="info">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        <label>{{ $rate->created_at->format('d/m/Y') }}</label><br>
                                                        <label><span> بواسطة: </span>{{ $rate->user_name }}</label>
                                                        <div class="stars">
                                                            @for($i = 1; $i<=5 ; $i++)
                                                                <span class="fa fa-star @if($rate->rate_number >= $i) checked @endif"></span>
                                                            @endfor
                                                        </div><!-- End stars -->
                                                    </div><!-- End info -->
                                                    <p>{{ $rate->comment }}</p>

                                                </div><!-- End col --->
                                                <div class="col-lg-4">
                                                    <div class="image left">
                                                        <img alt="logo" src="{{ url('storage/uploads/users' . '/' . $rate->image_name)}}">
                                                    </div><!-- End image -->
                                                </div><!-- End col --->
                                            </div><!-- End row -->
                                            <hr>
                                        </div><!-- End comment -->
                                        <!-- The new comment start -->
                                @endforeach
                                </div><!-- End comments -->

                            </div><!-- End col -->
                        </div><!-- End Row -->
                    </div><!-- End container -->
                </section><!-- End order-rate -->

            </div>
            <br>
            <br>
        </div>

    </section>

@endsection