@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.form.field.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش فیلد
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>فیلدها</a></li>
            <li class="active">ویرایش</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش فیلد</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.form.field.update', $field)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="name" value="{{$field->name}}">
                            @if($errors->first('name'))
                                <label style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">نوع</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="type">
                                <option value="">انتخاب کنید</option>
                                <option value="1" @if($field->type == 1) selected @endif>text box</option>
                                <option value="2" @if($field->type == 2) selected @endif>check box</option>
                                <option value="3" @if($field->type == 3) selected @endif>drop down</option>
                            </select>
                            @if($errors->first('type'))
                                <label style="color:red;">{{$errors->first('type')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">وضعیت</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="status">
                                <option value="">انتخاب کنید</option>
                                <option value="1" @if($field->status == 1) selected @endif>فعال</option>
                                <option value="0" @if($field->status == 0) selected @endif>غیر فعال</option>
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