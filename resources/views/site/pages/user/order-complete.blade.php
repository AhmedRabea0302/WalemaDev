@extends('site.layouts.master')
@section('content')
    <!-- ======================= Content Section ==================== -->
    <section class="completion">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="thanks-content">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <h2>شكرا لطلبك من خلال وليمة</h2>
                    <p>لقد تم طلبك بنجاح ! يمكنك متابعة حالة طلبك وتعقبه من خلال رابط الطلبات الموجوده في لوحة تحكمك يمكنك الذهاب من
                    <a href="{{ route('site.get-user-orders', ['id', auth()->guard('normaluser')->user()->id]) }}">هنا</a><br>إستمتع بقهوتك واتركنا ننجز عزومتك! </p>
                    
                    <div class="clearfix app-imagea">
                        <img src="{{ asset('assets/site/images/app-img.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection