@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.eventType.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.eventType.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            انواع رویدادها
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>انواع رویداد</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست انواع رویدادها</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/eventType/destroy" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">ID</td>
                                <td class="text-center"> نام</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($event_types))
                                @foreach($event_types as $item)
                                    <tr>
                                        <td class="text-center">
                                            <input name="selected[]" value="{{$item->id}}" type="checkbox">
                                        </td>
                                        <td class="text-center iranyekan"> {{$item->id}} </td>
                                        <td class="text-center">{{$item->name}}</td>
                                        <td class="text-center">
                                            @if($item->status == 1)
                                                <a href="{{route('admin.eventType.changeStatus' , $item)}}"><button class="btn btn-info" type="button">فعال</button></a>
                                            @else
                                                <a href="{{route('admin.eventType.changeStatus' , $item)}}"><button class="btn btn-danger" type="button">غیر فعال</button></a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.eventType.edit' , $item->id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection

