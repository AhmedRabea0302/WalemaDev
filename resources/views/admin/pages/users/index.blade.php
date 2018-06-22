@extends('admin.layouts.master')
@section('content')
    <style>
        table th, td {
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-md-12" >
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div class="alert" id="warna">

            </div>

            <div class="portlet box green" style="padding: 15px">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إضافة مدير</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form" >
                    <h2 style="padding: 15px;">إضافة مدير</h2>
                    <form action="{{route('admin.add_user')}}" method="post" style="padding: 15px;" class="AddForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="lead">إسم المدير</label>
                            <input type="text" id="user_name" name="user_name" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label class="lead">بريد المدير</label>
                            <input type="email" id="user_email" name="email" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label class="lead">كلمة السر</label>
                            <input type="password" id="user_pass" name="user_pass" class="form-control" />
                        </div>

                        <input type="submit" value="{{ trans('trans.add') }}" class="btn btn-success">
                    </form>
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

    <div class="row">
        <div class="col-md-12">
            <div class="alert" id="update-lower">

            </div>
            <div class="portlet box green" style="padding: 15px;">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>كل المديرين</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div method="post" class="form-horizontal" style="padding: 15px;" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <table class="table table-bordered">
                                <tr>
                                    <th>إسم المدير</th>
                                    <th>كلمة السر الجديدة</th>
                                    <th>{{ trans('trans.update') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>

                                @foreach($panel_users as $user)
                                    <tr>
                                        <form class="AddForm" method="post">
                                            {{ csrf_field() }}
                                            <td>
                                                <input type="text" name="new_name" class="form-control user_name" value="{{$user->name}}" />
                                            </td>
                                            <td><input type="password" name="new_password" class="form-control new_password" /></td>
                                            <td><a class="updateUser btn btn-info" data-token="{{ csrf_token() }}" data-url="{{ route('admin.update_user', ['id' => $user->id]) }}" data-id="{{ $user->id }}">{{trans('trans.update')}}</a></td>
                                        </form>
                                        <form action="{{route('admin.delete_user', ['id' => $user->id])}}" method="post">
                                            {{ csrf_field() }}
                                            <td><input type="submit" class="btn btn-danger" value="{{ trans('trans.delete') }}"></td>
                                        </form>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

@stop