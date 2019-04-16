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
            <a href="{{route('admin.core.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            ویرایش پیام
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> پیام ها ها</a></li>
            <li class="active">ویرایش پیام </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش پیام </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.message.update',$message)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">عنوان</label>
                            <div class="col-sm-6">
                                <input id="name" name="title" value="{{$message->title}}" placeholder="عنوان پیام"  class="form-control" type="text">
                                @if($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('title')}}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="text">متن پیام</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="text">{{$message->text}}</textarea>
                        </div>
                    </div>

                  {{--  <div class="form-group">
                        <label class="col-sm-2 control-label" for="keywords">انتخاب منطقه</label>
                        <div class="col-sm-6">

                            <select name="area" id="area" class="form-control" style="width: 100%" >
                                <option value="">انتخاب کنید.</option>
                                @foreach($areas as $area)
                                    <option class="iranyekan" value="{{$area->id}}" >{{$area->name}} منطقه </option>
                                @endforeach
                            </select>

                        </div>
                    </div>--}}
<div class="col-md-3 pull-left">
    <span>کاربران ارسال شده</span>
    <ul>
        @foreach($message->users as $user)
        <li>{{$user->name}} {{$user->lastname}}</li>
            @endforeach
    </ul>
</div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">هسته</label>
                        <div class="col-sm-6">
               <select id="core" class="form-control" name="core_id" multiple>
                               @foreach($cores as $core)
     <option value="{{$core->id}}">{{$core->name}}</option>
                                   @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="users">کاربران</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="users" name="users[]" multiple>

                            </select>
                        </div>
                    </div>

                  {{--  <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">رشته</label>
                        <div class="col-sm-6">
                            <select id="field" class="form-control" name="field_id">
                                <option value="">جستجو کنید.</option>
                                --}}{{--@foreach($fields as $field)
                                    <option value="{{$field->id}}">{{$field->name}}</option>
                                @endforeach--}}{{--
                            </select>
                        </div>
                    </div>--}}

{{--
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">شغل</label>
                        <div class="col-sm-6">
                            <select id="job" class="form-control" name="job_id">          <option value="">انتخاب کنید.</option>

                            @foreach($jobs as $job)
                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
--}}

{{--
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="core_id">دانشگاه</label>
                        <div class="col-sm-6">
                            <select id="university" class="form-control" name="university_id">
                                <option value="">انتخاب کنید.</option>
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
--}}
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">نوع پیام</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="message_type_id">
                                <option value="0">نوع پیام را انتخاب کنید.</option>
                                @foreach($messagetypes as $messagetype)
                                <option  @if($messagetype->id==$message->message_type_id) selected @endif value="{{$messagetype->id}}">{{$messagetype->name}}</option>

                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="status">وضعیت</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status">
                                <option @if($message->status== 1) selected @endif value="1">فعال</option>
                                <option @if($message->status== 0) selected @endif  value="0">غیر فعال</option>
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

      /*  $("#core").select2({
            matcher: matchCustom,
            placeholder: "انتخاب هسته",

        });*/
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

        $("#core").change(function(e){
            e.preventDefault();
            var data = $(this).val();
            var url = "{{route('admin.show_users')}}";
            var type = "POST";
            console.log(data);
            $.ajax({
                data:{core_id:data},
                url:url,
                type:type,
                dataTy:'JSON',
                success:function(users)
                {
                    $("#users").html('');
                    $.each(users , function (user)
                    {
                        $("#users").append("<option value="+users[user].id+">"+users[user].name+"  "+users[user].lastname+"</option>");
                    })
                },
                error:function(e)
                {
                    $("#city").html('');
                    $("#city").append("<option>خطا</option>");
                }
            });
        });


        $('#lfm').filemanager('image');

    </script>

@stop