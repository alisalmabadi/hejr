@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.image.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            تصاویر
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>مدیریت تصاویر</a></li>
            <li class="active">تصویر جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>اضافه کردن تصویر جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.image.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">تصویر</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="file" class="form-control" name="image" value="{{old('image')}}">
                            @if($errors->first('image'))
                                <label style="color:red;">{{$errors->first('image')}}</label>
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