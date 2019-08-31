@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.core.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.core.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
هسته ها        </h1>
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
                <form action="/admin/core/destroy" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">آی دی</td>
                                <td class="text-center"> نام</td>
                                <td class="text-center">شهر</td>
                                <td class="text-center">استان</td>
                                <td class="text-center">مناطق</td>
                                <td class="text-center">مدیر هسته</td>
                                <td class="text-center">وضعیت</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cores as $core)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$core->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center iranyekan"> {{$core->id}} </td>
                                    <td class="text-center iranyekan"> {{$core->name}} </td>
                                    <td class="text-center">{{$core->city->name}}</td>
                                    <td class="text-center">{{$core->province->name}}</td>

                                    <td class="text-center">
                                        @foreach($core->areas as $area)
                                          <ul>
                                          <li class="iranyekan">منطقه {{$area->name}} </li>

                                          </ul>
                                            @endforeach
                                    </td>

                                    <td class="text-center">
                                       @if($core->admin != null )
                                            {{$core->admin->name }}  {{$core->admin->lastname }}

                                        @else
                                           <button class="btn btn-danger" type="button">ندارد</button>
                                           @endif
                                    </td>

                                    <td class="text-center">@if($core->status==1) <button class="btn btn-success" type="button">فعال</button> @else <button class="btn btn-danger" type="button">غیر فعال</button> @endif </td>


                                    <td class="text-center"><a class="btn btn-info" type="button" href="{{route('admin.core.edit',$core)}}">ویرایش</a> </td>

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

