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


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست کاربران</h3>
            </div>
            <div class="panel-body">
                <form action="/admin//destroy" method="post" enctype="multipart/form-data" id="form-category">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <td class="text-center" style="max-width: 50px"> نام</td>
                                <td class="text-center" style="max-width: 50px">نام خانودگی</td>
                                <td class="text-center" style="max-width: 50px">هسته</td>
                                {{--<td class="text-center" style="max-width: 50px">شماره تلفن</td>--}}
                                <td class="text-center" style="max-width: 50px">شماره موبایل</td>
              <td class="text-center" style="max-width: 50px">نام کاربری</td>
                                {{--<td class="text-center" style="max-width: 30px">استان</td>--}}
                                {{--<td class="text-center" style="max-width: 30px;">شهر</td>--}}
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">عکس</td>
                                {{--<td class="text-center" style="max-width: 70px">کد پستی</td>--}}
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">ویرایش</td>
{{--
                                <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">نمایش کامل</td>
--}}


                            </tr>
                            </thead>
                            <tbody id="ajx_content_cat">
                            @foreach($users as $user)
                                <tr>

                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->lastname}}</td>
                                    <td class="text-center">@if($user->core()->exists()) {{$user->core->name}} @endif </td>
                                    <td class="text-center">{{$user->username}}</td>
                                    <td class="text-center">{{$user->phonenumber}}</td>
                                    <td class="text-center"><img src="{{$user->thumbnail}}"> </td>
                                    <td class="text-center" style="max-width: 150px;text-overflow: ellipsis;">
                                        <a href="{{route('admin.user.edit',$user)}}">
                                        <button class="btn btn-info" type="button">ویرایش</button>
                                        </a>
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
   {{-- <script>
        $("#date_from").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#date_from_observer'
        });
        $("#date_to").pDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '#date_to_observer'
        });


        $(document).ready(function ()
        {
            $('.select2').select2({
                dir:'rtl',
            });



        });
    </script>


    --}}{{--get province and cities after province_change for edit modal--}}{{--
    <script>
        $.ajaxSetup
        ({
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $("#modal-edit-address").find("#old_province").change(function(e){
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
                    $("#modal-edit-address").find("#old_city").html('');
                    $.each(cities , function (city)
                    {
                        $("#modal-edit-address").find("#old_city").append("<option value="+cities[city].id+">"+cities[city].name+"</option>");
                    })
                },
                error:function(e)
                {
                    $("#modal-edit-address").find("#old_city").html('');
                    $("#modal-edit-address").find("#old_city").append("<option>خطا</option>");
                }
            });
        });
    </script>
    --}}{{--End--}}{{--

    --}}{{--get province and cities after province_change for add new address modal--}}{{--
    <script>
        $.ajaxSetup
        ({
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $("#new-address").find("#province").change(function(e){
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
                    $("#new-address").find("#city").html('');
                    $.each(cities , function (city)
                    {
                        $("#new-address").find("#city").append("<option value="+cities[city].id+">"+cities[city].name+"</option>");
                    })
                },
                error:function(e)
                {
                    $("#new-address").find("#city").html('');
                    $("#new-address").find("#city").append("<option>خطا</option>");
                }
            });
        });
    </script>
    --}}{{--End--}}{{--



    --}}{{--show addresses from every user in modal--}}{{--
    <script>
        $.ajaxSetup
        ({
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        // global user_id for using in add new address to find id
        var user_id;

        $(".modal-wide").on("show.bs.modal", function() {
            var height = $(window).height() - 200;
            $(this).find(".modal-body").css("max-height", height);
        });
        $(".btn_show_addresses").on('click' , function ()
        {
            $("#register_wait").show();
            $("#shortModal").find("#tbody_modal").html('');
            var username = $(this).attr('username');
            user_id = $(this).attr('user_id');
            var url = $(this).attr('url');
            var type = "POST";
            $.get({
                data:username,
                url:url,
                type:type,
                success:function (addresses)
                {
                    $.each(addresses , function (address)
                    {
                        $("#shortModal").find("#tbody_modal").append("<tr><td>"+addresses[address].name+"</td><td>"+addresses[address].mobile_number+"</td><td>"+addresses[address].province.name+"</td><td>"+addresses[address].city.name+"</td><td>"+addresses[address].address+"</td><td>"+addresses[address].postal_code+"</td><td><button onclick='editaddress("+addresses[address].id+")'>Edit</button><button onclick='delAddress("+addresses[address].id+")'>Del</button></td></tr>");
                    });
                    $("#shortModal").find("#modal-number").html("تعداد " + addresses.length + " آدرس توسط این کاربر وارد شده است.");
                    $("#shortModal").find("#modal-username").html(username);
                    // $("#show-addresses").modal('show');
                    $("#register_wait").hide();
                    $("#shortModal").modal('show');
                },
                error:function (e)
                {
                    $("#register_wait").hide();
                    console.log('error from getting addresses');
                }
            });
        })
        --}}{{--end of show addresses from every user in modal--}}{{--



        --}}{{--add new address--}}{{--
        $("#btn_new_address").on('click' , function(e){
            $("#shortModal").modal('hide');
            $("#new-address").find("#user_id").val('');
            $("#new-address").find("#name").val('');
            $("#new-address").find("#phone_number").val('');
            $("#new-address").find("#zone").val('');
            $("#new-address").find("#address").val('');
            $("#new-address").modal('show');
            $("#frm-new-address").find("#user_id").val(user_id);
        });

        $("#frm-new-address").on('submit' , function(e){
            e.preventDefault();
            $("#name-error").css('display' , 'none');
            $("#mobile_number-error").css('display' , 'none');
            $("#address-error").css('display' , 'none');
            $("#postal_code-error").css('display' , 'none');

            var url = "{{route('admin.report.users.storeAddress')}}";
            var data = $("#frm-new-address").serialize();
            data += user_id;
            var type = "POST";
            console.log(data);
            $.ajax({
                url:url,
                type:type,
                data:data,
                success:function(data)
                {
                    alert('آدرس وارد شده با موفقیت ثبت گردید');
                    $("#new-address").modal('hide');
                },
                error:function(e)
                {
                    console.log('error in add address');
                    if(e.responseJSON.name) {
                        $("#name-error").text(e.responseJSON.name[0]);
                        $("#name-error").css('display' , 'block');
                    }
                    if(e.responseJSON.mobile_number) {
                        $("#mobile_number-error").text(e.responseJSON.mobile_number[0]);
                        $("#mobile_number-error").css('display' , 'block');
                    }
                    if(e.responseJSON.address) {
                        $("#address-error").text(e.responseJSON.address[0]);
                        $("#address-error").css('display' , 'block');
                    }
                    if(e.responseJSON.postal_code) {
                        $("#postal_code-error").text(e.responseJSON.postal_code[0]);
                        $("#postal_code-error").css('display' , 'block');
                    }
                    alert('لطفا موارد گفته شده را تصحیح نموده و مجدد تلاش فرمایید')
                }
            });
        });
        --}}{{--end of add new address--}}{{--
    </script>



    --}}{{--Edit and delete address by admin / modal in modal--}}{{--
    <script>
        //bad az inke address haye yek karbar dar modal namayesh dade shod - ba zadane dokme virayesh in function farakhani mishavad
        function editaddress(id)
        {
            $("#shortModal").modal('hide');
            $("#register_wait").show();
            var url = "{{route('admin.report.users.editAddress')}}";
            var data = id;
            var type = "POST";
            $.get({
                data:{id:data},
                url:url,
                type:type,
                success:function (address)
                {
                    $("#modal-edit-address").find("#address_id").val(address.id);
                    $("#modal-edit-address").find("#old_full_name").val(address.name);
                    $("#modal-edit-address").find("#old_phone_number").val(address.mobile_number);
                    $("#modal-edit-address").find("#old_province").val(address.province_id);
                    $("#modal-edit-address").find("#old_address").val(address.address);
                    $("#modal-edit-address").find("#old_zone").val(address.postal_code);
                    $.each(address.cities , function(city){
                        $("#modal-edit-address").find("#old_city").append("<option value="+address.cities[city].id+">"+address.cities[city].name+"</option>");
                    });
                    $("#modal-edit-address").find("#old_city").val(address.city_id);
                    $("#register_wait").hide();
                    $("#modal-edit-address").modal('show');
                    console.log(address);
                },
                error:function(e)
                {
                    $("#register_wait").hide();
                    console.log('error in getting single address');
                }
            });
        }
    </script>
    <script>
        //delete address
        function delAddress(id)
        {
            if(confirm('آیا مطمئن هستید؟'))
            {
                var data = id;
                var url = "{{route('admin.report.users.delAddress')}}";
                var type = "POST";
                $.get({
                    data:{id:data},
                    type:type,
                    url:url,
                    success:function (data)
                    {
                        console.log(data);
                        alert('با موفقیت حذف گردید');
                        $("#shortModal").modal('hide');
                    },
                    error:function (e)
                    {
                        alert('error in delete address');
                    }
                });
            }
        }
    </script>
    --}}{{--End of edit and delete address by admin / modal in modal--}}{{--

    --}}{{--update address--}}{{--
    <script>
        $("#update-form").on('submit' , function(e){
            e.preventDefault();
            $("#modal-edit-address").find("#old_address-error").css('display' , 'none');
            $("#modal-edit-address").find("#old_full_name-error").css('display' , 'none');
            $("#modal-edit-address").find("#old_phone_number-error").css('display' , 'none');
            $("#modal-edit-address").find("#old_zone-error").css('display' , 'none');
            var data = $(this).serialize();
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            console.log(data);
            $.ajax({
                data:data,
                url:url,
                type:type,
                dataTy:'JSON',
                success:function(address)
                {
                    alert('آدرس تغییر یافت');
                    $("#modal-edit-address").modal('hide');
                },
                error:function(e)
                {
                    console.log('sth is wrong in update address');
                    console.log(e.responseJSON);
                    if(typeof(e.responseJSON.address) !== "undefined") {
                        $("#modal-edit-address").find("#old_address-error").text(e.responseJSON.address[0]);
                        $("#modal-edit-address").find("#old_address-error").css('display' , 'block');
                    }
                    if(typeof(e.responseJSON.old_full_name) !== "undefined") {
                        $("#modal-edit-address").find("#old_full_name-error").text(e.responseJSON.old_full_name[0]);
                        $("#modal-edit-address").find("#old_full_name-error").css('display' , 'block');
                    }
                    if(typeof(e.responseJSON.phone_number) !== "undefined") {
                        $("#modal-edit-address").find("#old_phone_number-error").text(e.responseJSON.phone_number[0]);
                        $("#modal-edit-address").find("#old_phone_number-error").css('display' , 'block');
                    }
                    if(typeof(e.responseJSON.zone) !== "undefined") {
                        $("#modal-edit-address").find("#old_zone-error").text(e.responseJSON.zone[0]);
                        $("#modal-edit-address").find("#old_zone-error").css('display' , 'block');
                    }
                }
            });
        });
    </script>
    --}}{{--end of update address--}}
@stop