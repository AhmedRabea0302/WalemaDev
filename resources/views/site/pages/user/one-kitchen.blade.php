@extends('site.layouts.master')
@section('content')
    <section class="menue">

        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="kitchen-info">
                            <h2>مطعم {{ $kitchen->name }}</h2>
                            <ul class="list-unstyled">
                                <li>
                                    <span class="glyphicon glyphicon-cutlery"></span>
                                    نوع المطعم: {{ $kitchen->kitchen_type }}
                                </li>
                                <li>
                                    <i class="fa fa-lock"></i>
                                    أقل طلب: {{ $kitchen->min_order }} جنيه
                                </li>

                            </ul>
                        </div><!-- end kitchen-info -->
                    </div><!-- end col-md-8 -->

                    <div class="col-md-4">
                        <div class="working-info">
                            <div class="res-rating-all">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="res-opening-time"><i class="glyphicon glyphicon-time"></i>  5:30 ص - 10:30 م</div>
                                    </li>
                                    <li>
                                        <div class="ui-res-rating">
                                            <div class="stars">
                                                @for($i = 1; $i<=5 ; $i++)
                                                    <span class="fa fa-star @if($average >= $i) checked @endif"></span>
                                                @endfor
                                            </div><!-- End stars -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ui-rating-text">
                                            <a href="{{ route('site.get_kitchen_rates', ['id' => $kitchen]) }}" style="text-decoration: none">{{ $rates->count() }} تقييم</a>
                                        </div>
                                    </li>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>

                        </div><!-- end working-info -->
                    </div><!-- end col-md-4 -->
                </div><!-- end row -->
            </div>
        </div><!-- page-title -->

    </section><!-- End menue -->

    <!-- =================== Kitchen Section ============ -->

    <section class="kitchen-cont">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="side-right-block">
                        <h4>صور وجباتنا</h4>
                        <ul class="list-unstyled">
                            @foreach($meals as $meal)
                                <li><img src="{{ url('storage/uploads/meals/' . '/' . $meal->image_name) }}" alt=""></li>
                            @endforeach
                        </ul>
                    </div><!-- End side-right-block -->
                </div><!-- End col-sm-4 -->

                <div class="col-sm-6 col-xs-12">
                    @if(session()->has('c'))
                        <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
                    @endif
                    <div class="order-menu text-center-xs">
                        <img src="{{asset('assets/site/images/banner.png')}}" alt="order-img">

                        @foreach($meals as $meal)
                            <div class="order-item clearfix">
                                <div class="pull-left">
                                    <h4>{{ $meal->name }}</h4>
                                    <p>{{ substr($meal->description, 0, 70) }} ...</p>
                                </div><!-- End pull-right -->
                                <div class="pull-right">
                                    <a href="{{ route('site.add_to_cart', ['id' => $meal->id, 'ch_id' => $kitchen->id]) }}" class="btn btn-primary animation"><span class="price-new">le {{ $meal->price }}</span> <i class="fa fa-plus-circle"></i></a>
                                </div><!-- End pull-left -->
                            </div><!-- End order-item -->
                        @endforeach

                    </div><!-- End order-menu -->
                </div><!-- End col-sm-6 -->

                <div class="col-sm-3 col-xs-12">
                    <div class="fav">
                        <form method="post" action="{{ route('site.add_to_favourite', ['id' => $kitchen->id, 'user_id' => auth()->guard('normaluser')->user()->id])}}">
                            {{ csrf_field() }}
                            <input type="submit"style="color: #fff" class="btn btn-danger" value="إضافة للمفضلة" />
                        </form>
                    </div>
                    <div class="side-left-block">
                        <h4 class="text-center">طلباتك المضافه</h4>
                        <div class="left-block-content">
                            <ul class="list-unstyled order-item-list">
                                @if(session()->has('cart'))
                                <?php $cart_meals = session()->get('cart')->items ?>
                                    @foreach($cart_meals= session()->get('cart')->items as $cart)
                                        {{--{{ dd($cart) }}--}}
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                <div class="update-product">
                                                    <a title="Add a product" href="{{ route('site.increase-one', ['id' => $cart['item']['id'], 'ch_id' => $kitchen->id]) }}"><i class="fa fa-plus-circle"></i></a>
                                                    <a title="Minus a product" href="{{ route('site.reduce-one', ['id' => $cart['item']['id'], 'ch_id' => $kitchen->id]) }}"><i class="fa fa-minus-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart-product-name pull-left"> {{ $cart['item']['name'] }} ({{ $cart['qty'] }}) </div>
                                            <div class="cart-product-price pull-right text-spl-color">le {{ $cart['price'] }}</div>

                                        </li>
                                    @endforeach
                                @endif

                            </ul>

                            <div class="clearfix"></div>

                            <dl class="dl-horizontal text-center">
                                <hr style="height: 1px; background-color: #d0d0d0">
                                <dt class="text-bold">الحساب الكلي :</dt>
                                <dd class="text-bold text-spl-color text-right">le {{ session()->has('cart') ? session()->get('cart')->totalPrice : null }} </dd>
                                <hr style="height: 1px; background-color: #d0d0d0">

                            </dl>

                            <div class="checkout">
                                <a href="{{ route('site.order_process', ['id' => auth()->guard('normaluser')->user()->id,'ch_id' => $kitchen->id]) }}" class="btn btn-primary btn-block custom-checkout">أكمل الطلب</a>
                            </div>
                        </div><!-- End left-block-content -->
                    </div><!-- End side-left-block -->
                </div><!-- End col-sm-3 -->
            </div>
        </div>
    </section><!-- End Kitchen-cont -->

@endsection