@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.form.field.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.form.field.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
فیلدهای فرم
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>کلیه هسته ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست هسته </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">#</td>
                            <td class="text-center"> نام</td>
                            <td class="text-center">نوع</td>
                            <td class="text-center">وضعیت</td>
                            <td class="text-center">عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($form_fields))
                        @php($index = 1)
                        @foreach($form_fields as $item)
                            <tr>
                                <td class="text-center iranyekan"> {{$index}} </td>
                                <td class="text-center iranyekan"> {{$item->name}} </td>
                                <td class="text-center">{{$item->type}}</td>
                                <td class="text-center">
                                    @if($item->status == 0)
                                        <label class="label-danger">غیر فعال</label>
                                    @else   
                                        <label class="label-primary">فعال</label>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{route('admin.form.field.edit', $item)}}" class="btn btn-warning">ویرایش</a>
                                    <a onClick="return confirm('آیا اطمینان دارید؟');" href="{{route('admin.form.field.delete', $item)}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @php($index+=1)
                        @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </section>

@endsection

