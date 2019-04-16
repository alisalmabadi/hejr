@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.area.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            افزودن منطقه جدید
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> منطقه ها</a></li>
            <li class="active">ایجاد منطقه جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد منطقه جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.area.update',$area)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">شماره منطقه</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" value="{{$area->name}}" placeholder="نام منطقه"  class="form-control" type="number">
                            @if($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="row" style="padding: 10px 10px;">
                        <div class="col-sm-6">
                            <label for="province">استان</label>
                            <select id="province" class="form-control" name="province_id" required>
                                <option>انتخاب کنید</option>
                                @foreach($provinces as $province)<option @if($area->province->id == $province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="city">شهر</label>
                            <select id="city" class="form-control"  name="city_id" required>
                                <option>انتخاب کنید</option>
                            </select>
                        </div>
                    </div>

                    {{--
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="status">وضعیت</label>
                                            <div class="col-sm-6">
                                                <select name="status" class="form-control">
                                                    <option value="1">
                                                        فعال
                                                    </option>
                                                    <option value="0">
                                                        غیرفعال
                                                    </option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                    --}}
                    {{--
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="price">قیمت</label>
                                            <div class="col-sm-6">
                                                <input id="price" name="price" value="{{old('price')}}" placeholder="قیمت را وارد کنید"  class="form-control" type="number">
                                                @if($errors->has('price'))
                                                    <span class="help-block">
                                                            <strong>{{$errors->first('price')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                    --}}

                    {{--        <div class="form-group required">
                                <label class="col-sm-2 control-label" for="price">توضیحات</label>
                                <div class="col-sm-6">
                                    <textarea id="price" name="description" value="" placeholder=""  class="form-control">{{old('description')}} </textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">
                                                <strong>{{$errors->first('description')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="link">تصویر اول بست</label>
                            <div class="imageshow">

                            </div>
        <input type="file" name="image" class="form-control">
                                @if($errors->has('image'))
                                    <span class="help-block">
                                                <strong>{{$errors->first('image')}}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="link">تصویر دوم بست</label>
                                <div class="imageshow">

                                </div>
                                <input type="file" name="image2" class="form-control">
                                @if($errors->has('image2'))
                                    <span class="help-block">
                                                <strong>{{$errors->first('image2')}}</strong>
                                        </span>
                                @endif
                            </div>
        --}}

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
    </script>
    {{--End--}}

    {{--get province and cities after province_change for add new address modal--}}
@stop