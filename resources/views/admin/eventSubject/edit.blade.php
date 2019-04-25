@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.eventSubject.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            update eventSubject
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>event subjects</a></li>
            <li class="active">update event subject</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد هسته جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.eventSubject.update' , $event_subject->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" class="form-control" name="name" value="{{$event_subject->name}}">
                            @if($errors->first('name'))
                                <label style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">وضعیت</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="status">
                                <option value="1" @if($event_subject->status == 1) sekected @endif>فعال</option>
                                <option value="0" @if($event_subject->status == 0) sekected @endif>غیرفال</option>
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