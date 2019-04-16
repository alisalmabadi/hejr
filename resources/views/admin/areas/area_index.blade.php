@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.area.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.area.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
مناطق        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>کلیه منطقه ها</li>
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
                <form action="/admin/area/destroy" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center"> نام</td>
                                <td class="text-center">شهر</td>
                                <td class="text-center">استان</td>
                                <td class="text-center">عملیات</td>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($areas as $area)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$area->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center iranyekan">منطقه {{$area->name}} </td>
                                    <td class="text-center">{{$area->city->name}}</td>
                                    <td class="text-center">{{$area->province->name}}</td>
                                    <td class="text-center"><a class="btn btn-info" type="button" href="{{route('admin.area.edit',$area)}}">ویرایش</a> </td>

                                    {{-- <td class="text-center">@if($bast->status==1)<button class="btn btn-success">فعال</button> @else<button class="btn btn-danger">غیرفعال</button> @endif</td>--}}
{{--
                                    <td class="text-center">
                                        <a href="{{route('admin.bast.edit',$bast)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a>
--}}
{{--
                                        <a href="{{route('admin.post.create_bay_cat',$category)}}" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="افزودن پست"><i class="fa fa-sticky-note-o"></i></a>
--}}{{--

--}}
{{--
                                        <a href="{{route('admin.post.show_bay_cat',$category)}}" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="نمایش پست ها"><i class="fa fa-eye"></i></a>
--}}{{--

                                    </td>
--}}

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

