@extends('layouts.admin_master_full')
@section('style')



@endsection
@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.field.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.field.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
رشته ها        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>کلیه رشته ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست مناطق </h3>
            </div>
            <div class="panel-body">
                <form action="/admin/field/destroy" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($fields as $field)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$field->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center iranyekan"> {{$field->name}} </td>
           <td class="text-center">@if($field->status==1) <button class="btn btn-success" type="button">فعال</button> @else <button class="btn btn-danger" type="button">غیر فعال</button> @endif </td>
                                    <td class="text-center"><a class="btn btn-info" type="button" href="{{route('admin.field.edit',$field)}}">ویرایش</a> </td>
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

@section('admin-footer')
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/DT_bootstrap.js')}}"></script>
    <script src="{{asset('js/dynamic-table.js')}}"></script>
    <script type="text/javascript">
            $('#example1').dataTable();
    </script>

@endsection