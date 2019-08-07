@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.article_category.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.article_category.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
دسته بندی مقالات
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-book"></i> بلاگ</a></li>
            <li class="active"><i class="fa fa-th"></i>دسته بندی مقالات</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست دسته بندی مقالات</h3>
            </div>
            <div class="panel-body">
                <form action="/9346790b5ef06657673da0bc27951f2ad9d97c44/article_category/destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام دسته بندی</td>
                                <td class="text-center">کلید یکتا</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($article_categories as $article_category)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$article_category->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$article_category->name}}</td>
                                    <td class="text-center">{{$article_category->slug}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.article_category.edit',$article_category)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>


                                    </td>

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

