@extends('layouts.admin_master_full')
@section('style')
    <style>
        .select2{
            width: 80% !important;
        }
        .alerts{
            padding: 15px;
            margin-bottom: 22px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>

    @endsection
@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <button type="submit" form="form-material" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="ذخیره"><i class="fa fa-save"></i></button>
            <a href="{{route('admin.core.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="لغو"><i class="fa fa-reply"></i></a></div>
        <h1>
            افزودن گروهی عضو
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-bars"></i> عضو ها</a></li>
            <li class="active">ایجاد گروهی عضو </li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-plus "></i>ایجاد گروهی عضو جدید</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.user.multiple_store')}}" class="form-horizontal" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}

    <div class="alerts alert-danger" role="alert">
        <h2>
            لطفا برای افزودن عضو به نکات زیر توجه فرمایید:
        </h2>

        <ul>
          <li>
              عضو تکراری در سامانه موجود نباشد.
          </li>
            <li>
                فایل اکسل آپلود شده باید دارای ستون هایی مثل  <a href="">این فایل</a> باشد.

            </li>
            <li>
                هیچ ستون هسته ، رمزعبور و نام کاربری خالی نباشد.
            </li>
        </ul>
    </div>


                    <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> انتخاب
     </a>
   </span>
                        <input id="thumbnail" class="form-control" type="text" name="file">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">



                </form>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <script type="text/javascript">

        $('#lfm').filemanager('file');

    </script>

@stop