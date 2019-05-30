@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.event.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش رویداد
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>رویدادها</a></li>
            <li class="active">ویرایش رویداد</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش رویداد</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.event.update',$event)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('Patch')}}
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{$event->name}}">
                            @if($errors->first('name'))
                                <label style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-1 col-lg-1">توضیحات</label>
                        <div class="col-md-5 col-lg-5">
                            <textarea name="description" class="form-control">{{$event->description}}</textarea>
                            @if($errors->first('description'))
                                <label style="color:red;">{{$errors->first('description')}}</label>
                            @endif
                        </div>
                        <label class="col-md-1 col-lg-1">توضیحات اجمالی</label>
                        <div class="col-md-5 col-lg-5">
                            <textarea name="long_description" class="form-control">{{$event->long_description}}</textarea>
                            @if($errors->first('long_description'))
                                <label style="color:red;">{{$errors->first('long_description')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">تاریخ شروع</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" name="start_date" class="form-control start_date" value="{{$event->start_date}}">
                            @if($errors->first('start_date'))
                                <label style="color:red;">{{$errors->first('start_date')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">تاریخ پایان</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" name="end_date" class="form-control end_date" value="{{$event->end_date}}">
                            @if($errors->first('end_date'))
                                <label style="color:red;">{{$errors->first('end_date')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">تاریخ پایان ثبت نام</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" name="end_date_signup" class="form-control end_date_signup" value="{{$event->end_date_signup}}">
                            @if($errors->first('end_date_signup'))
                                <label style="color:red;">{{$errors->first('end_date_signup')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">قیمت</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" name="price" class="form-control" value="{{$event->price}}">
                            @if($errors->first('price'))
                                <label style="color:red;">{{$errors->first('price')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">ظرفیت</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" name="capacity" class="form-control" value="{{$event->capacity}}">
                            @if($errors->first('capacity'))
                                <label style="color:red;">{{$errors->first('capacity')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">موضوع رویداد</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="event_subject_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($event_subjects as $event_subject)
                                    <option value="{{$event_subject->id}}" @if($event_subject->id == $event->event_subject_id) selected @endif>{{$event_subject->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('event_subject_id'))
                                <label style="color:red;">{{$errors->first('event_subject_id')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نوع رویداد</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="event_type_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($event_types as $event_type)
                                    <option value="{{$event_type->id}}" @if($event_type->id == $event->event_type_id) selected @endif>{{$event_type->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('event_type_id'))
                                <label style="color:red;">{{$errors->first('event_type_id')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">وضعیت رویداد</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="event_status_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($event_statuses as $event_status)
                                    <option value="{{$event_status->id}}" @if($event_status->id == $event->event_status_id) selected @endif>{{$event_status->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('event_status_id'))
                                <label style="color:red;">{{$errors->first('event_status_id')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">استان</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control province_selector" name="province_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}" @if($province->id == $event->province_id) selected @endif>{{$province->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('province_id'))
                                <label style="color:red;">{{$errors->first('province_id')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2">شهر</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control city_selector" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" @if($city->id == $event->city_id) selected @endif>{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('city_id'))
                                <label style="color:red;">{{$errors->first('city_id')}}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">آدرس</label>
                        <div class="col-md-4 col-lg-4">
                            <textarea class="form-control" name="address">{{old('address')}}</textarea>
                            @if($errors->first('address'))
                                <label style="color:red;">{{$errors->first('address')}}</label>
                            @endif
                        </div>
                        <label class="col-md-2 col-lg-2 control-label" for="instagram_id">مختصات <a href="https://jsfiddle.net/ehLr8ehk/">لیفلت</a> </label>

                        <div class="col-sm-2">
                            <input id="xplace" name="xplace" value="{{old('xplace')}}" placeholder="xplace" class="form-control" type="text">
                            <label class="success">
                                مختصات lat
                            </label>
                            <label style="color:red">
                                @if($errors->has('xplace'))
                                    {{$errors->first('xplace')}}
                                @endif
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <input id="yplace" name="yplace" value="{{old('yplace')}}" placeholder="yplace" class="form-control" type="text">
                            <label class="success">
                                مختصات lng
                            </label>
                            <label style="color:red">
                                @if($errors->has('yplace'))
                                    {{$errors->first('yplace')}}
                                @endif
                            </label>
                        </div>


                    </div>

                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">هسته اصلی</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="center_core_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($cores as $core)
                                    <option value="{{$core->id}}" @if($core->id == $event->center_core_id) selected @endif>{{$core->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('center_core_id'))
                                <label style="color:red;">{{$errors->first('center_core_id')}}</label>
                            @endif
                        </div>
                    </div>
{{--
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">اطلاعات تکمیلی</label>
                        <div class="col-md-10 col-lg-10">
                            <textarea class="form-control" name="information">{{$event->information}}</textarea>
                            @if($errors->first('information'))
                                <label style="color:red;">{{$errors->first('information')}}</label>
                            @endif
                        </div>
                    </div>
--}}
                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')

    {{--select province and get cities--}}
    <script>
        $(".province_selector").on('change' , function(){
            var id = $(this).val();
            var url = "{{route('admin.event.city_selector')}}";

            $.ajax({
                data:{'province_id':id},
                url:url,
                type:'GET',
                success:function(cities){
                    $(".city_selector").html('');
                    $.each(cities , function(city){
                        $(".city_selector").append('<option value="'+cities[city].id+'">'+cities[city].name+'</option>');
                    });
                },
                error:function(){
                    console.log('error');
                }
            });
        });
    </script>
    {{--end of select province and get cities--}}

    {{--Persian Date picker everything--}}
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        <script src="js/jquery.js"></script>
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>
    <style>
        .pwt-btn-calendar {
            display: none !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".start_date").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY-MM-DD",
                onSelect: "year",
                initialValue: false
            });
            $(".end_date").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY-MM-DD",
                onSelect: "year",
                initialValue: false
            });
            $(".end_date_signup").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY-MM-DD",
                onSelect: "year",
                initialValue: false
            });
        });
    </script>
    {{--End of Persian Date picker everything--}}

    {{--textareas ckEditor--}}
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'long_description' );
    </script>
    {{--end of textareas ckEditor--}}
@stop