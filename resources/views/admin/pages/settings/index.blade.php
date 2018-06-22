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
                        <i class="fa fa-gift"></i>{{ trans('trans.site_settings') }}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_settings')}}" method="post" class="form-horizontal" onsubmit="return false;" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3">{{ trans('trans.site_logo') }}</label>
                                <div class="col-md-4">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 260px; height: 150px;">
                                            <img class="omg-responsive center-block" src="{{ url('storage/uploads/settings') . '/' . $settings->image_name }}" alt="" style="width: 70%; height: 60%;"> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"> </div>
                                        <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> {{ trans('trans.select_image') }} </span>
                                            <span class="fileinput-exists"> {{ trans('trans.change') }} </span>
                                            <input type="file" name="image_name">
                                        </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('trans.remove') }} </a>
                                        </div>
                                    </div>
                                </div><!--End Col-->
                            </div><!--End form-group-->

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_name') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_name" value="{{ $settings->site_name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_url') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_url" value="{{ $settings->site_url }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_name_search') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_name_search" value="{{ $settings->site_name_search }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_email') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_email" value="{{ $settings->site_email }}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_language') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_lang" value="@if(app()->getLocale() == 'ar'){{ $settings->site_lang }} @else english @endif" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_address') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_address" value="{{ $settings->site_address}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ trans('trans.site_number') }}</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" name="site_number" value="{{ $settings->site_number }}" >
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="addBTN btn btn-circle green"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</button>
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
                        <i class="fa fa-gift"></i>إضافة رابط تواصل جديد</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_social_link')}}" method="post" class="form-horizontal" onsubmit="return false;" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">أضف رابط موقع التواصل</label>
                                    <input type="text" name="link" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="lead label-control">إختر أيقونة رابط التواصل</label>
                                <select class="form-control fa" name="icon">
                                    @foreach($icons as $key => $icon)
                                        <option value="{{$key}}">{{$icon}}</option>
                                    @endforeach
                                </select>
                            </div><!--End Col-->

                            <div class="clearfix"></div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle green addBTN"><i class="fa fa-plus"></i> {{ trans('trans.add') }}</button>
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
                        <i class="fa fa-gift"></i>روابط التواصل المضافة</div>
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
                                <th>رابط التواصل الإجتماعي</th>
                                <th>أيقونة التواصل الاجتماعي</th>
                                <th>{{trans('trans.update')}}</th>
                                <th>{{trans('trans.delete')}}</th>
                            </tr>

                            @foreach($social_links as $link)
                                <tr>
                                    <td><input type="text" class="social_link form-control" name="link" value="{{ $link->link }}" /></td>
                                    <td>
                                        <select class="social_icon form-control fa" name="icon">
                                            @foreach($icons as $key => $icon)
                                                <option value="{{ $key }}" @if($link->icon == $key){{'selected'}}@endif>{{$icon}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <a class="editTypeBTN btn btn-info" data-token="{{ csrf_token() }}" data-url="{{ route('admin.update_social_link', ['id' => $link->id]) }}" data-id="{{ $link->id }}">{{trans('trans.update')}}</a>
                                    </td>

                                    <form method="post" action="{{ route('admin.delete_social_link', ['id' => $link->id]) }}">
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