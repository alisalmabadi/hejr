@extends('layouts.admin_master_full')
@section('style')
    <style>
        .select2{
            width: 80% !important;
        }
    </style>

    @endsection
@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.user.all')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش عضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> عضو ها</a></li>
            <li class="active">ویرایش عضو</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش عضو</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.user.update',$user)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">نام</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{$user->name}}" placeholder="نام فرد"  class="form-control" type="text">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام خانوادگی</label>
                        <div class="col-sm-6">
                            <input id="name" name="lastname" value="{{$user->lastname}}" placeholder="نام خانوادگی فرد"  class="form-control" type="text">
                            @if($errors->has('lastname'))
                                <span class="help-block">
                                        <strong>{{$errors->first('lastname')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">کدملی</label>
                        <div class="col-sm-6">
                            <input id="name" name="nationcode" value="{{$user->nationcode}}" placeholder="کدملی"  class="form-control" type="number">
                            @if($errors->has('nationcode'))
                                <span class="help-block">
                                        <strong>{{$errors->first('nationcode')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام کاربری</label>
                        <div class="col-sm-6">
                            <input id="name" name="username" value="{{$user->username}}" placeholder="نام کاربری"  class="form-control" type="text">
                            @if($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{$errors->first('username')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">ایمیل</label>
                        <div class="col-sm-6">
                            <input id="name" name="email" value="{{$user->email}}" placeholder="نام کاربری"  class="form-control" type="text">
                            @if($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">رمز عبور</label>
                        <div class="col-sm-6">
                            <input id="name" name="password" value="" placeholder="نام کاربری"  class="form-control" type="password">
                            @if($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{$errors->first('password')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">نام پدر</label>
                        <div class="col-sm-6">
                            <input id="name" name="father_name" value="{{$user->father_name}}" placeholder="نام پدر"  class="form-control" type="text">
                            @if($errors->has('father_name'))
                                <span class="help-block">
                                        <strong>{{$errors->first('father_name')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">آدرس</label>
                        <div class="col-sm-6">
                            <input id="name" name="address" value="{{$user->address}}" placeholder="آدرس"  class="form-control" type="text">
                            @if($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{$errors->first('address')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">کد پستی</label>
                        <div class="col-sm-6">
                            <input id="name" name="postalcode" value="{{$user->postalcode}}" placeholder="کد پستی"  class="form-control" type="number">
                            @if($errors->has('postalcode'))
                                <span class="help-block">
                                    <strong>{{$errors->first('postalcode')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">رتبه کنکور</label>
                        <div class="col-sm-6">
                            <input id="name" name="konkor_grade" value="{{$user->konkor_grade}}" placeholder="رتبه کنکور"  class="form-control" type="number">
                            @if($errors->has('konkor_grade'))
                                <span class="help-block">
                                        <strong>{{$errors->first('konkor_grade')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">شماره مبایل</label>
                        <div class="col-sm-6">
                            <input id="name" name="phonenumber" value="{{$user->phonenumber}}" placeholder="شماره مبایل"  class="form-control" type="number">
                            @if($errors->has('phonenumber'))
                                <span class="help-block">
                                        <strong>{{$errors->first('phonenumber')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">تلفن منزل</label>
                        <div class="col-sm-6">
                            <input id="name" name="home_number" value="{{$user->home_number}}" placeholder="تلفن منزل"  class="form-control" type="number">
                            @if($errors->has('home_number'))
                                <span class="help-block">
                                    <strong>{{$errors->first('home_number')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="name">تاریخ تولد</label>
                        <div class="col-sm-6">
                            <input id="name" name="birthday" value="{{$user->birthday}}" placeholder="تاریخ تولد"  class="form-control" type="text">
                            @if($errors->has('birthday'))
                                <span class="help-block">
                                        <strong>{{$errors->first('birthday')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>



{{--
                    <div class="row" style="padding: 10px 10px;">

                        <div class="col-sm-5">

                            <label class="col-sm-2 control-label" for="province">استان</label>
                            <select id="province" class="col-sm-4 form-control" name="province_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option @if($province->id == $user->province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-sm-5">
                            <label class="col-sm-2 control-label" for="city">شهر</label>
                            <select id="city" class="col-sm-4 form-control"  name="city_id">
                                <option value="">انتخاب کنید</option>
                            </select>

                        </div>

                    </div>
--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keywords">انتخاب منطقه</label>
                        <div class="col-sm-6">

                            <select name="area" id="area" class="form-control" style="width: 100%" >
                                <option value="">انتخاب کنید.</option>
                                @foreach($areas as $area)
                                    <option @if($user->area()->exists()) @if($area->id == $user->area->id) selected @endif @endif class="iranyekan" value="{{$area->id}}" >{{$area->name}} منطقه </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keywords">وضعیت تاهل</label>
                        <div class="col-sm-6">

                            <select name="martial" id="area" class="form-control" style="width: 100%" >
                                <option value="">انتخاب کنید.</option>
                                <option @if($user->martial==1) selected @endif value="1"> متاهل</option>

                                <option @if($user->martial==0) selected @endif value="0">مجرد</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">هسته</label>
                        <div class="col-sm-6">
               <select id="core" class="form-control" name="core_id">
                               @foreach($cores as $core)
     <option @if($user->core()->exists()) @if($core->id == $user->core->id) selected @endif @endif value="{{$core->id}}">{{$core->name}}</option>
                                   @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">رشته</label>
                        <div class="col-sm-6">

                            <select id="field" class="form-control" name="field_id">
                                <option value="@if($user->field()->exists()) {{$user->field->id}}@endif "> @if($user->field()->exists()) رشته فعلی {{$user->field->name}}  @endif</option>
                                {{--@foreach($fields as $field)
                                    <option value="{{$field->id}}">{{$field->name}}</option>
                                @endforeach--}}
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">شغل</label>
                        <div class="col-sm-6">
                            <select id="job" class="form-control" name="job_id">          <option value="">انتخاب کنید.</option>

                            @foreach($jobs as $job)
                                    <option @if($user->job()->exists()) @if($job->id == $user->job->id) selected @endif @endif value="{{$job->id}}">{{$job->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">وضعیت نظام وظیفه</label>
                        <div class="col-sm-6">
                            <select id="soldier" class="form-control" name="soldier_service_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($soldier_services as $soldier_service)
                                    <option @if($user->soldier_service()->exists()) @if($soldier_service->id == $user->soldier_service->id) selected @endif @endif value="@if($user->soldier_service()->exists()) {{$soldier_service->id}} @endif">{{$soldier_service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">مقطع تحصیلی</label>
                        <div class="col-sm-6">
                            <select id="grade" class="form-control" name="grade_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($grades as $grade)
                                    <option @if($user->grade()->exists()) @if($grade->id == $user->grade->id) selected @endif @endif value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">دانشگاه ها</label>
                        <div class="col-sm-6">
                            <select id="university" class="form-control" name="university_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($universities as $university)
                                    <option @if($user->university()->exists()) @if($university->id == $user->university->id) selected @endif @endif value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> انتخاب
     </a>
   </span>
                        <input id="thumbnail" value="{{$user->image_path}}" class="form-control" type="text" name="image_path">
                    </div>
                    <img src="{{$user->thumbnail}}" id="holder" style="margin-top:15px;max-height:100px;">


                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">وضعیت</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                                <option @if($user->status==1)  selected @endif value="1">فعال</option>
                                <option @if($user->status==0)  selected @endif value="0">غیر فعال</option>
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




        function matchCustom(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Do not display the item if there is no 'text' property
            if (typeof data.text === 'undefined') {
                return null;
            }

            // `params.term` should be the term that is used for searching
            // `data.text` is the text that is displayed for the data object
            if (data.text.indexOf(params.term) > -1) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text;

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        $("#area").select2({
            matcher: matchCustom,
            placeholder: "انتخاب منطقه محل سکونت",

        });

        $("#city").select2({
            matcher: matchCustom,
            placeholder: "انتخاب شهر محل سکونت",

        });

        $("#province").select2({
            matcher: matchCustom,
            placeholder: "انتخاب استان محل سکونت",

        });

        $("#core").select2({
            matcher: matchCustom,
            placeholder: "انتخاب هسته",

        });
        $("#university").select2({
            matcher: matchCustom,
            placeholder: "انتخاب دانشگاه",

        });
        $("#job").select2({
            matcher: matchCustom,
            placeholder: "انتخاب شغل",

        });


</script>
    <script type="text/javascript">

        $("#field").select2({
            ajax: {
                url: "{{route('loadfields')}}",
                dataType: 'json',
                method: 'POST',
                quietMillis: 50,
                delay: 250,
                data: function (params) {
                    return {
                        q:params, // search term
                        page: params.page,

                        _token: $('meta[name="csrf-token"]').attr('content'),
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(obj) {
                            return {
                                id: obj.id,
                                text: obj.name
                            };
                        })
                    };
                },
                cache: true
            },
            placeholder: 'جستجوی رشته',
         /*   escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo,*/
/*
            templateSelection: formatRepoSelection
*/
        });

       /*function formatRepo (data) {
            /!*if (repo.loading) {
                return repo.text;
            }*!/

            var markup = "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" + data.name + "</div>";

            return markup;
        }
*/
      /*  function formatRepoSelection (repo) {
            return repo.full_name || repo.text;
        }*/



        $('#lfm').filemanager('image');

    </script>

@stop