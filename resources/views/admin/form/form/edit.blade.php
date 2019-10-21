@extends('layouts.admin_master_full')
@section('style')
    <style>
        .tab-content > .tab-pan{
            display: none;
        }
        .tab-content > .active{
            display: block;
        }


        /*hover styles*/
        .user{
            opacity: 1;
            transition: .8s ease;
        }
        .userHover{
            opacity: 0;
            transition: .8s ease;
        }
        .user-container:hover .user {
            opacity: 0.3;
        }

        .user-container:hover .userHover {
            opacity: 1;
        }
        /*End of hover styles*/

        .owl-prev {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 30%;
            margin-left: -20px;
            display: block !important;
            border:0px solid black;
        }

        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 30%;
            right: -25px;
            margin-right: 100%;
            display: block !important;
            border:0px solid black;
        }
        .owl-prev i, .owl-next i {transform : scale(6,6); color: #ccc;}
        </style>
        <link href="{{asset('vendors/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
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
                    <li><a href="#general" id="general_clicker" data-toggle="tab" @if(!empty($users)) style="display:none;" @endif>عمومی</a></li>
                    <li class="active"><a href="#time_tab" id="time_tab_clicker" data-toggle="tab" @if(!empty($users)) style="display:none;" @endif>فیلد های فرم</a></li>
                    <li><a href="#users_tab" id="users_tab_clicker" data-toggle="tab" style="@if(empty($users)) display:none; @endif">کاربرها</a></li>
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


            <div class="tab-pan fade in @if(empty($users)) active @endif" id="time_tab">
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

                    @if(!empty($form->form_form_fields))
                        @foreach($form->form_form_fields as $field)
                            @if($field->field->type == 1)
                                <div class="kollesh"><div class="vase_remove row" style="position: relative;top: 100px;z-index: 2; display:block;"><div class="col-md-6 col-lg-6"><button type="button" class="btn btn-warning form-control btn_change_appended_form">تغییر این فیلد</button></div><div class="col-md-6 col-lg-6"><a href="{{route('admin.form.form.del_field',$field->id)}}" class="btn btn-danger form-control btn_delete_appended_form">حذف این فیلد</a></div></div><div class="whole_frm" style="opacity: 0.5;pointer-events: none; background-color: lightgreen"><form method="post" action="{{route('admin.form.form.add_field')}}" class="frm-choosed_field"><input type="hidden" name="form_id" value="{{$form->id}}"><input type="hidden" name="form_field_id" value="{{$form->id}}"><input type="hidden" name="id" value="{{$field->id}}"><div class="form-group"><label class="col-md-2 col-lg-2">عنوان</label><div class="col-md-4 col-lg-4"><input type="text" class="form-control title" name="title" placeholder="عنوان"></div><label class="col-md-2 col-lg-2">وضعیت</label><div class="col-md-4 col-lg-4"><select class="form-control" name="status"><option value="1">فعال</option><option value="0">غیرفعال</option></select></div></div><div class="form-group"><label class="col-md-2 col-lg-2">توضیحات</label><div class="col-md-10 col-lg-10"><textarea name="description" placeholder="توضیحات" class="form-control"></textarea></div></div><div class="form-group"><input type="submit" value="تایید این فیلد" class="form-control btn btn-primary"></div></form></div></div><hr/>
                            @elseif($field->field->type == 2 || $field->field->type == 3)
                                @php
                                if($field->attribute != null){
                                    $options = json_decode($field->attribute);
                                }
                                else{
                                    $options = null;
                                }
                                @endphp
                                <div class="kollesh"><div class="vase_remove row" style="position: relative;top: 100px;z-index: 2; display:block;"><div class="col-md-6 col-lg-6"><button type="button" class="btn btn-warning form-control btn_change_appended_form">تغییر این فیلد</button></div><div class="col-md-6 col-lg-6"><a href="{{route('admin.form.form.del_field',$field->id)}}" class="btn btn-danger form-control btn_delete_appended_form">حذف این فیلد</a></div></div><div class="whole_frm" style="opacity: 0.5;pointer-events: none; background-color: lightgreen"><button class="btn btn-warning btn_add_answere_field" type="button">افزودن فیلد برای گزینه ها</button><form class="frm-choosed_field" method="post" action="{{route('admin.form.form.add_field')}}"><label class="label-default" style="margin-right: 100px;"><input type="checkbox" name="multi" @if(end($options)[0] == "multiple_select") checked @endif>انتخاب چندگزینه همزمان</label><input type="hidden" name="form_field_id" value="{{$form->id}}"><input type="hidden" name="form_field_id" value="{{$field->id}}"><input type="hidden" name="id" value="{{$field->id}}"><div class="form-group"><label class="col-md-2 col-lg-2">عنوان</label><div class="col-md-4 col-lg-4"><input type="text" class="form-control title" name="title" placeholder="عنوان" value="{{$field->title}}"></div><label class="col-md-2 col-lg-2">وضعیت</label><div class="col-md-4 col-lg-4"><select class="form-control" name="status"><option value="1">فعال</option><option value="0">غیرفعال</option></select></div></div><div class="form-group"><label class="col-md-2 col-lg-2">توضیحات</label><div class="col-md-10 col-lg-10 last_position"><textarea name="description" placeholder="توضیحات" class="form-control">{{$field->description}}</textarea>
                                @if($options != null)
                                    @foreach($options as $option)
                                        @if(!empty($option->option))
                                            <label class="col-md-2 col-lg-2">فیلد گزینه</label><div class="col-md-10 col-lg-10"><input type="text" class="form-control" value="{{$option->option}}" placeholder="گزینه مورد نظر را وارد کنید." name="options[]"></div>
                                        @endif
                                    @endforeach
                                @endif
                                </div></div><div class="form-group"><input type="submit" value="تایید این فیلد" class="form-control btn btn-primary"></div>
                                </form></div></div><hr/>
                            @endif
                        @endforeach
                    @endif

                </div>
                <div class="form-group" style="margin-top:10%;">
                     <div class="col-md-3 col-sm-3">
                        <a href="#" class="btn-back_to_validate1"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <button type="button" class="btn btn-primary form-control go_to_users">تایید و رفتن به مرحله بعد</button>
                    </div>
                </div>
            </div>

            <div class="tab-pan fade in @if(!empty($users)) active @endif" id="users_tab">
                <h3>کاربرها</h3>
                <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="address_gif">
                <div class="form-group required">
                    <form method="post" action="{{route('admin.form.loadUsersByCore')}}">
                    {{csrf_field()}}
                        <input type="hidden" value="{{$form->id}}" name="form_id">
                        <label class="col-md-2 col-lg-2">انتخاب هسته</label>
                        <div class="col-md-6 col-lg-6">
                            <select class="form-control core_select" name="core_id">
                                <option value="">انتخاب کنید</option>
                                @if(!empty($cores))
                                    @foreach($cores as $core)
                                        <option value="{{$core->id}}">{{$core->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <input type="submit" class="btn btn-primary form-control" value="برای نمایش کاربران کلیک کنید">
                        </div>
                    </form>
                </div>
                <div class="form-group show_core_users">
                    <img src="{{asset('gif/waiter.gif')}}" style="position: absolute;z-index: 2;top: 45%;right: 50%;display:none;" id="show_users_gif">

                    <div id="owl-example" class="owl-carousel">
                        @if(!empty($users))
                            @foreach($users as $user)
                                <div class="col-md-12 user-container user-container_{{$user->id}}" style="text-align: center;border: 1px solid #e4e6e7;border-radius: 20px;height:200px;">
                                    {{-- asli --}}
                                    <div class="m-widget_body-item user user_{{$user->id}}">
                                        <div class="m-widget_body-item-pic">
                                            <img src="{{asset('images/user2-160x160.jpg')}}" title="" style="border-radius: 200px;">
                                        </div>
                                        <div class="m-widget_body-item-desc">
                                            <span>{{$user->name .' '. $user->lastname}}</span><br>
                                            <span>{{$user->username}}</span>
                                        </div>
                                    </div>
                                    {{-- hover --}}
                                    @if($user->used)
                                        <div class="m-widget_body-item userHover_added userHover_added_{{$user->id}}">
                                            <div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;">
                                                <img src="{{asset('images/tik.png')}}">
                                                <label class="label-info" style="position: absolute;left: 0;top: 34px;transform: rotate(-36deg);">
                                                    این کاربر اد شده است
                                                </label>
                                                <button type="button" class="btn btn-remove" data-id="{{$user->id}}" style="position: absolute;right: 0;bottom: 8px;border-radius: 50px;"><i class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="m-widget_body-item userHover userHover_{{$user->id}}">
                                            <div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;">
                                                <span>ایمیل: {{$user->email}}</span>
                                                <hr/>
                                                <span>آدرس: </span>
                                                @if(!empty($user->provinces && $user->cities && $user->address))
                                                    <span>{{$user->provinces->name .' '.$user->cities->name. ' '. $user->address}}</span>
                                                @endif
                                                <button class="btn btn-success form-control btn-registerUser" data-id="{{$user->id}}" style="margin-bottom: -78%;border-radius: 20px;">ثبت کاربر</button>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- gif --}}
                                    <div class="m-widget_body-item userGif userGif_{{$user->id}}" style="display: none;">
                                        <div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;background-color: #ffffffed;">
                                            <img src="{{asset('gif/35.gif')}}" style="width: 60px;margin-right: 37%;margin-top: 41%;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            ...
                        @endif
                    </div>


                </div>
                <div class="form-group" style="margin-top: 100px;">
                    <div class="col-md-3 col-sm-3">
                        <a href="#" class="btn-back_to_validate2"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <a href="{{route('admin.form.form.index')}}" class="btn-validate3"><button type="button" class="btn btn-primary form-control">تکمیل فرم</button></a>
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
            var add_form_url = "{{route('admin.form.form.add_field')}}";
            var field_id = $("#choose_field").val();
            var field_type_id = $('#choose_field').find(":selected").data('type_id');
            var form_id = $("#form_id").val();
                if(field_type_id == 1){
                    $(".field_frm_field_result").append('<div class="kollesh"><div class="vase_remove row" style="position: relative;top: 100px;z-index: 2; display:none;"><div class="col-md-6 col-lg-6"><button type="button" class="btn btn-warning form-control btn_change_appended_form">تغییر این فیلد</button></div><div class="col-md-6 col-lg-6"><a href="#" class="btn btn-danger form-control btn_delete_appended_form">حذف این فیلد</a></div></div><div class="whole_frm"><form method="post" action="'+add_form_url+'" class="frm-choosed_field"><input type="hidden" name="form_id" value="'+form_id+'"><input type="hidden" name="form_field_id" value="'+field_id+'"><div class="form-group"><label class="col-md-2 col-lg-2">عنوان</label><div class="col-md-4 col-lg-4"><input type="text" class="form-control title" name="title" placeholder="عنوان"></div><label class="col-md-2 col-lg-2">وضعیت</label><div class="col-md-4 col-lg-4"><select class="form-control" name="status"><option value="1">فعال</option><option value="0">غیرفعال</option></select></div></div><div class="form-group"><label class="col-md-2 col-lg-2">توضیحات</label><div class="col-md-10 col-lg-10"><textarea name="description" placeholder="توضیحات" class="form-control"></textarea></div></div><div class="form-group"><input type="submit" value="تایید این فیلد" class="form-control btn btn-primary"></div></form></div></div><hr/>');
                }
                else if(field_type_id == 2 || field_type_id == 3){
                    $(".field_frm_field_result").append('<div class="kollesh"><div class="vase_remove row" style="position: relative;top: 100px;z-index: 2; display:none;"><div class="col-md-6 col-lg-6"><button type="button" class="btn btn-warning form-control btn_change_appended_form">تغییر این فیلد</button></div><div class="col-md-6 col-lg-6"><a href="#" class="btn btn-danger form-control btn_delete_appended_form">حذف این فیلد</a></div></div><div class="whole_frm"><button class="btn btn-warning btn_add_answere_field" type="button">افزودن فیلد برای گزینه ها</button><form class="frm-choosed_field" method="post" action="'+add_form_url+'"><label class="label-default" style="margin-right: 100px;"><input type="checkbox" name="multi">انتخاب چندگزینه همزمان</label><input type="hidden" name="form_id" value="'+form_id+'"><input type="hidden" name="form_field_id" value="'+field_id+'"><div class="form-group"><label class="col-md-2 col-lg-2">عنوان</label><div class="col-md-4 col-lg-4"><input type="text" class="form-control title" name="title" placeholder="عنوان"></div><label class="col-md-2 col-lg-2">وضعیت</label><div class="col-md-4 col-lg-4"><select class="form-control" name="status"><option value="1">فعال</option><option value="0">غیرفعال</option></select></div></div><div class="form-group"><label class="col-md-2 col-lg-2">توضیحات</label><div class="col-md-10 col-lg-10 last_position"><textarea name="description" placeholder="توضیحات" class="form-control"></textarea></div></div><div class="form-group"><input type="submit" value="تایید این فیلد" class="form-control btn btn-primary"></div></form></div></div><hr/>');
                }
        });
    </script>
    <script>
        $(document).on("submit", ".frm-choosed_field", function(e){
            e.preventDefault();
            var field_id = 0;
            var form = $(this);
            if($(this).find(".title").val() == ""){
                alert('عنوان را وارد کنید');
                return false;
            }

            var data = $(this).serialize();
            var url = $(this).attr("action");
            var type = "POST"
            // console.log(data, url, type);
            $.ajax({
                data:data,
                type:type,
                url:url,
                success:function(form_field_id)
                {
                    form.append('<input type="hidden" name="id" value="'+form_field_id+'">');
                    var del_url = "{{route('admin.form.form.index')}}/edit/del_field/"+form_field_id;
                    form.closest(".whole_frm").closest(".kollesh").find(".vase_remove").find(".btn_delete_appended_form").attr("href", del_url);
                },
                error:function(){console.log('error in adding the form_field');return false;}
            });
            $(this).closest('.whole_frm').css({'opacity': '0.5', 'pointer-events': 'none', 'background-color': 'lightgreen'});
            $(this).closest(".kollesh").find(".vase_remove").fadeIn("slow");
        });
    </script>

    <script>
    $(document).on("click", ".btn_add_answere_field", function(){
        $(this).closest(".whole_frm").find('form').find(".last_position").append('<label class="col-md-2 col-lg-2">فیلد گزینه</label><div class="col-md-10 col-lg-10"><input type="text" class="form-control" placeholder="گزینه مورد نظر را وارد کنید." name="options[]"></div>');
    });
    </script>
    <script>
    $(document).on("click", ".btn_change_appended_form", function(){
        $(this).closest(".kollesh").find(".vase_remove").fadeOut("slow");
        $(this).closest(".kollesh").find(".whole_frm").css({'opacity': '1', 'pointer-events': 'auto', 'background-color': 'white'});
    });
    </script>
    <script>
    $(document).on("click", ".btn_delete_appended_form", function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        var btn = $(this);

        swal.fire({
            title: 'اطمینان دارید؟',
            text: "بعد از حذف قابل بازیابی نمی باشد!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله, حذف شود!',
            cancelButtonText: 'خیر'
            }).then((result) => {
            if (result.value) {

                $.ajax({
                    data:'',
                    type:"GET",
                    url:url,
                    success:function(){
                        swal.fire(
                            'موفقیت آمیز!',
                            'عملیات حذف انجام شد',
                            'success'
                        )
                        btn.closest(".vase_remove").closest(".kollesh").fadeOut("slow");
                    },
                    error:function(){
                        console.log('error in deleting form_field');
                    }
                });
            }
        });
    });
    </script>
    {{--end of Field area--}}

    <script>
        $(".go_to_users").on("click", function(){
            $("#users_tab_clicker").fadeIn("slow");
            setTimeout(function(){
                $("#users_tab_clicker").trigger("click");
            }, 100);
        });
    </script>


    {{--USERS--}}
    {{-- calling owlcarrousel --}}
    <script src="{{asset('vendors/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#owl-example").owlCarousel({
                // Most important owl features
                items : 5,
                touchDrag: true,
                nav:true,
                autoplay:true,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [980,3],
                itemsTablet: [768,2],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                singleItem : true,
                //Basic Speeds
                slideSpeed : 200,
                paginationSpeed : 800,
                rewindSpeed : 1000,
                //Autoplay
                autoPlay : true,
                stopOnHover : true,
                // Navigation
                navigation : true,
                navigationText : ["prev","next"],
                rewindNav : true,
                scrollPerPage : false,
                //Pagination
                pagination : true,
                paginationNumbers: true,
                rtl:true,
                nav:true,
                navText : ['<i class="fa fa-angle-right" aria-hidden="true"></i>','<i class="fa fa-angle-left" aria-hidden="true"></i>']

            });
        });
    </script>
    {{-- end of calling owlcarrousel --}}
    
    {{-- add User to event --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click' , '.btn-registerUser' , function(){
            var id = $(this).data('id');
            var data = $("#form_id").val();
            var url = "{{route('admin.form.addUser')}}";
            var main_asset = "{{asset('')}}";
            $(".userGif_"+id).css('display','block');
            $.ajax({
                data:{'user_id':id,'form_id':data},
                url:url,
                type:'POST',
                success:function(data){
                    $(".userHover_"+data).css('display','none');
                    $(".user-container_"+data).append('<div class="m-widget_body-item userHover_added userHover_added_'+data+'"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;"><img src="'+main_asset+'/images/tik.png"><label class="label-info" style="position: absolute;left: 0;top: 34px;transform: rotate(-36deg);">ین کاربر اد شده است</label></div><button type="button" class="btn btn-remove" data-id="'+data+'" style="position: absolute;right: 0;bottom: 8px;border-radius: 50px;"><i class="fa fa-remove"></i></button></div>');
                    $(".userGif_"+data).fadeOut("slow");
                },
                error:function(){
                    console.log('error in adding user to event');
                    $(".userGif").css('display','none');
                }
            });
        });
    </script>
    {{-- END OF add User to event --}}

    {{-- remove User to event --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click' , '.btn-remove' , function(){
            var id = $(this).data('id');
            var data = $('#form_id').val();
            var url = "{{route('admin.form.removeUser')}}";
            $(".userGif_"+id).css('display','block');
            $.ajax({
                data:{'user_id':id,'form_id':data},
                url:url,
                type:'POST',
                success:function(data){
                    $(".userHover_added_"+data).css('display','none');
                    $(".user-container_"+data).append('<div class="m-widget_body-item userHover userHover_'+data+'"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;"><button class="btn btn-success form-control btn-registerUser" data-id="'+data+'" style="margin-bottom: -78%;border-radius: 20px;">ثبت کاربر</button></div></div>');
                    $(".userGif_"+data).fadeOut("slow");
                },
                error:function(){
                    console.log('error in removing user to event');
                    $(".userGif").css('display','none');
                }
            });
        });
    </script>
    {{-- END OF remove User to event --}}


    <script>
        // $(".core_select").on("change", function(){
        //     $("#show_users_gif").fadeIn("slow");

        //     var core_id = $(this).val();
        //     var form_id = $("#form_id").val();
        //     if(core_id == ""){
        //         return false;
        //     }

        //     var url = "{{route('admin.form.loadUsersByCore')}}";
        //     $.ajax({
        //         data: {'core_id':core_id, 'form_id':form_id},
        //         url:url,
        //         type:'post',
        //         success:function(users){
        //             console.log(users);

        //             var main_asset = "{{asset('')}}";
        //             $("#owl-example").html('');
                    
        //             $.each(users, function(user){
        //                 if(users[user].used == "yes"){
        //                     $("#owl-example").append('<div class="col-md-12 user-container user-container_'+users[user].id+'" style="text-align: center;border: 1px solid #e4e6e7;border-radius: 20px;height:200px;"><div class="m-widget_body-item user user_'+users[user].id+'"><div class="m-widget_body-item-pic"><img src="'+main_asset+'images/user2-160x160.jpg" title="" style="border-radius: 200px;"></div><div class="m-widget_body-item-desc"><span>'+users[user].name+' '+users[user].lastname+'</span><br><span>'+users[user].username+'</span></div></div><div class="m-widget_body-item userHover_added userHover_added_'+users[user].id+'"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;"><img src="'+main_asset+'/images/tik.png"><label class="label-info" style="position: absolute;left: 0;top: 34px;transform: rotate(-36deg);">این کاربر اد شده است</label><button type="button" class="btn btn-remove" data-id="'+users[user].id+'" style="position: absolute;right: 0;bottom: 8px;border-radius: 50px;"><i class="fa fa-remove"></i></button></div></div><div class="m-widget_body-item userGif userGif_'+users[user].id+'" style="display: none;"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;background-color: #ffffffed;"><img src="'+main_asset+'/gif/35.gif" style="width: 60px;margin-right: 37%;margin-top: 41%;"></div></div></div>...</div>');
        //                 }
        //                 else{/**add nashode bood */
        //                     $("#owl-example").append('<div class="col-md-12 user-container user-container_'+users[user].id+'" style="text-align: center;border: 1px solid #e4e6e7;border-radius: 20px;height:200px;"><div class="m-widget_body-item user user_'+users[user].id+'"><div class="m-widget_body-item-pic"><img src="'+main_asset+'images/user2-160x160.jpg" title="" style="border-radius: 200px;"></div><div class="m-widget_body-item-desc"><span>'+users[user].name+' '+users[user].lastname+'</span><br><span>'+users[user].username+'</span></div></div><div class="m-widget_body-item userHover userHover_'+users[user].id+'"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;"><span>ایمیل: '+users[user].email+'</span><hr/><span>آدرس: </span><button class="btn btn-success form-control btn-registerUser" data-id="'+users[user].id+'" style="margin-bottom: -78%;border-radius: 20px;">ثبت کاربر</button></div></div><div class="m-widget_body-item userGif userGif_'+users[user].id+'" style="display: none;"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;background-color: #ffffffed;"><img src="'+main_asset+'/gif/35.gif" style="width: 60px;margin-right: 37%;margin-top: 41%;"></div></div></div>...</div>');
        //                 }
        //             });
        //             $("#show_users_gif").fadeOut("slow");
        //         },
        //         error:function(){
        //             console.log('error in loading users by core_id');
        //             $("#show_users_gif").fadeOut("slow");
        //         }
        //     });
        // });
    </script>
    {{--End of USERS--}}















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

            var url = $(this).attr('href');
            swal.fire({
                position: 'center',
                type: 'success',
                title: 'ثبت فرم با موفقیت تکمیل گردید!',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(function(){
                // console.log(url);
                document.location.href=url;
            },2000);
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