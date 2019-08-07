@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.article.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
           ویرایش اخبار یا مقاله

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-globe"></i> بلاگ</a></li>

            <li class="active"><i class="fa fa-pencil"></i> اخبار یا مقاله </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ویرایش اخبار یا مقاله </h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.article.update',$article)}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="article_category_id">انتخاب دسته </label>
                        <div class="col-sm-4">
                            <select  name="article_category_id" id="article_category_id" style="width: 100%;" class="form-control typesel" >
                                @foreach($article_categories as $article_category)
                                    <option value="{{$article_category->id}}" @if($article->article_category_id==$article_category->id) selected @endif>{{$article_category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="category_id">انتخاب دسته محصول مرتبط </label>
                        <div class="col-sm-4">
                            <select  name="category_id" id="category_id" style="width: 100%;" class="form-control typesel" >
                                <option value="0">انتخاب</option>
                                @foreach($categories as $category)

                                    <option value="{{$category->id}}"  @if($category->id==$article->category_id) selected @endif>{{$category->name}}</option>

                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="product_id">انتخاب محصول مرتبط </label>
                        <div class="col-sm-4">
                            <select  name="product_id" id="product_id" style="width: 100%;" class="form-control typesel" >
                                <option value="0">انتخاب</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}"  @if($product->id==$article->product_id) selected @endif>{{$product->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('product_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('product_id') }}</strong>
                                    </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="user_id">انتخاب نویسنده </label>
                        <div class="col-sm-4">
                            <select  name="user_id" id="user_id" style="width: 100%;" class="form-control typesel" >
                                <option value="0">انتخاب</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @if($user->id==$article->user_id) selected @endif >{{$user->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">عنوان</label>
                        <div class="col-sm-4">
                            <input id="title" name="title" value="{{$article->title}}" placeholder="عنوان"  class="form-control" type="text">

                        </div>

                    </div>




                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-4">
                            <button type="button" class="btn btn-primary btn-block fileManager" data-url="{{route('home')}}/image-manager" data-multi="true">نمایش گالری</button>
                        </div>
                    </div>
                    <div id="txt_area" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">متن</label>
                        <div class="col-sm-9">
                            <textarea id="body" name="body"  placeholder="متن"  class="form-control" >{{$article->body}}</textarea>

                        </div>

                    </div>

                    <h3>سئو</h3>

                    <div id="slugvalid" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">عنوان صفحه</label>
                        <div class="col-sm-6">
                            <input id="seo_title" name="seo_title" value="{{$article->seo_title}}" placeholder="عنوان بای تب مروگز"  class="form-control" type="text" >
                            @if ($errors->has('seo_title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('seo_title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div id="slugvalid" class="form-group required">
                        <label class="col-sm-2 control-label" for="name">ادرس یکتا</label>
                        <div class="col-sm-6">
                            <input id="slug" name="slug" value="{{$article->slug}}" placeholder="یک ایدی انتخاب شود که در دسته ها یکتا باشد"  class="form-control" type="text" >
                            @if ($errors->has('slug'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="keywords">تک های سئو</label>
                        <div class="col-sm-6">
                            <select name="keywords[]" id="keywords" class="form-control keyword2" style="width: 100%;" multiple="multiple">

                                @foreach($keywords as $keyword)
                                    <option value="{{$keyword->id}}"  @if(in_array($keyword->id,$article->keywords->pluck('id')->toArray())) selected @endif  >{{$keyword->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div id="valid_dec" class="form-group required">
                        <label class="col-sm-2 control-label" for="seo_desc">توضیحات سئو</label>
                        <div class="col-sm-6">
                            <textarea id="seo_desc" name="seo_desc" placeholder="توضیح سئو حداکثر 150  کاراکتر"  class="form-control">{{$article->seo_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر بند انگشتی مقاله</label>

                        {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'img_thumbnail', 'default' => $article->img_thumbnail]) !!}

                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="link">تصویر مقاله</label>

                        {!! ImageManager::getField(['text' => 'انتخاب عکس', 'class' => 'btn btn-primary', 'field_name' => 'img', 'default' => $article->img]) !!}

                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">
        $('.typesel').select2();
        CKEDITOR.replace( 'body' );
        $('#slug').keypress(function(event){
            var char = String.fromCharCode(event.which)

            var txt = $(this).val()

            if (!char.match(/[^._,? \s\\]/)){
                return false;
            }
        });
        $('#slug').on('input', function() {

            $.post('{{route('admin.article.slug')}}',{slug:$(this).val(),_token:$('meta[name=csrf-token]').attr('content')},function (data) {

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



            }else
            {
                $('#valid_dec').removeClass('has-warning');

            }
        });

        //detail section js

        $('.keyword2').select2({ dir: "rtl"});








    </script>

@stop