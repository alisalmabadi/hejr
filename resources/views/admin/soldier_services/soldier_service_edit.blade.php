@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.soldier-service.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش وضعیت خدمت سربازی
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> وضعیت خدمت سربازی ها</a></li>
            <li class="active">ویرایش وضعیت خدمت سربازی </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش وضعیت خدمت سربازی </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.soldier-service.update',$soldier_service)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
{{csrf_field()}}
{{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام وضعیت خدمت سربازی</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$soldier_service->name}}" placeholder="نام وضعیت خدمت سربازی"  class="form-control" type="text">
                            @if($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')

@stop