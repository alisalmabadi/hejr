@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.article_category.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
             دسته بندی مقالات

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> دسته بندی مقالات</a></li>
            <li class="active">ایجاد دسته جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد دسته جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.article_category.store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="name">نام دسته</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="{{old('name')}}" placeholder="نام دسته"  class="form-control" type="text">
                            </div>
                        </div>




                    <div id="slugvalid" class="form-group required">
                            <label class="col-sm-2 control-label" for="name">ادرس یکتا</label>
                            <div class="col-sm-6">
                                <input id="slug" name="slug" value="{{old('slug')}}" placeholder="یک ایدی انتخاب شود که در دسته ها یکتا باشد"  class="form-control" type="text" >
                            </div>
                        </div>
                    <div id="slugvalid" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">توضیحات</label>
                        <div class="col-sm-6">
                            <textarea id="desc" name="desc"  placeholder="متن کوتاه در باره دسته"  class="form-control"  >{{old('desc')}}</textarea>
                        </div>
                    </div>



                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر دسته</label>

                        {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'img', 'default' => '1']) !!}

                    </div>



                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">

        $('#slug').keypress(function(event){
            var char = String.fromCharCode(event.which)

            var txt = $(this).val()

            if (!char.match(/[^._,? \s\\]/)){

                return false;
            }

        });

        $(document).ready(
            function () {

            $('#lfm').filemanager('file');

        });

        $('#slug').on('input', function() {

            $.post('{{route('admin.article_category.slug')}}',{slug:$(this).val(),_token:$('meta[name=csrf-token]').attr('content')},function (data) {

                if (data == '1') {


                    $('#slugvalid').addClass('has-success');
                    $('#slugvalid').removeClass('has-error');

                } else
                {

                    $('#slugvalid').addClass('has-error');
                    $('#slugvalid').removeClass('has-success');

                }


            });
        });


        $('#seo_desc').on('input', function() {

            var txt=$(this).val();

            if(txt.length>150)
            {
                $('#valid_dec').addClass('has-warning');
            }
            else
            {
                $('#valid_dec').removeClass('has-warning');
            }
        });
    </script>

@stop