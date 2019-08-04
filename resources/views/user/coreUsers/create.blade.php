@extends('layouts.app_master')
@section('styles')
    <style>
        .form-control-feedback {
            color: red;
        }
        td{
            text-align:center;
        }
        .owl-prev {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 40%;
            margin-left: -20px;
            display: block !important;
            border:0px solid black;
        }

        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 40%;
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
@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="margin-right-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">کاربران این هسته</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">افزودن کاربر جدید</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">.</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->

    <div class="m-content">
        <div class="row" style="background-color:white; width:100%;">

            <div class="table-responsive" style="overflow-x:hidden; padding:10px;">
            <form action="{{route('user.coreUsers.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                        <input type="hidden" value="{{$core}}" name="core_id">
                        <div class="form-group row required">
                            <div class="col-sm-6">
                            <label class="col-sm-6 control-label" for="name">نام</label>
                                <input id="name" name="name" value="{{old('name')}}" placeholder="نام فرد"  class="form-control" type="text">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('name')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                            <label class="col-sm-6 control-label" for="name">نام خانوادگی</label>
                                <input id="name" name="lastname" value="{{old('lastname')}}" placeholder="نام خانوادگی فرد"  class="form-control" type="text">
                                @if($errors->has('lastname'))
                                    <span class="help-block">
                                            <strong style="color:red;">{{$errors->first('lastname')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group row required">
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">کدملی</label>
                            <input id="name" name="nationcode" value="{{old('nationcode')}}" placeholder="کدملی"  class="form-control" type="number">
                            @if($errors->has('nationcode'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('nationcode')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">نام کاربری</label>
                            <input id="name" name="username" value="{{old('username')}}" placeholder="نام کاربری"  class="form-control" type="text">
                            @if($errors->has('username'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('username')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row required">
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">ایمیل</label>
                            <input id="name" name="email" value="{{old('email')}}" placeholder="ایمیل"  class="form-control" type="text">
                            @if($errors->has('email'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('email')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">رمز عبور</label>
                            <input id="name" name="password" value="" placeholder="نام کاربری"  class="form-control" type="password">
                            @if($errors->has('password'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('password')}}</strong>
                                </span>
                            @endif
                        </div>

                    </div>  

                    <div class="form-group row required">
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">نام پدر</label>
                            <input id="name" name="father_name" value="{{old('father_name')}}" placeholder="نام پدر"  class="form-control" type="text">
                            @if($errors->has('father_name'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('father_name')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">آدرس</label>
                            <input id="name" name="address" value="{{old('address')}}" placeholder="آدرس"  class="form-control" type="text">
                            @if($errors->has('address'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('address')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row required">
                        
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">رتبه کنکور</label>
                            <input id="name" name="konkor_grade" value="{{old('konkor_grade')}}" placeholder="رتبه کنکور"  class="form-control" type="number">
                            @if($errors->has('konkor_grade'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('konkor_grade')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">شماره مبایل</label>
                            <input id="name" name="phonenumber" value="{{old('phonenumber')}}" placeholder="شماره مبایل"  class="form-control" type="number">
                            @if($errors->has('phonenumber'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('phonenumber')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row required">
                        
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="name">تاریخ تولد</label>
                            <input id="name" name="birthday" value="{{old('birthday')}}" placeholder="تاریخ تولد"  class="form-control" type="text">
                            @if($errors->has('birthday'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('birthday')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="keywords">انتخاب منطقه</label>
                            <select name="area" id="area" class="form-control" style="width: 100%" >
                                <option value="">انتخاب کنید.</option>
                                @foreach($areas as $area)
                                    <option class="iranyekan" value="{{$area->id}}" >{{$area->name}} منطقه </option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="keywords">وضعیت تاهل</label>
                            <select name="martial" id="area" class="form-control" style="width: 100%" >
                                <option value="">انتخاب کنید.</option>
                                <option value="1"> متاهل</option>
                                <option value="0">مجرد</option>
                            </select>

                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="core_id">رشته</label>
                            <select id="field" class="form-control" name="field_id">
                                <option value="">جستجو کنید.</option>
                                {{--@foreach($fields as $field)
                                    <option value="{{$field->id}}">{{$field->name}}</option>
                                @endforeach--}}
                            </select>
                        </div>
                    </div>

                    <div class="form-group row required">
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="core_id">شغل</label>
                            <select id="job" class="form-control" name="job_id">          <option value="">انتخاب کنید.</option>

                            @foreach($jobs as $job)
                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="core_id">وضعیت نظام وظیفه</label>
                            <select id="soldier" class="form-control" name="soldier_service_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($soldier_services as $soldier_service)
                                    <option value="{{$soldier_service->id}}">{{$soldier_service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row required">
                        
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="core_id">مقطع تحصیلی</label>
                            <select id="grade" class="form-control" name="grade_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                        <label class="col-sm-6 control-label" for="core_id">دانشگاه</label>
                            <select id="university" class="form-control" name="university_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">وضعیت</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="status">
                                <option value="1">فعال</option>
                                <option value="0">غیر فعال</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" class="form-control btn btn-success" value="دخیره">

                </form>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
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
            dir: 'rtl'
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
@endsection