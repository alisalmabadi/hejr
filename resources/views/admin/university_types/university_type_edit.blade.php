@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.university-type.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش نوع دانشگاه
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> نوع دانشگاه ها</a></li>
            <li class="active">ویرایش نوع دانشگاه </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش نوع دانشگاه </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.university-type.update',$university_type)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
{{method_field('PATCH')}}
                    {{csrf_field()}}

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام نوع دانشگاه</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$university_type->name}}" placeholder="نام نوع دانشگاه"  class="form-control" type="text">
                            @if($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">وضعیت</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                                <option @if($university_type->status==1) selected @endif value="1">فعال</option>
                                <option @if($university_type->status==0) selected @endif value="0">غیر فعال</option>
                            </select>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')

@stop