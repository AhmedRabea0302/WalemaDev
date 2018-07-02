@extends('admin.layouts.master')
@section('content')
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
        <div class="col-md-12">
            <div id="warna"></div>
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>المشاركين</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal AddForm" enctype="multipart/form-data">
                        <div class="form-body">


                            <table class="table table-bordered">
                                <tr>
                                    <th>البريد</th>
                                    <th>{{ trans('trans.reply') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>

                                @foreach($subscribers as $subscriber)

                                    <tr>
                                        <td>{{ $subscriber->email }}</td>
                                        <td><a href="{{ route('admin.get_reply_subscriber', ['id' => $subscriber->id]) }}" class="btn btn-info"> <i class="fa fa-paper-plane"> </i> رد </a></td>
                                        <td><a href="{{ route('admin.get_delete_subscriber', ['id' => $subscriber->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> {{ trans('trans.delete') }}</a></td>
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