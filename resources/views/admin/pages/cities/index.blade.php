@extends('admin.layouts.master')
@section('content')
    <style>
        th, td {
            text-align: center;
            padding: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('c'))
                <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
            @endif

            <div class="alert " id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إضافة المحافظات</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_city')}}" method="post" class="form-horizontal" onsubmit="return false;">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-3 control-label">المدينة</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="city" value="">
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="addBTN btn btn-circle green"><i class="fa fa-plus"></i> {{ trans('trans.add') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->


    <div class="row">
        <div class="col-md-12">

            <div class="alert " id="warna">

            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>المحافظات المضافه</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">

                    <div class="form-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>المحافظه</th>
                                <th>{{trans('trans.delete')}}</th>
                            </tr>

                            @foreach($cities as $city)
                                <tr>
                                    <td><input type="text" class="social_link form-control" name="link" value="{{ $city->city }}" /></td>

                                    <form method="post" action="{{ route('admin.delete_city', ['id' => $city->id]) }}">
                                        {{ csrf_field() }}
                                        <td><input type="submit" class="btn btn-danger" value="{{trans('trans.delete')}}" /></td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>

                        <div class="clearfix"></div>
                    </div>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('c'))
                <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
            @endif

            <div class="alert " id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إضافة الأنواع</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_type')}}" method="post" class="form-horizontal" onsubmit="return false;">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-3 control-label">النوع</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="type" value="">
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="addBTN btn btn-circle green"><i class="fa fa-plus"></i> {{ trans('trans.add') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->


    <div class="row">
        <div class="col-md-12">

            <div class="alert " id="warna">

            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>الانواع المضافه</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">

                    <div class="form-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>النوع</th>
                                <th>{{trans('trans.delete')}}</th>
                            </tr>

                            @foreach($types as $type)
                                <tr>
                                    <td><input type="text" class="social_link form-control" name="type" value="{{ $type->type }}" /></td>

                                    <form method="post" action="{{ route('admin.delete_type', ['id' => $type->id]) }}">
                                        {{ csrf_field() }}
                                        <td><input type="submit" class="btn btn-danger" value="{{trans('trans.delete')}}" /></td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>

                        <div class="clearfix"></div>
                    </div>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

@stop