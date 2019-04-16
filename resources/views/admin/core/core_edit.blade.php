@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.core.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            افزودن هسته جدید
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> هسته ها</a></li>
            <li class="active">ایجاد هسته جدید</li>
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
                <form action="{{route('admin.core.update',$core)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام هسته</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$core->name}}" placeholder="نام هسته"  class="form-control" type="text">
                            @if($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="row" style="padding: 10px 10px;">
                        {{--
                                                <div class="col-sm-4">
                        --}}
                        <label class="col-sm-1 control-label" for="province">استان</label>
                        <select id="province" class="col-sm-4" name="province_id" required>
                            <option>انتخاب کنید</option>
                            @foreach($provinces as $province)
   <option @if($province->id == $core->province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                        {{--
                                                </div>
                        --}}
                        {{--<div class="col-sm-4">--}}
                        <label class="col-sm-1 control-label" for="city">شهر</label>
                        <select id="city" class="col-sm-4"  name="city_id" required>
                            <option>انتخاب کنید</option>
                        </select>
                        {{--
                                                </div>
                        --}}
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keywords">انتخاب مناطق</label>
                        <div class="col-sm-6">

                            <select name="area[]" id="area" class="form-control area" style="width: 100%"  multiple="" tabindex="-1">

                                @foreach($areas as $area)
 <option @if(in_array($area->id,$core->areas()->pluck('id')->toArray())) selected @endif value="{{$area->id}}" >{{$area->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">مدیر هسته</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="admin_id">
                                @foreach($users as $user)
      <option @if($user->id== $core->admin_id) selected @endif value="{{$user->id}}">{{$user->name}}  {{$user->lastname}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">وضعیت</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                                <option @if($core->status== 1) selected @endif value="1">فعال</option>
                                <option @if($core->status== 0) selected @endif value="0">غیر فعال</option>
                            </select>
                        </div>
                    </div>



                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    {{--get province and cities after province_change for edit modal--}}
    <script>
        $.ajaxSetup
        ({
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $("#province").change(function(e){
            e.preventDefault();
            var data = $(this).val();
            var url = "{{route('show_cities')}}";
            var type = "POST";
            console.log(data);
            $.ajax({
                data:{id:data},
                url:url,
                type:type,
                dataTy:'JSON',
                success:function(cities)
                {
                    $("#city").html('');
                    $.each(cities , function (city)
                    {
                        $("#city").append("<option value="+cities[city].id+">"+cities[city].name+"</option>");
                    })
                },
                error:function(e)
                {
                    $("#city").html('');
                    $("#city").append("<option>خطا</option>");
                }
            });
        });


        $('#area').select2({
            multiple:true,
            maximumSelectionLength:40,
            placeholder: "تگ ها را انتخاب یا اضافه کنید",
            allowClear: true,
            tags: true,
        });
    </script>
    {{--End--}}

    {{--get province and cities after province_change for add new address modal--}}
@stop