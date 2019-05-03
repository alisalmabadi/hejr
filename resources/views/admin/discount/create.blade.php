@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.discount.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            تخفیف جدید
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>تخفیف ها</a></li>
            <li class="active">تخفیف جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد تخفیف جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.discount.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            @if($errors->first('name'))
                                <label style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">کد تخفیف</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="code" value="{{old('code')}}">
                            @if($errors->first('code'))
                                <label style="color:red;">{{$errors->first('code')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">درصد</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="percent" value="{{old('percent')}}">
                            @if($errors->first('percent'))
                                <label style="color:red;">{{$errors->first('percent')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">قیمت شروع</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="start_price" value="{{old('start_price')}}">
                            @if($errors->first('start_price'))
                                <label style="color:red;">{{$errors->first('start_price')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">وضعیت</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="status">
                                <option value="" selected>انتخاب کنید</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                            @if($errors->first('status'))
                                <label style="color:red;">{{$errors->first('status')}}</label>
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