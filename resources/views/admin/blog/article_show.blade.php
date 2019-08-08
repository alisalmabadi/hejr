@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.article.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.article.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-category').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
           مقالات

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-book"></i> بلاگ</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i>اخبار یا مقاله </li>
        </ol>
    </section>
@endsection

@section('content')
    <section  style="margin-top: 10px">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
            <div class="panel-body">
                <div class="from-group">

                    <div class="col-sm-3">
                        <label class=" control-label" for="search">جستوجو</label>
                        <input type="text" class="form-control" name="search" id="search" onkeyup="filter_cat($('#search').val(),$('#article_category_id').val())">

                    </div>




                    <div class="col-sm-3">
                        <label class="control-label" for="category_id">دسته بندی</label>
                        <select name="article_category_id" id="article_category_id" style=" width: 100%!important;" onchange="filter_cat($('#search').val(),$('#article_category_id').val())" class="form-control typesel" >
                            <option value="0">همه</option>
                        @foreach($article_categories as $article_category)
                                <option value="{{$article_category->id}}">{{$article_category->name}}</option>
                        @endforeach
                        </select>


                    </div>

                </div>
        </div>
        </div>
    </section>
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست مقالات</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.article.destroy')}}" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">عنوان</td>

                                <td class="text-center">دسته</td>
                                <td class="text-center">تاریخ ایجاد</td>

                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($articles as $article)
                                <tr>
                                <td class="text-center">
                                <input name="selected[]" value="{{$article->id}}" type="checkbox">
                                </td>
                                <td class="text-center">{{$article->title}}</td>
                                <td class="text-center">{{$article->article_category->name}}</td>

                                <td class="text-center">{{$article->created_at}}</td>

                                <td class="text-center"><a href="{{route('admin.article.edit',$article)}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="application/javascript">
        function get_post_type_name(id)
        {
            var list=["","صفحه اصلی","دسته ها","محصولات"];


            return list[id];

        }

        function get_type_name(id)
        {
            var list=["","متن","متن و عکس(متن راست)","متن و عکس(متن چپ)","متن و ویدو(متن راست)",
                "متن و ویدو(متن چپ)","عکس تکی","عکس با عنوان","ویدیو تکی","ویدیو دوتایی"];


            return list[id];

        }

        $('.typesel').select2();
        $('.typeselreq').select2({placeholder:'موقعیت انتخاب شود'});

        function filter_cat(search,article_category_id) {

            var data={
                r_search:search,
                article_category_id:article_category_id,
                _token:$('meta[name=csrf-token]').attr('content')
            };

            $.post('{{route('admin.article.filter')}}',data,function(response)
            {
                $('#ajx_content_cat').empty();
                $.each(response, function(i, obj) {
                    html='<tr>';
                    html+='<td class="text-center">';
                    html+='<input name="selected[]" value="'+obj.id+'" type="checkbox">';
                    html+='</td>';
                    html+='<td class="text-center">'+obj.title+'</td>';
                    html+='<td class="text-center">'+obj.article_category.name+'</td>';

                    html+='<td class="text-center">'+obj.created_at+'</td>';
                    html+='<td class="text-center">'+obj.order+'</td>';
                    html+='<td class="text-center"><a href="/9346790b5ef06657673da0bc27951f2ad9d97c44/article/'+obj.id+'/edit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ویرایش"><i class="fa fa-pencil"></i></a></td>';
                    html+='</tr>';
                    $('#ajx_content_cat').append(html);

                });

            });


        }

        $('#post_type').change(function() {

            type=this.value;

            $.ajax({
                {{--url: '{{route('admin.post.get_post_type')}}',--}}
                dataType: 'json',
                type: 'POST',
                data: {"post_type":type},
                success: function(response) {
                    $('#resource_id').empty();
                    $('#resource_id').append('<option value="0">همه</option>');
                    $.each(response, function(i, obj) {
                        $('#resource_id').append('<option value="'+obj.id+'">'+obj.name+'</option>');
                    });
                    $('.typesel').select2();

                },
                error: function(x, e) {

                }

            });

        });




    </script>

@stop

