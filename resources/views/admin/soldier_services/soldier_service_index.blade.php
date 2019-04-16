@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.soldier-service.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.soldier-service.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
وضعیت خدمت سربازی ها        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>کلیه وضعیت خدمت سربازی ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست مناطق </h3>
            </div>
            <div class="panel-body">
                <form action="/admin/soldier-service/destroy" method="post" enctype="multipart/form-data" id="form-material">
{{method_field('Delete')}}
                    {{csrf_field()}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($soldier_services as $soldier_service)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$soldier_service->id}}" type="checkbox">
                                    </td>
          <td class="text-center"> {{$soldier_service->name}}</td>

                                    <td class="text-center"><a class="btn btn-info" type="button" href="{{route('admin.soldier-service.edit',$soldier_service)}}">ویرایش</a> </td>
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

