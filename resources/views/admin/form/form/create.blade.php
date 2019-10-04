@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.form.form.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            فرم جدید
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>فرم ها</a></li>
            <li class="active">فرم جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد فرم جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.form.form.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            @if($errors->first('name'))
                                <label style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">نوع</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="form_type_id">
                                <option value="">انتخاب کنید</option>
                                @if(!empty($form_types))
                                    @foreach($form_types as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->first('form_type_id'))
                                <label style="color:red;">{{$errors->first('form_type_id')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">توضیحات</label>
                        <div class="col-md-4 col-lg-4">
                            <textarea class="form-control" name="description" cols="8">
                                {{old('description')}}
                            </textarea>
                            @if($errors->first('description'))
                                <label style="color:red;">{{$errors->first('description')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">وضعیت</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="form_status_id">
                                <option value="">انتخاب کنید</option>
                                @if(!empty($form_statuses))
                                    @foreach($form_statuses as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->first('form_status_id'))
                                <label style="color:red;">{{$errors->first('form_status_id')}}</label>
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