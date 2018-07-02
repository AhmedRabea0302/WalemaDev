@extends('admin.layouts.master')
@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0p2dgpccy0nkyzpvzlwuujsf4i5c3p0qu16q9143x08mo9on"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <style>
        table {
            width: 80%;
        }
        th, td {
            text-align: center;
            padding: 20px;
        }
    </style>
    <div class="row">
        <div class="alert" id="warna"></div>

        <div class="col-md-12">
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>الرسائل</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>اسم المرسل</th>
                                    <th>البريد</th>
                                    <th>الرسالة</th>
                                    <th>رد</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>

                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td><a href="{{ route('admin.get_reply_message', ['id' => $message->id]) }}" class="btn btn-info"><i class="fa fa-paper-plane"></i> رد</a></td>
                                        <td><a href="{{ route('admin.post_delete_message', ['id' => $message->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> حذف</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

@stop