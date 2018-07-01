@extends('site.layouts.master')
@section('content')
    <!-- =================== Content Section ============ -->
    <section class="rating text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 bor">
                        <div class="row">
                            <h2 style="margin-top:30px">وجبات الطلب </h2>
                            @foreach($orders as $order)
                                @foreach($order->cart->items as $item)
                                    <div class="col-lg-4">
                                        <div class="rate">
                                            <div class="rate-head">
                                                <img alt="kitchen-logo" src="{{ asset('assets/site/images/') . '/' . $item['item']['image_name'] }}">
                                            </div><!-- End rate-head -->
                                            <div class="rate-content">
                                                <h4>{{ $item['item']['name']}}</h4>
                                            </div><!-- End rate-content -->
                                        </div><!-- End rate -->
                                    </div><!-- End col -->
                                @endforeach
                            @endforeach
                            <br>

                            <div class="col-md-6 col-md-offset-3">
                                <br>
                                @if(session()->has('c'))
                                    <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
                                @endif
                                <div class="message">
                                    <form action="{{ route('site.post_feedback', ['id' => auth()->guard('normaluser')->user()->id, 'order_id' => $orderea->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <label>اختر تقييمك</label>
                                        <div class="form-group">
                                            <select name="rate_number" class="form-control" style="padding: 3px">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <br>
                                        <label>اكتب تعليقك</label>
                                        <textarea name="comment" class="form-control" value=""  placeholder=""></textarea>
                                        <input type="submit" value="تقييم" class="btn btn-danger">
                                    </form>
                                </div><!-- End message -->
                            </div>
                        </div><!-- End row -->
                    </div><!-- End col -->
                </div><!-- End row -->

            </div><!-- End container -->
        </section><!-- End rating -->
@endsection