@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.user.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a>

            <a href="{{route('admin.user.all')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
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
                <form action="{{route('admin.report.user.export')}}" method="post">
                    {{csrf_field()}}
                    @foreach($users as $user)
                    <input type="hidden" name="user[]" value="{{$user}}">
                    @endforeach
                    <button type="submit" class="btn btn-danger center-block" style="    width: 15%;">
                        گزارش گیری اکسل
                    </button>
                </form>
            </div>
            <div class="panel-body">

                <form action="/admin//destroy" method="post" enctype="multipart/form-data" id="form-category">
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

                                <td class="text-center" style="max-width: 50px">تحصیل</td>

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
                                        <input name="selected[]" value="7" type="checkbox">
                                    </td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->lastname}}</td>
                                    <td class="text-center">@if($user->core()->exists()) {{$user->core->name}} @endif </td>
                                    <td class="text-center">@if($user->field()->exists()) {{$user->field->name}} @else <label class="label label-warning">وارد نشده است</label> @endif</td>
                                    <td class="text-center">@if($user->grade()->exists()) {{$user->grade->name}} @else <label class="label label-danger">وارد نشده است</label> @endif</td>

                                    <td class="text-center">{{$user->username}}</td>
                                    <td class="text-center">{{$user->phonenumber}}</td>
                                    <td class="text-center"><img src="{{$user->thumbnail}}" class="img-thumbnail img-responsive img-sm"> </td>
                                    <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">
                                        <a href="{{route('admin.user.edit',$user)}}">
                                            <button class="btn btn-info" type="button">ویرایش</button>
                                        </a>


                                        <div class="reserve_modal" data-id="{{$user->id}}">
                                            <button class="btn btn-default" type="button">رزرو ها</button>
                                        </div>

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
        {{--

                show addresses modal
                <div id="shortModal" class="modal modal-wide fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="modal-username" style="text-align: center;">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <p id="modal-number">One fine body&hellip;</p>
                                <div class="pull-left"><button class="btn btn-primary" id="btn_new_address"><i class="fa fa-plus"></i></button></div>
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                    <tr>
                                        <td class="text-center" style="max-width: 50px">نام گیرنده</td>
                                        <td class="text-center" style="max-width: 50px">تلفن همراه</td>
                                        <td class="text-center" style="max-width: 50px">استان</td>
                                        <td class="text-center" style="max-width: 50px">شهر</td>
                                        <td class="text-center" style="max-width: 50px">آدرس</td>
                                        <td class="text-center" style="max-width: 50px">کد پستی</td>
                                        <td class="text-center" style="max-width: 50px">عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_modal">

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                            </div>
                        </div>
                    </div>
                </div>
                end of modal show addresses

                edit modal
                <div class="modal fade" id="modal-edit-address" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ویرایش اطلاعات</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form action="{{route('userAddress.update',8)}}" method="post" enctype="multipart/form-data" id="update-form">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <input type="hidden" name="address_id" id="address_id" class="address_id">
                                        <div class="form-group">
                                            <div class="row" style="padding: 10px 10px;">
                                                <div class="col-sm-6">
                                                    <label for="old_full_name">نام و نام خانوادگی تحویل گیرنده</label>
                                                    <input  name="old_full_name" id="name" class="birth-date-ob-server" value=""  oninvalid="this.setCustomValidity('لطفا این فیلد را خالی رها نکنید.')"  oninput="this.setCustomValidity('')"  type="hidden" required>
                                                    <input id="old_full_name" name="old_full_name"  value="" class="form-control pdatep old_full_name2">
                                                    <label style="color:red;margin-right: 2%;" id="old_full_name-error"></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="old_phone_number">شماره موبایل</label>
                                                    <input id="old_phone_number" name="phone_number" placeholder="0919xxxxxxx" class="form-control" aria-required="true"   value="" autocomplete="off" type="text">
                                                    <label style="color:red; margin-right: 2%;" id="old_phone_number-error"></label>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 10px 10px;">
                                                <div class="col-sm-6">
                                                    <label for="old_province">استان</label>
                                                    <select id="old_province" class="form-control" name="province_id" required>
                                                        @foreach($provinces as $province)
                                                            <option value="{{$province->id}}" >{{$province->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="old_city">شهر</label>
                                                    <select id="old_city" class="form-control"  name="city_id" required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding: 10px 10px;">
                                                <label for="old_address">آدرس پستی</label>
                                                <textarea id="old_address" name="address"  class="form-control" aria-required="true"   autocomplete="off" oninvalid="this.setCustomValidity('لطفا این فیلد را خالی رها نکنید.')"  oninput="this.setCustomValidity('')"  required ></textarea>
                                                <label style="color:red; margin-right: 2%;" id="old_address-error"></label>
                                            </div>
                                            <div class="form-group" style="padding: 10px 10px;">
                                                <label for="old_zone">آدرس پستی</label>
                                                <input id="old_zone" name="zone"  class="form-control" aria-required="true"   autocomplete="off" oninvalid="this.setCustomValidity('لطفا این فیلد را خالی رها نکنید.')"  oninput="this.setCustomValidity('')"  required >
                                                <label style="color:red; margin-right: 2%;" id="old_zone-error"></label>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="edit-address" data-dismiss="modal"> انصراف و بازگشت</span>
                                            <input type="submit" name="submit" value="ثبت و ارسال به این آدرس" class="btn btn-custome pull-right save_address">
                                            <button type="button" class="btn btn-custome pull-right save_address">ثبت و ارسال به این آدرس</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                end of address edit modal

                modal new address
                <div class="modal fade" id="new-address" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ویرایش اطلاعات</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form method="POST" id="frm-new-address" action="{{route('userAddress.store')}}"  enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <div class="row" style="padding: 10px 10px;">
                                                <div class="col-sm-6">
                                                    <label for="name">نام و نام خانوادگی تحویل گیرنده</label>
                                                    <input type="hidden" name="user_id" id="user_id">
                                                    <input  name="name" class="birth-date-ob-server" value=""  oninvalid="this.setCustomValidity('لطفا این فیلد را خالی رها نکنید.')"  oninput="this.setCustomValidity('')"  type="hidden" required>
                                                    <input id="name" name="name"  value="" class="form-control pdatep">
                                                    <label style="color: red;margin-right: 2%;" id="name-error">{{$errors->first('name')}}</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="mobile_number">شماره موبایل</label>
                                                    <input id="phone_number" name="mobile_number" placeholder="0919xxxxxxx" class="form-control" aria-required="true"   value="" autocomplete="off" type="text">
                                                </div>
                                                <label style="color: red; margin-right: 2%;" id="mobile_number-error">{{$errors->first('mobile_number')}}</label>
                                            </div>
                                            <div class="row" style="padding: 10px 10px;">
                                                <div class="col-sm-6">
                                                    <label for="province">استان</label>
                                                    <select id="province" class="form-control" name="province_id" required>
                                                        <option>انتخاب کنید</option>
                                                        @foreach($provinces as $province)
                                                            <option value="{{$province->id}}">{{$province->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="city">شهر</label>
                                                    <select id="city" class="form-control"  name="city_id" required>
                                                        <option>انتخاب کنید</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding: 10px 10px;">
                                                <label for="address">آدرس پستی</label>
                                                <textarea id="address" name="address"  class="form-control" aria-required="true"   autocomplete="off" oninvalid="this.setCustomValidity('لطفا این فیلد را خالی رها نکنید.')"  oninput="this.setCustomValidity('')"  required ></textarea>
                                                <label style="color:red; margin-right: 2%;" id="address-error">{{$errors->first('address')}}</label>
                                            </div>
                                            <div class="form-group" style="padding: 10px 10px;">
                                                <label for="postal_code">کد پستی</label>
                                                <input id="zone" name="postal_code"  class="form-control" aria-required="true"   autocomplete="off" oninvalid="this.setCustomValidity('لطفا این فیلد را خالی رها نکنید.')"  oninput="this.setCustomValidity('')"  required >
                                            </div>
                                            <label style="color: red; margin-right: 2%;" id="postal_code-error">{{$errors->first('zone')}}</label>
                                        </div>
                                        <div style="padding: 0 5%;">
                                            <span class="edit-address pull-left" data-dismiss="modal"> انصراف و بازگشت</span>
                                            <button type="button" class="btn btn-custome save_new_address">ثبت و ارسال به این آدرس</button>
                                            <input type="submit" name="submit" class="btn btn-custome save_new_address" value="ثبت و ارسال به این آدرس">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                end of modal new address
        --}}


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
