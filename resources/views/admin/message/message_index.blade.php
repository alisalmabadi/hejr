@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.message.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.message.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
پیام ها        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>کلیه پیام ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست پیام ها </h3>
            </div>
            <div class="panel-body">
                <form action="/admin/message/destroy" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> عنوان</td>
                                <td class="text-center">متن</td>
                                <td class="text-center">نوع</td>
                                <td class="text-center">کاربران ارسالی</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($messages as $message)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$message->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center"> {{$message->title}}</td>
           <td class="text-center">{!! $message->text !!}</td>
                                    <td class="text-center">{{$message->message_type->name}}</td>
                                    <td class="text-center">
                                        <ul>

                                        @foreach($message->users as $user)
                                            <li>{{$user->name}} {{$user->lastname}}</li>

                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">@if($message->status==1) <button class="btn btn-success" type="button">فعال</button> @else <button class="btn btn-danger" type="button">غیر فعال</button> @endif </td>
                                    <td class="text-center"><a class="btn btn-info" href="{{route('admin.message.edit',$message)}}">ویرایش</a> </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection

