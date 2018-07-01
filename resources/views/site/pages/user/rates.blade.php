@extends('site.layouts.master')
@section('content')

    <!-- =================== Content Section ============ -->
    <section class="order-rate">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-offset-2">
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


@endsection