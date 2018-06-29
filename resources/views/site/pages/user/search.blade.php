@extends('site.layouts.master')
@section('content')

    <!-- =================== Search Section ============ -->
    <section class="search">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <div class="form-group form-lg">
                            <input class="form-control" placeholder="المطعم" type="text">
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-6">
                        <div class="form-group form-lg">
                            <input class="form-control" placeholder="المحافظه" type="text">
                        </div>
                    </div>

                    <div class="col-xss-12 col-xs-6 col-sm-4 col-md-2">
                        <input class="btn btn-block" value="بحث" type="submit"/>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- =================== Grid Kitchens Section ============ -->
    <section class="grid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>254 مطعم</h3>
                </div>
            </div>

            <div class="row">
                @foreach($kitchens as $kitchen)
                    <div class="col-md-3 col-sm-6">
                        <div class="one-kitchen">
                            <a href="{{ route('site.get_one_kitchen', ['id' => auth()->guard('normaluser')->user()->id, 'ch_id' => $kitchen->id]) }}">
                                <div class="image">
                                    <img src="{{ url('storage/uploads/chefs-profile-images/') . '/' . $kitchen->image_name }}" alt="">
                                </div>

                                <div class="content">
                                    <h5>{{ $kitchen->name }}</h5>
                                    <p>{{ substr($kitchen->description, 0, 100) }}...</p>
                                    <p class="clearfix"><span class="pull-right icon"><i class="fa fa-long-arrow-left"></i></span><span class="min-order">أقل طلب: </span> <span class="price">{{ $kitchen->min_order }}LE</span></p>
                                </div>

                                <div class="fav">
                                    <a href="#" style="color: #fff" class="btn btn-danger">إضافة للمفضلة</a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection