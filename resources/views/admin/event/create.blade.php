@extends('layouts.admin_master_full')
@section('style')
    <style>
        .tab-content > .tab-pan{
            display: none;
        }
        .tab-content > .active{
            display: block;
        }
        </style>
@endsection
@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" id="submit_base_frm" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره" style="display:none"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.event.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            رویداد جدید
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>رویدادها</a></li>
            <li class="active">رویداد جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>اضافه کردن رویداد جدید</h3>
            </div>
            <div class="panel-body">
               <form action="{{route('admin.event.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}

               <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#general" id="general_clicker" data-toggle="tab">عمومی</a></li>
                    <li><a href="#time_tab" id="time_tab_clicker" data-toggle="tab" style="display:none;">زمان</a></li>
                    <li><a href="#address_tab" id="address_tab_clicker" data-toggle="tab" style="display:none;">آدرس</a></li>
                    <li><a href="#gallery" id="image_tab_clicker" data-toggle="tab" style="display:none;">گالری</a></li>
               </ul>


        <div class="tab-content">
                        <!-- general tab content -->
            <div class="tab-pan fade in active" id="general">
                            <h3>عمومی</h3>
                            <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="general_gif">
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" id="gentral_name" name="name" value="{{old('name')}}">
                            @if($errors->first('name'))
                                <label style="color:red;">{{$errors->first('name')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_name_error"></label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-1 col-lg-1">توضیحات</label>
                        <div class="col-md-5 col-lg-5">
                            <textarea name="description" class="form-control" id="general_description">{{old('description')}}</textarea>
                            @if($errors->first('description'))
                                <label style="color:red;">{{$errors->first('description')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_description_error"></label>
                        </div>
                        <label class="col-md-1 col-lg-1">توضیحات اجمالی</label>
                        <div class="col-md-5 col-lg-5">
                            <textarea name="long_description" class="form-control" id="general_long_description">{{old('long_description')}}</textarea>
                            @if($errors->first('long_description'))
                                <label style="color:red;">{{$errors->first('long_description')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_long_description_error"></label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">قیمت</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" name="price" class="form-control" id="general_price" value="{{old('price')}}">
                            @if($errors->first('price'))
                                <label style="color:red;">{{$errors->first('price')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_price_error"></label>
                        </div>
                        <label class="col-md-2 col-lg-2">ظرفیت</label>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" name="capacity" class="form-control" id="general_capacity" value="{{old('capacity')}}">
                            @if($errors->first('capacity'))
                                <label style="color:red;">{{$errors->first('capacity')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_capacity_error"></label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">موضوع رویداد</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="event_subject_id" id="general_event_subject_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($event_subjects as $event_subject)
                                    <option value="{{$event_subject->id}}" @if($event_subject->id == old('event_subject_id')) selected @endif>{{$event_subject->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('event_subject_id'))
                                <label style="color:red;">{{$errors->first('event_subject_id')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_event_subject_id_error"></label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نوع رویداد</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="event_type_id" id="general_event_type_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($event_types as $event_type)
                                    <option value="{{$event_type->id}}" @if($event_type->id == old('event_type_id')) selected @endif>{{$event_type->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('event_type_id'))
                                <label style="color:red;">{{$errors->first('event_type_id')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_event_type_id_error"></label>
                        </div>
                        <label class="col-md-2 col-lg-2">وضعیت رویداد</label>
                        <div class="col-md-4 col-lg-4">
                            <select class="form-control" name="event_status_id" id="general_event_status_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($event_statuses as $event_status)
                                    <option value="{{$event_status->id}}" @if($event_status->id == old('event_status_id')) selected @endif>{{$event_status->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('event_status_id'))
                                <label style="color:red;">{{$errors->first('event_status_id')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_event_status_id_error"></label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">هسته اصلی</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="center_core_id" id="general_center_core_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($cores as $core)
                                    <option value="{{$core->id}}" @if($core->id == old('center_core_id')) selected @endif>{{$core->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('center_core_id'))
                                <label style="color:red;">{{$errors->first('center_core_id')}}</label>
                            @endif
                            <label style="color:red;display:none;" id="general_center_core_id_error"></label>
                        </div>
                    </div>
{{--
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">اطلاعات تکمیلی</label>
                        <div class="col-md-10 col-lg-10">
                            <textarea class="form-control" name="information">{{old('information')}}</textarea>
                            @if($errors->first('information'))
                                <label style="color:red;">{{$errors->first('information')}}</label>
                            @endif
                        </div>
                    </div>
--}}
                 {{--   <div class="form-group required">
                        <label class="col-md-2 col-lg-2">تصویر</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="file" class="form-control" name="image">
                            @if($errors->first('image'))
                                <label style="color:red;">{{$errors->first('image')}}</label>
                            @endif
                        </div>
                    </div>--}}
                    <div class="form-group">
                        <a href="{{route('user.event.create.validate1')}}" class="btn-validate1"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>
                    </div>
                </div>


            <div class="tab-pan fade in" id="time_tab">
                <h3>تعیین زمان بندی رویداد</h3>
                <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="time_gif">
                <div class="form-group required">
                    <label class="col-md-2 col-lg-2">تاریخ شروع</label>
                    <div class="col-md-4 col-lg-4">
                        <input type="text" name="start_date" class="form-control start_date" value="{{old('start_date')}}">
                        @if($errors->first('start_date'))
                            <label style="color:red;">{{$errors->first('start_date')}}</label>
                        @endif
                        <label id="time_start_date_error" style="color:red;display:none;"></label>
                    </div>
                    <label class="col-md-2 col-lg-2">تاریخ پایان</label>
                    <div class="col-md-4 col-lg-4">
                        <input type="text" name="end_date" class="form-control end_date" value="{{old('end_date')}}">
                        @if($errors->first('end_date'))
                            <label style="color:red;">{{$errors->first('end_date')}}</label>
                        @endif
                        <label id="time_end_date_error" style="color:red;display:none;"></label>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-md-2 col-lg-2">تاریخ پایان ثبت نام</label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" name="end_date_signup" class="form-control end_date_signup" value="{{old('end_date_signup')}}">
                        @if($errors->first('end_date_signup'))
                            <label style="color:red;">{{$errors->first('end_date_signup')}}</label>
                        @endif
                        <label id="time_end_date_singup_error" style="color:red;display:none;"></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                        <a href="#" class="btn-back_to_validate1"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <a href="{{route('user.event.create.validate2')}}" class="btn-validate2"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>                    
                    </div>
                </div>
            </div>

            <div class="tab-pan fade in" id="address_tab">
                <h3>تعیین آدرس</h3>
                <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="address_gif">
                <div class="form-group required">
                    <label class="col-md-2 col-lg-2">استان</label>
                    <div class="col-md-4 col-lg-4">
                        <select class="form-control province_selector" name="province_id">
                            <option value="">انتخاب کنید</option>
                            @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->first('province_id'))
                            <label style="color:red;">{{$errors->first('province_id')}}</label>
                        @endif
                        <label id="address_province_id" style="color:red;display:none;"></label>
                    </div>
                    <label class="col-md-2 col-lg-2">شهر</label>
                    <div class="col-md-4 col-lg-4">
                        <select class="form-control city_selector" name="city_id">
                            <option value="">انتخاب کنید</option>
                        </select>
                        @if($errors->first('city_id'))
                            <label style="color:red;">{{$errors->first('city_id')}}</label>
                        @endif
                        <label id="address_city_id" style="color:red;display:none;"></label>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-md-2 col-lg-2">آدرس</label>
                    <div class="col-md-4 col-lg-4">
                        <textarea class="form-control" name="address">{{old('address')}}</textarea>
                        @if($errors->first('address'))
                            <label style="color:red;">{{$errors->first('address')}}</label>
                        @endif
                        <label id="address_address" style="color:red;display:none;"></label>
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
                        <label id="address_xplace" style="color:red;display:none;"></label>
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
                        <label id="address_yplace" style="color:red;display:none;"></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                        <a href="#" class="btn-back_to_validate2"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <a href="{{route('user.event.create.validate3')}}" class="btn-validate3"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>                    
                    </div>
                </div>
            </div>

            <div class="tab-pan fade in" id="gallery">
                <h3>تصویرهای رویداد</h3>

                <div class="col-md-12 col-lg-10">
                  <div class="col-md-10">
                <div class="form-group required">


                    <table class="table">
                    <tbody id="imagefield">
                        <tr>
                            <td>
 <input class="form-control" type="file" name="image[]">
                            </td>
                            <td>
                            </td>

                        </tr>
                    </tbody>
                    </table>
                </div>


                </div>

                </div>
                    <div class="col-md-2">
                        <button class="btn btn-success center" type="button" id="addphoto">افزودن فیلد عکس</button>
                    </div>
                    </div>


        </div>


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
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">--}}
{{--
        <script src="js/jquery.js"></script>
--}}
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
    $('#addphoto').click(function () {
        $('#imagefield').append(' <tr>\n' +
            '                            <td>\n' +
            ' <input class="form-control" type="file" name="image[]">\n' +
            '                            </td>\n' +
            '                            <td>\n' +
            '<button type="button" class="btn btn-danger deleterow">حذف</button>\n' +
            '                            </td>\n' +
            '\n' +
            '                        </tr>');
        $('.deleterow').click(function () {
            $(this).parents('tr').remove();
        });
    });



    </script>
    {{--End of Persian Date picker everything--}}


    {{--validates--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-validate1").on('click', function(e){
            e.preventDefault();
            $("#general_gif").fadeIn("slow");

            $("#general_name_error").fadeOut("slow");
            $("#general_description_error").fadeOut("slow");
            $("#general_long_description_error").fadeOut("slow");
            $("#general_price_error").fadeOut("slow");
            $("#general_capacity_error").fadeOut("slow");
            $("#general_event_status_id_error").fadeOut("slow");
            $("#general_event_type_id_error").fadeOut("slow");
            $("#general_event_subject_id_error").fadeOut("slow");
            $("#general_center_core_id_error").fadeOut("slow");

            var data = $("#general :input").serialize();
            var url = $(this).attr('href');
            $.ajax({
                data:data,
                url:url,
                type:"post",
                success:function(data){
                    swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'موفقیت آمیز',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $("#general_gif").fadeOut("slow");
                    $("#time_tab_clicker").fadeIn("slow");
                    $("#time_tab_clicker").trigger("click");
                    $("#general_clicker").fadeOut("slow");
                },
                error:function(e){
                    console.log('error in step general');
                    if(e.responseJSON.errors.name){
                        $("#general_name_error").text(e.responseJSON.errors.name[0]);
                        $("#general_name_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.description){
                        $("#general_description_error").text(e.responseJSON.errors.description[0]);
                        $("#general_description_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.long_description){
                        $("#general_long_description_error").text(e.responseJSON.errors.long_description[0]);
                        $("#general_long_description_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.price){
                        $("#general_price_error").text(e.responseJSON.errors.price[0]);
                        $("#general_price_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.capacity){
                        $("#general_capacity_error").text(e.responseJSON.errors.capacity[0]);
                        $("#general_capacity_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.event_status_id){
                        $("#general_event_status_id_error").text(e.responseJSON.errors.event_status_id[0]);
                        $("#general_event_status_id_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.event_type_id){
                        $("#general_event_type_id_error").text(e.responseJSON.errors.event_type_id[0]);
                        $("#general_event_type_id_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.event_subject_id){
                        $("#general_event_subject_id_error").text(e.responseJSON.errors.event_subject_id[0]);
                        $("#general_event_subject_id_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.center_core_id){
                        $("#general_center_core_id_error").text(e.responseJSON.errors.center_core_id[0]);
                        $("#general_center_core_id_error").fadeIn("slow");
                    }
                    $("#general_gif").fadeOut("slow");
                }
            });
        });
    </script>
    <script>
        $(".btn-validate2").on("click", function(e){
            e.preventDefault();
            $("#time_gif").fadeIn("slow");

            $("#time_start_date_error").fadeOut("slow");
            $("#time_end_date_error").fadeOut("slow");
            $("#time_end_date_singup_error").fadeOut("slow");

            var data = $("#time_tab :input").serialize();
            var url = $(this).attr('href');
            $.ajax({
                data:data,
                url:url,
                type:"POST",
                success:function(){
                    swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'موفقیت آمیز',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $("#time_gif").fadeOut("slow");
                    $("#address_tab_clicker").fadeIn("slow");
                    $("#address_tab_clicker").trigger("click");
                    $("#time_tab_clicker").fadeOut("slow");
                },
                error:function(e){
                    console.log('error in time_tab');
                    if(e.responseJSON.errors.start_date){
                        $("#time_start_date_error").text(e.responseJSON.errors.start_date[0]);
                        $("#time_start_date_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.end_date){
                        $("#time_end_date_error").text(e.responseJSON.errors.end_date[0]);
                        $("#time_end_date_error").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.end_date_signup){
                        $("#time_end_date_singup_error").text(e.responseJSON.errors.end_date_signup[0]);
                        $("#time_end_date_singup_error").fadeIn("slow");
                    }
                    $("#time_gif").fadeOut("slow");
                }
            });
        });
    </script>
    <script>
        $(".btn-validate3").on("click", function(e){
            e.preventDefault();
            $("#address_gif").fadeIn("slow");

            $("#address_province_id").fadeOut("slow");
            $("#address_city_id").fadeOut("slow");
            $("#address_address").fadeOut("slow");
            $("#address_xplace").fadeOut("slow");
            $("#address_yplace").fadeOut("slow");


            var data = $("#address_tab :input").serialize();
            var url = $(this).attr('href');
            $.ajax({
                data:data,
                url:url,
                type:"POST",
                success:function(){
                    swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'موفقیت آمیز',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $("#address_gif").fadeOut("slow");
                    $("#image_tab_clicker").fadeIn("slow");
                    $("#image_tab_clicker").trigger("click");
                    $("#address_tab_clicker").fadeOut("slow");

                    $("#submit_base_frm").fadeIn("slow");
                },
                error:function(e){
                    console.log(e.responseJSON.errors);
                    if(e.responseJSON.errors.province_id){
                        $("#address_province_id").text(e.responseJSON.errors.province_id[0]);
                        $("#address_province_id").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.city_id){
                        $("#address_city_id").text(e.responseJSON.errors.city_id[0]);
                        $("#address_city_id").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.address){
                        $("#address_address").text(e.responseJSON.errors.address[0]);
                        $("#address_address").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.xplace){
                        $("#address_xplace").text(e.responseJSON.errors.xplace[0]);
                        $("#address_xplace").fadeIn("slow");
                    }
                    if(e.responseJSON.errors.yplace){
                        $("#address_yplace").text(e.responseJSON.errors.yplace[0]);
                        $("#address_yplace").fadeIn("slow");
                    }
                    $("#address_gif").fadeOut("slow");
                }
            });
        });
    </script>
    <script>
        $(".btn-back_to_validate1").on("click", function(){
            $("#general_clicker").fadeIn("slow");
            $("#general_clicker").trigger("click");
            $("#time_tab_clicker").fadeOut("slow");
        });
    </script>
    <script>
        $(".btn-back_to_validate2").on("click", function(){
            $("#time_tab_clicker").fadeIn("slow");
            $("#time_tab_clicker").trigger("click");
            $("#address_tab_clicker").fadeOut("slow");
        });
    </script>
    {{--end of validates--}}

    {{--textareas ckEditor--}}
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'long_description' );
    </script>
    {{--end of textareas ckEditor--}}

@stop