@extends('layouts.app_master')
@section('styles')
    <style>
        .form-control-feedback {
            color: red;
        }

        .event_imgs{
            width:400px; 
            margin-right:220px;
        }
        .li_tabs{
            font-size:15px;
        }
        @media screen and (max-width: 600px) {
            .event_imgs{
                width:200px; 
                margin-right:20px;
            }
            .li_tabs{
                font-size:11px;
            }
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="margin-right-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">ویرایش رویداد</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">رویداد ها</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">ویرایش رویداد</span>
                        </a>
                    </li>
                </ul>
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
                            ویرایش رویداد
                        </h3>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12">

                <form class="m-form m-form--fit m-form--label-align-right" action="{{route('user.events.update',$event)}}" novalidate="novalidate" id="create_event" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="m-portlet__body">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item li_tabs">
                                <a class="nav-link active show" data-toggle="tab" href="#m_tabs_1_1">
                                    <i class="la la-exclamation-triangle"></i> اطلاعات اولیه رویداد
                                </a>
                            </li>
                            <li class="nav-item li_tabs">
                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">
                                    <i class="la la-cloud-download"></i> عکس های رویداد
                                </a>
                            </li>

                        </ul>



                        <div class="tab-content">
                        <!-- general tab content -->
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">

                            <h3>عمومی</h3>

{{--
                            <div class="m-portlet__body">
--}}
                        {{-- <div class="form-group m-form__group row">
                                                                           <div class="col-10 ml-auto">
                                                                    --}}{{--           <h3 class="m-form__section">اطلاعات اولیه</h3>--}}{{--
                                                                           </div>
                                                                       </div>--}}

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">نام رویداد</label>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                                <input class="form-control m-input" name="name" type="text" value="{{$event->name}}" >
                                @if($errors->first('name'))
                                    <label style="color:red">{{$errors->first('name')}}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">توضیحات مختصر</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <textarea name="description" class="form-control md-input" data-provide="markdown" rows="10" style="resize: none;">{{$event->description}}</textarea>
                                @if($errors->first('description'))
                                    <label style="color:red">{{$errors->first('description')}}</label>
                                @endif
                            </div>


                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">توضیحات تکمیلی</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <textarea name="long_description" class="form-control md-input" data-provide="markdown" rows="10" style="resize: none;">{{$event->long_description}}</textarea>
                                @if($errors->first('long_description'))
                                    <label style="color:red">{{$errors->first('long_description')}}</label>
                                @endif
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">تاریخ شروع</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <input class="form-control m-input start_date" name="start_date" type="text" value="{{$event->start_date}}" >
                                @if($errors->first('start_date'))
                                    <label style="color:red">{{$errors->first('start_date')}}</label>
                                @endif
                            </div>
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">تاریخ پایان</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <input class="form-control m-input end-date" name="end_date" type="text" value="{{$event->end_date}}">
                                @if($errors->first('end_date'))
                                    <label style="color:red">{{$errors->first('end_date')}}</label>
                                @endif
                                <span class="m-form__help">برای مثال 1398/10/05</span>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">تاریخ پایان ثبت نام</label>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                                <input class="form-control m-input" name="end_date_signup" type="text" value="{{$event->end_date_signup}}">
                                @if($errors->first('end_date_signup'))
                                    <label style="color:red">{{$errors->first('end_date_signup')}}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">قیمت</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <input class="form-control m-input" name="price" type="number" value="{{$event->price}}">
                                @if($errors->first('price'))
                                    <label style="color:red">{{$errors->first('price')}}</label>
                                @endif
                            </div>
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">ظرفیت</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <input class="form-control m-input" name="capacity" type="number" value="{{$event->capacity}}">
                                @if($errors->first('capacity'))
                                    <label style="color:red">{{$errors->first('capacity')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="exampleSelect1" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">موضوع رویداد</label>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                                <select class="form-control m-input m-input--square" name="event_subject_id"  id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($event_subjects as $event_subject)                            <option @if($event->event_subject_id==$event_subject->id) selected @endif value="{{$event_subject->id}}">{{$event_subject->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('event_subject_id'))
                                    <label style="color:red">{{$errors->first('event_subject_id')}}</label>
                                @endif
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
                                        <option @if($event->event_type_id==$event_type->id) selected @endif value="{{$event_type->id}}">{{$event_type->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('event_type_id'))
                                    <label style="color:red">{{$errors->first('event_type_id')}}</label>
                                @endif
                            </div>

                            <label for="exampleSelect1" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">وضعیت رویداد</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <select class="form-control m-input m-input--square" name="event_status_id"  id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($event_statuses as $event_status)
                                        <option @if($event->event_status_id==$event_status->id) selected @endif  value="{{$event_status->id}}">{{$event_status->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('event_status_id'))
                                    <label style="color:red">{{$errors->first('event_status_id')}}</label>
                                @endif
                            </div>


                        </div>
                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
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
                                        <option @if($event->province_id==$province->id) selected @endif  value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('province_id'))
                                    <label style="color:red">{{$errors->first('province_id')}}</label>
                                @endif
                            </div>
                            <label for="exampleSelect1" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">شهر</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                                <select class="form-control m-input m-input--square" name="city_id"  id="city_id">
                                    <option value="{{$event->city_id}}">{{$event->cities->name}}</option>

                                </select>
                                @if($errors->first('city_id'))
                                    <label style="color:red">{{$errors->first('city_id')}}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-form-label">آدرس</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
 <textarea class="form-control" type="text" name="address" rows="3">{{$event->address}}
 </textarea>
                                @if($errors->first('address'))
                                    <label style="color:red">{{$errors->first('address')}}</label>
                                @endif
                            </div>

                            <label for="" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-from-label">مختصات x</label>
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                <input class="form-control m-input" name="xplace" type="text" value="{{$xplace}}" >
                                @if($errors->first('xplace'))
                                    <label style="color:red">{{$errors->first('xplace')}}</label>
                                @endif
                            </div>
                            <label for="" class="col-md-1 col-lg-1 col-sm-1 col-xs-12 col-from-label">مختصات y</label>
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                <input class="form-control m-input" name="yplace" type="text" value="{{$yplace}}" >
                                @if($errors->first('yplace'))
                                    <label style="color:red">{{$errors->first('yplace')}}</label>
                                @endif
                            </div>
                        </div>/
                        <div class="form-group m-form__group row">
                            <label for="exampleSelect1" class="col-md-2 col-lg-2 col-sm-2 col-xs-12 col-form-label">هسته اصلی</label>
                            <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                                <select class="form-control m-input m-input--square" name="center_core_id" id="exampleSelect1">
                                    <option value="">انتخاب کنید.</option>
                                    @foreach($cores as $core)
                                        <option @if($event->center_core_id==$core->id) selected @endif  value="{{$core->id}}">{{$core->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('center_core_id'))
                                    <label style="color:red">{{$errors->first('center_core_id')}}</label>
                                @endif
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
                  {{--  </div>--}}


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
                                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                        <button class="btn btn-success pull-left form-control" type="button" id="addphoto">افزودن فیلد عکس</button>
                                    </div>
                                    <hr/>

                                </div>

                                <div class="images col-md-12">
                                @if(count($event->images) > 0)
                                <button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#demo" style="margin-bottom:20px">نمایش تصاویر رویداد</button>
                                
                                    <div id="demo" class="collapse">
                                        @foreach($event->images as $image)
                                        <div class="row img_{{$image->id}}" style="border: 1px solid whitesmoke;box-shadow: 1px 1px 1px 1px #928e8e;border-radius: 20px; margin-bottom:10px;">
                                            <div class="col-md-9">
                                                <img class="img-responsive event_imgs" src="{{asset($image->image_path)}}">
                                            </div>
                                            <div class="col-md-3 not_thumbnail_{{$image->id}}" style="@if($event->thumbnail_id == $image->id) display:none; @endif">
                                                <button type="button" class="btn btn-danger form-control btn-delete_img" data-img_id="{{$image->id}}" data-event_id="{{$event->id}}">حذف این تصویر</button>
                                                <hr/>
                                                <button type="button" class="btn btn-warning form-control btn-change_thumbnail" data-img_id="{{$image->id}}" data-event_id="{{$event->id}}">انتخاب به عنوان عکس شاخص</button>
                                            </div>

                                            <div class="col-md-3 is_thumbnail_{{$image->id}} label-success" style="border-radius: 30px;text-align: center; @if($event->thumbnail_id != $image->id) display:none; @endif">
                                                <label class="" style="background-color: green;color: white;border-radius: 10px;">تصویر شاخص <br/> برای حذف این تصویر ابتدا باید یکی دیگر از تصاویر موجود را به عنوان تصویر شاخص انتخاب کنید!</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                                </div>

                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button id="submit_edituser" type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom iranyekan"> ذخیره تغییرات</button>&nbsp;&nbsp;
                                            {{--                                 <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>--}}
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


{{--delete image--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-delete_img").on("click", function(){
            swal.fire({
                title: 'اطمینان دارید ؟',
                text: "بعد از حذف این تصویر قادر با بازیابی آن نمیباشیم!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله, حذف شود',
                cancelButtonText: 'خیر'
                }).then((result) => {
                if (result.value) {

                    var event_id = $(this).data('event_id');
                    var image_id = $(this).data('img_id');
                    var url = "{{route('user.event.delete_image')}}";
                    $.ajax({
                        data:{'event_id':event_id, 'image_id':image_id},
                        url:url,
                        type:"POST",
                        success:function(data){
                            swal.fire({
                                position: 'center',
                                type: 'success',
                                title: 'تصویر با موفقیت حذف گردید!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function(){
                                $(".img_"+data).fadeOut("slow");
                            },1500);
                        },
                        error:function(){
                            console.log('errror in deleting image');
                        }
                    });
                }
            })
        });
    </script>
    {{--end of delete image--}}

    {{-- change thumbnail image --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-change_thumbnail").on("click", function(){
            swal.fire({
                title: 'تغییر تصویر شاخص',
                text: "اطمینان دارید ؟",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله, تصویر شاخص تغییر کند.',
                cancelButtonText: 'خیر'
                }).then((result) => {
                if (result.value) {

                    var event_id = $(this).data('event_id');
                    var image_id = $(this).data('img_id');
                    var url = "{{route('user.event.change_thumbnail_image')}}";
                    $.ajax({
                        data:{'event_id':event_id, 'image_id':image_id},
                        url:url,
                        type:"POST",
                        success:function(data){
                            swal.fire({
                                position: 'top-left',
                                type: 'success',
                                title: 'تصویر شاخص با موفقیت تغییر کرد',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            //field haye ghabli ok she
                            $(".is_thumbnail_"+data).fadeOut("slow");
                            $(".not_thumbnail_"+data).fadeIn("slow");
                            //field haye alana ok she
                            $(".not_thumbnail_"+image_id).fadeOut("slow");
                            $(".is_thumbnail_"+image_id).fadeIn("slow");
                        },
                        error:function(){
                            console.log('errror in changeing thumbnail image');
                        }
                    });
                }
            })
        });
    </script>
    {{-- end of chnge thumbnail image --}}
@endsection