@extends('site.layouts.master')
@section('content')

    <section class="order_process">
        <div class="container">
            <div class="row">
                <form method="post" action="{{ route('site.post_add_order',  ['id' => auth()->guard('normaluser')->user()->id,'ch_id' => $kitchen->id]) }}">
                    <div class="col-md-9 col-sm-12">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <fieldset>
                                <legend>معلومات الطلب</legend>

                                <div class="col-md-6">
                                    <label for="start">ميعاد التسليم</label>
                                    <input name="deliver_date" type="date" id="start"
                                           value="2018/07/04"
                                           min="2018/07/04" max="2018-12-31" />
                                </div>

                                <div class="col-md-6">
                                    <label for="start">وقت التسليم</label>
                                    <select name="deliver_time" id="order-delivery-time">
                                        <option value="">إختر الوقت</option>
                                        <option value="12:00 PM">12:00 PM</option>
                                        <option value="12:30 PM">12:30 PM</option>
                                        <option value="1:30 PM">1:30 PM</option>
                                        <option value="1:45 PM">1:45 PM</option>
                                        <option value="2:00 PM">2:00 PM</option>
                                        <option value="3:00 PM">3:00 PM</option>
                                        <option value="3:30 PM">3:30 PM</option>
                                        <option value="4:00 PM">4:00 PM</option>
                                        <option value="4:30 PM">4:30 PM</option>
                                        <option value="5:00 PM">5:00 PM</option>
                                        <option value="5:30 PM">5:30 PM</option>
                                        <option value="6:00 PM">6:00 PM</option>
                                        <option value="6:15 PM">6:15 PM</option>
                                        <option value="6:30 PM">6:30 PM</option>
                                        <option value="6:45 PM">6:45 PM</option>
                                        <option value="7:00 PM">7:00 PM</option>
                                        <option value="7:15 PM">7:15 PM</option>
                                        <option value="7:30 PM">7:30 PM</option>
                                        <option value="7:45 PM">7:45 PM</option>
                                        <option value="8:00 PM">8:00 PM</option>
                                        <option value="8:15 PM">8:15 PM</option>
                                        <option value="8:30 PM">8:30 PM</option>
                                        <option value="8:45 PM">8:45 PM</option>
                                        <option value="9:00 PM">9:00 PM</option>
                                        <option value="9:15 PM">9:15 PM</option>
                                        <option value="9:30 PM">9:30 PM</option>
                                        <option value="9:45 PM">9:45 PM</option>
                                        <option value="10:00 PM">10:00 PM</option>
                                        <option value="10:15 PM">10:15 PM</option>
                                        <option value="10:30 PM">10:30 PM</option>
                                        <option value="10:45 PM">10:45 PM</option>
                                    </select>

                                </div>

                            </fieldset>

                        </div>

                        <div class="col-md-6">
                            <div class="require">
                                <h4 class="section-title ">هل لك توصيات معينة</h4>
                                <textarea name="order_requirements" class="special-request" id="special-request"></textarea>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-md-6 order-delivery-address">
                                <h4 class="section-title pb-10 mb-15">عنوان التسليم</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <input name="deliver_address" class="text" placeholder="المنوفية, شبين الكوم, 83 شارع الجلاء البحري" type="text">
                                    </li>

                                    <li>
                                        <input name="deliver_plat_number" class="text" placeholder="رقم الطابق" type="text">
                                    </li>

                                    <li>
                                        <input name="deliver_part_number" class="text" placeholder="رقم الشقه" type="text">
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>


                <div class="col-sm-3 col-xs-12">
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
                                    <input type="submit" class="btn btn-primary btn-block custom-checkout" value="أكمل الطلب" />
                                </div>
                            </div><!-- End left-block-content -->
                        </div><!-- End side-left-block -->
                    </div><!-- End col-sm-3 -->
                 </form>

            </div>
        </div>

    </section><!-- End Kitchen-cont -->

@endsection


