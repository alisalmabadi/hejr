@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.field.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            افزودن رشته جدید
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> رشته ها</a></li>
            <li class="active">ایجاد رشته جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد رشته جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.field.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">نام رشته</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="نام رشته"  class="form-control" type="text">
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
                 <option value="1">فعال</option>
                 <option value="0">غیر فعال</option>
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