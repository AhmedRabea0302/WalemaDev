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
                    <h3>{{ $meals->count() }} وجبة</h3>
                </div>
            </div>

            <div class="row">
                @foreach($meals as $meal)
                    <div class="col-md-3 col-sm-6">
                        <div class="one-kitchen">
                            <a href="{{ route('site.get_one_kitchen', ['id' => auth()->guard('normaluser')->user()->id, 'ch_id' => $meal->chef_id]) }}">
                                <div class="image">
                                    <img src="{{ url('storage/uploads/meals/') . '/' . $meal->image_name }}" alt="">
                                </div>

                                <div class="content">
                                    <h5>{{ $meal->name }}</h5>
                                    <p>{{ substr($meal->description, 0, 100) }}...</p>
                                    <p class="clearfix"><span class="pull-right icon"><i class="fa fa-long-arrow-left"></i></span><span class="min-order">سعر الوجبة: </span> <span class="price">{{ $meal->price }}LE</span></p>
                                </div>

                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection