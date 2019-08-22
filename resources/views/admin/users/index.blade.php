@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.user.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a>

            <a href="{{route('admin.user.all')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-users').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>


        <h1>
            کلیه اعضا
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-users"></i>اعضا</li>
        </ol>
    </section>

    <style>
        .modal.modal-wide .modal-dialog {
            width: 90%;
        }
        .modal-wide .modal-body {
            overflow-y: auto;
        }

        /* irrelevant styling */
        /*body { text-align: center; }*/
        body p {
            max-width: 400px;
            margin: 20px auto;
        }
        #tallModal .modal-body p { margin-bottom: 900px }
    </style>
@endsection

@section('content')
    <section class="content">

        <section style="margin-top: 10px">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-filter"></i> فیلتر</h3>

                </div>
                <div class="panel-body">
                    <form action="" method="get" class="form-horizontal">
                        <div class="from-group">
                            <div class="col-sm-3">
                                <label class=" control-label" for="search">هسته</label>
            <select class="form-control" name="core_id">
            <option value="0">همه</option>
                @foreach($cores as $core)

                <option @if($filter['core_id'] == $core->id) selected @endif value="{{$core->id}}">{{$core->name}}</option>
                    @endforeach
            </select>

                            </div>

                            <div class="col-sm-3">
                                <label class=" control-label" for="field">رشته</label>
                                <select class="form-control" name="field_id">

                                <option value="0">همه</option>
                                @foreach($fields as $field)
                                    <option  @if($filter['field_id'] == $field->id) selected @endif value="{{$field->id}}">{{$field->name}}</option>
                                    @endforeach
                                    </select>

                            </div>

                            <div class="col-sm-3">
                                <label class=" control-label" for="field">شغل</label>
                                <select class="form-control" name="job_id">

                                    <option value="0">همه</option>
                                    @foreach($jobs as $job)
                                        <option   @if($filter['job_id'] == $job->id) selected @endif  value="{{$job->id}}">{{$job->name}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="col-sm-2">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <input class="btn btn-primary form-control" type="submit" value="اعمال">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>



        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست کاربران</h3>
            </div>
            <div class="panel-body">
                <form action="/admin/users/destroy" method="post" enctype="multipart/form-data" id="form-users">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="m_table_1">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center" style="max-width: 50px"> نام</td>
                                <td class="text-center" style="max-width: 50px"> خانودگی</td>
                                <td class="text-center" style="max-width: 50px">هسته</td>

                                <td class="text-center" style="max-width: 50px">رشته</td>

                                {{--<td class="text-center" style="max-width: 50px">شماره تلفن</td>--}}
                                <td class="text-center" style="max-width: 50px">شماره موبایل</td>
              <td class="text-center" style="max-width: 50px">نام کاربری</td>
                                {{--<td class="text-center" style="max-width: 30px">استان</td>--}}
                                {{--<td class="text-center" style="max-width: 30px;">شهر</td>--}}
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">عکس</td>
                                {{--<td class="text-center" style="max-width: 70px">کد پستی</td>--}}
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">عملیات</td>
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">وضعیت</td>

                                {{--
                                                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">نمایش کامل</td>
                                --}}


                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <input name="selected[]" value="{{$user->id}}" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->lastname}}</td>
                                    <td class="text-center">@if($user->core()->exists()) {{$user->core->name}} @endif </td>
                                    <td class="text-center">@if($user->field()->exists()) {{$user->field->name}} @else <label class="label label-warning">وارد نشده است</label> @endif</td>

                                    <td class="text-center">{{$user->username}}</td>
                                    <td class="text-center">{{$user->phonenumber}}</td>
                                    <td class="text-center"><img src="{{$user->thumbnail}}" class="img-thumbnail img-responsive img-sm"> </td>
                                    <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">
                                        <a href="{{route('admin.user.edit',$user)}}">
                                        <button class="btn btn-info" type="button">ویرایش</button>
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        @if($user->status == 1)
                                        <div class="btn btn-success" type="button">فعال</div>
                                    @else
                                            <div class="btn btn-danger" type="button">غیرفعال</div>
                                        @endif
                                    </td>

{{--<td class="text-center" >
    <a href="{{route('admin.user.edit',$user)}}">
        <button class="btn btn-danger" type="button">نمایش کامل</button>
    </a>
</td>--}}

                                </tr>
                            @endforeach

                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div id="modal-bodyy" class="modal-content">

                                    </div>

                                </div>
                            </div>


                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

        {{--waiting gif--}}
        <div class="container-fluid" id="register_wait" style="
    width: 100%;
    height: 100%;
    z-index: 1000;
    position: fixed;
    top: 0;
    background-color: #0000005c;
    display: none;
">
            <img src="{{ asset('gifs/register_wait.gif') }}" style="margin-top: 15%;margin-right: 20%; height: 200px; width: 500px;">
        </div>
        {{--end of waiting gif--}}
    </section>
@endsection


@section('admin-footer')
    <script type="text/javascript">
        var table = $('#m_table_1');
        table.DataTable({
            responsive: true,
        });
    </script>
@stop
