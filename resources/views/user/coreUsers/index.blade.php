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
                            <span class="m-nav__link-text">لیست کاربران</span>
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
            <a class="btn btn-primary pull-left" href="{{route('user.coreUsers.create')}}"><i class="fa fa-plus"></i></a>
        </div>
    </div>

    <!-- END: Subheader -->

    <div class="m-content">
        <div class="row" style="background-color:white;">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <td class="text-center">#</td>
                    <td class="text-center">نام و نام خانوادگی</td>
                    <td class="text-center">ایمیل</td>
                    <td class="text-center">شماره تلفن</td>
                    <td class="text-center">دانشگاه</td>
                    <td class="text-center">عملیات</td>
                </tr>
                </thead>
                <tbody>
                @if(!empty($users))
                @php($index = 1)
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{$index}}</td>
                        <td class="text-center"> {{$user->name}} {{$user->lastname}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">{{$user->phonenumber}}</td>
                        <td class="text-center">
                            @if(!empty($user->university->name))
                                {{$user->university->name}}
                            @else
                                .........
                            @endif
                        </td>

                        <td class="text-center"><a class="btn btn-primary btn-show-coreUser" href="{{route('user.coreUsers.show',$user)}}">جزئیات</a>
                        <a class="btn btn-info" href="{{route('user.coreUsers.edit',$user)}}">ویرایش</a> </td>
                    </tr>
                    @php($index+=1)
                    @endforeach
                @endif
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                        <label>نام و نام خانوادگی</label>
                            <input type="text" id="modal_name" readonly class="form-control">
                        </div>
                        <div class="col-12">
                        <label>ایمیل</label>
                            <input type="text" id="modal_email" readonly class="form-control">
                        </div>
                        <div class="col-12">
                        <label>نام کاربری</label>
                            <input type="text" id="modal_username" readonly class="form-control">
                        </div>
                        <div class="col-12">
                        <label>شماره تلفن</label>
                            <input type="text" id="modal_phonenumber" readonly class="form-control">
                        </div>
                        <div class="col-12">
                        <label>آدرس</label>
                            <input type="text" id="modal_address" readonly class="form-control">
                        </div>
                        <div class="col-12">
                        <label>نام پدر</label>
                            <input type="text" id="modal_fathername" readonly class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
        {{-- show detail modal --}}
        <script>
            $(".btn-show-coreUser").on('click', function(e){
                e.preventDefault();

                $("#myModal").find("#modal_name").val('');
                $("#myModal").find("#modal_email").val('');
                $("#myModal").find("#modal_username").val('');
                $("#myModal").find("#modal_phonenumber").val('');
                $("#myModal").find("#modal_address").val('');
                $("#myModal").find("#modal_fathername").val('');

                var url = $(this).attr('href');
                $.ajax({
                    data:'',
                    url:url,
                    type:"GET",
                    success:function(user){
                        $("#myModal").find("#modal_name").val(user.name + ' ' + user.lastname);
                        $("#myModal").find("#modal_email").val(user.email);
                        $("#myModal").find("#modal_username").val(user.username);
                        $("#myModal").find("#modal_phonenumber").val(user.phonenumber);
                        $("#myModal").find("#modal_address").val(user.address);
                        $("#myModal").find("#modal_fathername").val(user.fathername);

                        $("#myModal").modal("show");
                    },
                    error:function(){
                        console.log('error in coreUser.show');
                    }
                });
            });
        </script>
        {{-- end of show_detail_modal--}}
@endsection