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
            <a href="{{route('admin.form.form.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            فرم ها
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i>فرم ها</a></li>
            <li class="active">تکمیل فرم</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

    <input type="hidden" id="form_id" value="{{$form->id}}">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>تکمیل اطلاعات فرم</h3>
            </div>
            <div class="panel-body">
               {{-- <form action="{{route('admin.form.form.update', $form)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material"> --}}
                    {{csrf_field()}}

               <ul class="nav nav-tabs" data-tabs="tabs">
                    <li><a href="#general" id="general_clicker" data-toggle="tab">عمومی</a></li>
                    <li class="active"><a href="#time_tab" id="time_tab_clicker" data-toggle="tab" style="">فیلد های فرم</a></li>
                    <li><a href="#address_tab" id="address_tab_clicker" data-toggle="tab" style="display:none;">آدرس</a></li>
                    <li><a href="#gallery" id="image_tab_clicker" data-toggle="tab" style="display:none;">گالری</a></li>
               </ul>


        <div class="tab-content">
                        <!-- general tab content -->
            <div class="tab-pan fade in" id="general">
                <h3>عمومی</h3>
                <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="general_gif">
                <form action="{{route('admin.form.form.update_genral', $form)}}" method="POST" id="general-frm">
                {{csrf_field()}}
                <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نام</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{$form->name}}">
                            <label style="color:red;" id="general_frm_error_name">{{$errors->first('name')}}</label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">نوع</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="form_type_id">
                                <option value="">انتخاب کنید</option>
                                @if(!empty($form_types))
                                    @foreach($form_types as $item)
                                    <option value="{{$item->id}}" @if($item->id == $form->form_type_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label style="color:red;" id="general_frm_error_form_type_id">{{$errors->first('form_type_id')}}</label>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-md-2 col-lg-2">وضعیت</label>
                        <div class="col-md-10 col-lg-10">
                            <select class="form-control" name="form_status_id">
                                <option value="">انتخاب کنید</option>
                                @if(!empty($form_statuses))
                                    @foreach($form_statuses as $item)
                                    <option value="{{$item->id}}" @if($item->id == $form->form_status_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label style="color:red;" id="general_frm_error_form_status_id">{{$errors->first('form_status_id')}}</label>
                        </div>
                    </div>
                    <div class="form-group required">
                    <label class="col-md-2 col-lg-2">توضیحات</label>
                        <div class="col-md-10 col-lg-10">
                            <textarea class="form-control" name="description" cols="8">
                                {{$form->description}}
                            </textarea>
                            
                            <label style="color:red;" id="general_frm_error_status">{{$errors->first('description')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="تایید و رفتن به مرحله بعد">
                    </div>
                </form>
            </div>


            <div class="tab-pan fade in active" id="time_tab">
                <h3>فیلدها</h3>
                <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="field_gif">
                <div class="form-group required">
                    <label class="col-md-2 col-lg-2">فیلدها</label>
                    <div class="col-md-8 col-lg-8">
                        @if(!empty($fields))
                            <select class="form-control" id="choose_field">
                                @foreach($fields as $field)
                                    <option value="{{$field->id}}" data-type_id="{{$field->type}}">{{$field->name}} - ( {{$field->type_name}} )</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <button type="button" class="btn btn-success form-control" id="select_field">افزودن فیلد</button>
                    </div>
                </div>
                <div class="row required field_frm_field_result" style="padding-top: 10%;padding-right: 10%;padding-left: 10%;">
                </div>
                <div class="form-group" style="margin-top:10%;">
                    <!-- <div class="col-md-3 col-sm-3">
                        <a href="#" class="btn-back_to_validate1"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <a href="{{route('admin.event.create.validate2')}}" class="btn-validate2"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>
                    </div> -->
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
                        <a href="{{route('admin.event.create.validate3')}}" class="btn-validate3"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>
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


                {{-- </form> --}}

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')

    {{--general frm--}}
    <script>
        $("#general-frm").on("submit", function(e){
            e.preventDefault();
            $("#general_gif").fadeIn("slow");
            $("#general_frm_error_name").text("");
            $("#general_frm_error_form_type_id").text("");
            $("#general_frm_error_description").text("");
            $("#general_frm_error_form_status_id").text("");
            var data = $(this).serialize();
            var url = $(this).attr("action");
            var type = $(this).attr("method");

            $.ajax({
                data:data,
                url:url,
                type:type,
                success:function(data){
                    location.reload();
                },
                error:function(e){
                    console.log('error in general form');
                    if(e.responseJSON.errors.name){
                        $("#general_frm_error_name").text(e.responseJSON.errors.name[0]).fadeIn("slow");
                    }
                    if(e.responseJSON.errors.form_type_id){
                        $("#general_frm_error_form_type_id").text(e.responseJSON.errors.form_type_id[0]).fadeIn("slow");
                    }
                    if(e.responseJSON.errors.description){
                        $("#general_frm_error_description").text(e.responseJSON.errors.description[0]).fadeIn("slow");
                    }
                    if(e.responseJSON.errors.form_status_id){
                        $("#general_frm_error_form_status_id").text(e.responseJSON.errors.form_status_id[0]).fadeIn("slow");
                    }
                    $("#general_gif").fadeOut("slow");
                }
            });
        });
    </script>
    {{--end of general frm--}}

    {{--Field area--}}
    <script>
        $("#select_field").on("click", function(){
            var field_id = $("#choose_field").val();
            var field_type_id = $('#choose_field').find(":selected").data('type_id');
            var form_id = $("#form_id").val();
                if(field_type_id == 1){
                    $(".field_frm_field_result").append('<div class="whole_frm"><form class="frm-choosed_field"><input type="hidden" name="form_id" value="'+form_id+'"><input type="hidden" name="form_field_id" value="'+field_id+'"><div class="form-group"><label class="col-md-2 col-lg-2">عنوان</label><div class="col-md-4 col-lg-4"><input type="text" class="form-control title" name="title" placeholder="عنوان"></div><label class="col-md-2 col-lg-2">وضعیت</label><div class="col-md-4 col-lg-4"><select class="form-control" name="status"><option value="1">فعال</option><option value="0">غیرفعال</option></select></div></div><div class="form-group"><label class="col-md-2 col-lg-2">توضیحات</label><div class="col-md-10 col-lg-10"><textarea name="description" placeholder="توضیحات" class="form-control"></textarea></div></div><div class="form-group"><input type="submit" value="تایید این فیلد" class="form-control btn btn-primary"></div></form></div><hr/>');
                }
                else if(field_type_id == 2 || field_type_id == 3){
                    
                }
        });
    </script>
    <script>
        $(document).on("submit", ".frm-choosed_field", function(e){
            e.preventDefault();
            if($(this).find(".title").val() == ""){
                alert('عنوان را وارد کنید');
                return false;
            }

            var data = $(this).serialize();
            var url = "{{route('admin.form.form.add_field')}}";
            var type = "POST";
            $.ajax({
                data:data,
                type:type,
                url:url,
                success:function(){},
                error:function(){console.log('error in adding the form_field');return false;}
            });
            $(this).closest('.whole_frm').css({'opacity': '0.5', 'pointer-events': 'none', 'background-color': 'lightgreen'});
        });
    </script>
    {{--end of Field area--}}















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
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
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