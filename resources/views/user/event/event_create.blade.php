@extends('layouts.app_master')
@section('styles')
    <style>
        .form-control-feedback {
            color: red;
        }


        #general_gif{
            position: absolute;
            z-index: 2;
            top: 45%;
            right: 50%;
            display:none;
        }
        #time_gif{
            position: absolute;
            z-index: 2;
            top: 45%;
            right: 50%;
            display:none;
        }
        #address_gif{
            position: absolute;
            z-index: 2;
            top: 45%;
            right: 50%;
            display:none;
        }
        @media screen and (max-width: 600px) {
            #general_gif{
                position: absolute;
                z-index: 2;
                top: 65%;
                right: 10%;
                display:none;
            }
            #time_gif{
                position: absolute;
                z-index: 2;
                top: 45%;
                right: 10%;
                display:none;
            }
            #address_gif{
                position: absolute;
                z-index: 2;
                top: 50%;
                right: 10%;
                display:none;
            }
        }
    </style>
@endsection
@section('content')


    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">افزودن رویداد</h3>
            </div>

        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            افزودن رویداد
                        </h3>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12">

                <form class="m-form m-form--fit m-form--label-align-right" action="{{route('user.events.store')}}" novalidate="novalidate" id="create_event" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="m-portlet__body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" id="m_tabs_1_1_clicker" href="#m_tabs_1_1">
                                    <i class="la la-exclamation-triangle"></i> اطلاعات اولیه رویداد
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link show" style="display:none;"  data-toggle="tab" id="m_tabs_1_1_2_clicker" href="#m_tabs_1_1_2">
                                    <i class="la la-exclamation-triangle"></i>زمان
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link show" style="display:none;"  data-toggle="tab" id="m_tabs_1_1_3_clicker" href="#m_tabs_1_1_3">
                                    <i class="la la-exclamation-triangle"></i>آدرس
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  style="display:none;" data-toggle="tab" href="#m_tabs_1_2" id="m_tabs_1_2_clicker">
                                    <i class="la la-cloud-download"></i> عکس های رویداد
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                        {{-- <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                        --}}{{--           <h3 class="m-form__section">اطلاعات اولیه</h3>--}}{{--
                                </div>
                            </div>--}}

                <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                    <img src="{{asset('gif/waiter.gif')}}" id="general_gif">
                        <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 col-form-label">نام رویداد</label>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                                <input class="form-control m-input" name="name" type="text" value="{{old('name')}}" >
                                @if($errors->first('name'))
                                    <label style="color:red">{{$errors->first('name')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_name_error"></label>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">توضیحات مختصر</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <textarea name="description" class="form-control md-input" data-provide="markdown" rows="10" style="resize: none;"></textarea>
                                @if($errors->first('description'))
                                    <label style="color:red">{{$errors->first('description')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_description_error"></label>
                            </div>


                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">توضیحات تکمیلی</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <textarea name="long_description" class="form-control md-input" data-provide="markdown" rows="10" style="resize: none;"></textarea>
                                @if($errors->first('long_description'))
                                    <label style="color:red">{{$errors->first('long_description')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_long_description_error"></label>
                            </div>

                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">قیمت</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <input class="form-control m-input" name="price" type="number" value="{{old('price')}}">
                                @if($errors->first('price'))
                                    <label style="color:red">{{$errors->first('price')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_price_error"></label>
                            </div>
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">ظرفیت</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <input class="form-control m-input" name="capacity" type="number" value="{{old('capacity')}}">
                                @if($errors->first('capacity'))
                                    <label style="color:red">{{$errors->first('capacity')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_capacity_error"></label>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="exampleSelect1" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">موضوع رویداد</label>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                                <select class="form-control m-input m-input--square" name="event_subject_id"  id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($event_subjects as $event_subject)                            <option value="{{$event_subject->id}}">{{$event_subject->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('event_subject_id'))
                                    <label style="color:red">{{$errors->first('event_subject_id')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_event_subject_id_error"></label>
                            </div>
                        </div>

                        {{--
                          <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>--}}
                        {{--  <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">محل سکونت</h3>
                                </div>
                            </div>--}}

                        <div class="form-group m-form__group row">
                            <label for="exampleSelect1" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">نوع رویداد</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <select class="form-control m-input m-input--square" name="event_type_id"  id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($event_types as $event_type)
                                        <option value="{{$event_type->id}}">{{$event_type->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('event_type_id'))
                                    <label style="color:red">{{$errors->first('event_type_id')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_event_type_id_error"></label>
                            </div>

                            <label for="exampleSelect1" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">وضعیت رویداد</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <select class="form-control m-input m-input--square" name="event_status_id"  id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($event_statuses as $event_status)
                                        <option value="{{$event_status->id}}">{{$event_status->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('event_status_id'))
                                    <label style="color:red">{{$errors->first('event_status_id')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_event_status_id_error"></label>
                            </div>


                        </div>
                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                        <div class="form-group m-form__group row">
                            <label for="exampleSelect1" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">هسته اصلی</label>
                            <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                                <select class="form-control m-input m-input--square" name="center_core_id" id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($cores as $core)
                                        <option value="{{$core->id}}">{{$core->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('center_core_id'))
                                    <label style="color:red">{{$errors->first('center_core_id')}}</label>
                                @endif
                                <label style="color:red;display:none;" id="general_center_core_id_error"></label>
                            </div>
                        </div>

                        {{-- <div class="form-group m-form__group row">
                           <label for="example-text-input" class="col-2 col-form-label">تصویر</label>
                                                <div class="col-10">                                                  <input class="form-control m-input" name="image" type="file">
                                                    @if($errors->first('image'))
                                                        <span class="m-form__help" style="color:red">{{$errors->first('image')}}</span>
                                                    @endif
                                                </div>
                        --}}{{--
                              <span class="m-form__help">
                         <img class="image-responsive" src="{{$cuser->thumbnail}}">
                                                                                </span>
                        --}}{{--
                                                                            </div>--}}

                            <div class="form-group">
                                <a href="{{route('user.event.create.validate1')}}" class="btn-validate1"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>
                            </div>
                        </div>

                        <div class="tab-pane" id="m_tabs_1_1_2" role="tabpanel">
                            <img src="{{asset('gif/waiter.gif')}}" id="time_gif">
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">تاریخ شروع</label>
                                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                    <input class="form-control m-input start_date" name="start_date" type="text" value="{{old('start_date')}}" >
                                    @if($errors->first('start_date'))
                                        <label style="color:red">{{$errors->first('start_date')}}</label>
                                    @endif
                                    <label id="time_start_date_error" style="color:red;display:none;"></label>
                                </div>
                                <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">تاریخ پایان</label>
                                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                    <input class="form-control m-input end-date" name="end_date" type="text" value="{{old('end_date')}}">
                                    @if($errors->first('end_date'))
                                        <label style="color:red">{{$errors->first('end_date')}}</label>
                                    @endif
                                    <span class="m-form__help">برای مثال 1398/10/05</span>
                                    <label id="time_end_date_error" style="color:red;display:none;"></label>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">تاریخ پایان ثبت نام</label>
                                <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                                    <input class="form-control m-input" name="end_date_signup" type="text" value="{{old('end_date_signup')}}">
                                    @if($errors->first('end_date_signup'))
                                        <label style="color:red">{{$errors->first('end_date_signup')}}</label>
                                    @endif
                                    <label id="time_end_date_singup_error" style="color:red;display:none;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                    <a href="#" class="btn-back_to_validate1"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                                    <a href="{{route('user.event.create.validate2')}}" class="btn-validate2"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="m_tabs_1_1_3" role="tabpanel">
                            <img src="{{asset('gif/waiter.gif')}}" id="address_gif">
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">محل برگزاری</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="exampleSelect1" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">استان</label>
                                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                    <select class="form-control m-input m-input--square" name="province_id"  id="province">
                                        <option value="">انتخاب کنید.</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->first('province_id'))
                                        <label style="color:red">{{$errors->first('province_id')}}</label>
                                    @endif
                                    <label id="address_province_id" style="color:red;display:none;"></label>
                                </div>
                                <label for="exampleSelect1" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">شهر</label>
                                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                    <select class="form-control m-input m-input--square" name="city_id"  id="city_id">
                                        <option value="">انتخاب کنید.</option>
                                    </select>
                                    @if($errors->first('city_id'))
                                        <label style="color:red">{{$errors->first('city_id')}}</label>
                                    @endif
                                    <label id="address_city_id" style="color:red;display:none;"></label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">آدرس</label>
                                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                    <textarea class="form-control" type="text" name="address" rows="3">{{old('address')}}
                                    </textarea>
                                    @if($errors->first('address'))
                                        <label style="color:red">{{$errors->first('address')}}</label>
                                    @endif
                                    <label id="address_address" style="color:red;display:none;"></label>
                                </div>

                                <label for="" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-from-label">مختصات x</label>
                                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <input class="form-control m-input" name="xplace" type="text" value="{{old('xplace')}}" >
                                    @if($errors->first('xplace'))
                                        <label style="color:red">{{$errors->first('xplace')}}</label>
                                    @endif
                                    <label id="address_xplace" style="color:red;display:none;"></label>
                                </div>
                                <label for="" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-from-label">مختصات y</label>
                                <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <input class="form-control m-input" name="yplace" type="text" value="{{old('yplace')}}" >
                                    @if($errors->first('yplace'))
                                        <label style="color:red">{{$errors->first('yplace')}}</label>
                                    @endif
                                    <label id="address_yplace" style="color:red;display:none;"></label>
                                </div>
                            </div>/
                            <div class="form-group row">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                    <a href="#" class="btn-back_to_validate2"><button type="button" class="btn btn-warning form-control">مرحله قبل</button></a>
                                </div>
                                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                                    <a href="{{route('user.event.create.validate3')}}" class="btn-validate3"><button type="button" class="btn btn-primary form-control">تایید و رفتن به مرحله بعد</button></a>                    
                                </div>
                            </div>
                        </div>  

                        <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">

                            <div class="col-md-12 col-lg-12 row">

                            <div class="col-md-10 col-lg-10">
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
                            <div class="col-md-2 col-lg-2">
                                <button class="btn btn-success pull-left" type="button" id="addphoto">افزودن فیلد عکس</button>
                            </div>

                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <button id="submit_edituser" type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom iranyekan"> ذخیره تغییرات</button>&nbsp;&nbsp;
                                            {{--                                 <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>--}}
                                        </div>

                                    </div>
        </div>
    </div>

        </div>
                            </div>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection
@section('scripts')

    {{--    <!--begin::Page Vendors -->
        <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

        <!--end::Page Vendors -->--}}
    <style>
        .pwt-btn-calendar {
            display: none !important;
        }
    </style>
    <script>

    </script>

    <!--begin::Page Scripts -->
    <script src="{{asset('vendors/jquery-validation/dist/localization/messages_fa.js')}}" type="text/javascript"></script>

    <!--begin::Page Scripts -->

    {{--<script src="{{asset('vendors/bootstrap-markdown.js')}}" type="text/javascript"></script>--}}
    <!--end::Page Scripts -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#province').change(function () {
                var url= '{{route('show_cities')}}';

                $.ajax({

                    url:url,
                    type:'POST',
                    data:{id:$(this).val(), _token: $('meta[name="csrf-token"]').attr('content')},

                    success:function(cities) {
                        $('#city_id').html('');
                        $.each(cities,function (city) {

                            $('#city_id').append('<option value="'+cities[city].id+'">'+cities[city].name+'</option>');
                        });
                    },
                    error:function () {
                        console.log(error);
                    }


                });
            });

            $('#create_event').click(function (e) {
                // e.preventDefault();
                //  return false;
                $('#create_event').validate({
                    rules:{
                        name: {
                            required:true
                        },
                        description: {
                            required:true
                        },
                        long_description:{
                            required:true
                        },
                        start_date:{
                            required:true,
                        },
                        end_date:{
                            required:true,
                        },
                        end_date_signup:{
                            required:true,
                        },
                        price:{
                            required:true,
                        },
                        capacity:{
                            required:true,
                        },
                        event_subject_id:{
                            required:true,
                        },
                        event_type_id:{
                            required:true
                        },
                        event_status_id:{
                            required:true,
                        },
                        province_id:{
                            required:true,
                        },
                        city_id:{
                            required:true,
                        },
                        address:{
                            required:true
                        },
                        center_core_id:{
                            required:true
                        },
                        xplace:{
                            required:true
                        },
                        yplace:{
                            required:true
                        }


                    }
                });
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

            var data = $("#m_tabs_1_1 :input").serialize();
            var url = $(this).attr('href');
            console.log(data, url);
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
                    $("#m_tabs_1_1_2_clicker").fadeIn("slow");
                    $("#m_tabs_1_1_2_clicker").trigger("click");
                    $("#m_tabs_1_1_clicker").fadeOut("slow");
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

            var data = $("#m_tabs_1_1_2 :input").serialize();
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
                    $("#m_tabs_1_1_3_clicker").fadeIn("slow");
                    $("#m_tabs_1_1_3_clicker").trigger("click");
                    $("#m_tabs_1_1_2_clicker").fadeOut("slow");
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


            var data = $("#m_tabs_1_1_3 :input").serialize();
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
                    $("#m_tabs_1_2_clicker").fadeIn("slow");
                    $("#m_tabs_1_2_clicker").trigger("click");
                    $("#m_tabs_1_1_3_clicker").fadeOut("slow");

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
            $("#m_tabs_1_1_clicker").fadeIn("slow");
            $("#m_tabs_1_1_clicker").trigger("click");
            $("#m_tabs_1_1_2_clicker").fadeOut("slow");
        });
    </script>
    <script>
        $(".btn-back_to_validate2").on("click", function(){
            $("#m_tabs_1_1_2_clicker").fadeIn("slow");
            $("#m_tabs_1_1_2_clicker").trigger("click");
            $("#m_tabs_1_1_3_clicker").fadeOut("slow");
        });
    </script>
    {{--end of validates--}}
@endsection