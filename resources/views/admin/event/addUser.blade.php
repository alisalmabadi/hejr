@extends('layouts.admin_master_full')

@section('content-header')
    <style type="text/css">
        /*hover styles*/
        .user{
            opacity: 1;
            transition: .8s ease;
        }
        .userHover{
            opacity: 0;
            transition: .8s ease;
        }
        .user-container:hover .user {
            opacity: 0.3;
        }

        .user-container:hover .userHover {
            opacity: 1;
        }
        /*End of hover styles*/

        .owl-prev {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 30%;
            margin-left: -20px;
            display: block !important;
            border:0px solid black;
        }

        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 30%;
            right: -25px;
            margin-right: 100%;
            display: block !important;
            border:0px solid black;
        }
        .owl-prev i, .owl-next i {transform : scale(6,6); color: #ccc;}
    </style>


    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />

    <section class="content-header">
        <div class="pull-left">
            @if(!empty($event))
                <a href="{{route('admin.event.addUser.showResult')}}" data-toggle="tooltip" title="" class="btn btn-primary btn-showResult" data-original-title="افزودن"><i class="fa fa-save"></i></a>
            @endif
        </div>
        <h1>
            رویداد
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>ثبت نام کاربر</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست رویدادها</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    @if(empty($event))
                        <form action="{{route('admin.event.addUser.selectEvent')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-2">انتخاب رویداد</label>
                                <div class="col-md-4">
                                    <select class="form-control selectEvent" name="event">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($events as $event)
                                            <option value="{{$event->id}}">
                                                {{$event->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label style="color: red;">{{$errors->first('event')}}</label>
                                </div>
                                <label class="col-md-2">انتخاب هسته</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="core">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($cores as $core)
                                            <option value="{{$core->id}}">
                                                {{$core->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label style="color: red;">{{$errors->first('core')}}</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="submit" value="ثبت" class="btn btn-default form-control">
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="form-group">
                            <label class="col-md-12 form-control label label-info" style="font-size: 20px;">انتخاب کاربر برای رویداد {{$event->name}} و کاربران هسته {{$core->name}}</label>
                            <input type="hidden" name="selectEvent" class="selectEvent" value="{{$event->id}}">
                        </div>
                        <hr/>
                        <div class="form-group">
                            <hr/>
                            <label class="col-md-8 pull-right label-control">انتخاب کاربر برای ثبت نام در رویداد</label>
                            <div class="col-md-3 pull-left">
                                <form action="{{route('admin.event.addUser.selectAll')}}" method="post">
                                    {{csrf_field()}}
                                    <select name="user_ids[]" multiple="multiple" style="display: none;">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" @if($user->added != $event->id) selected @endif></option>
                                        @endforeach
                                        <input type="hidden" name="event_id" value="{{$event->id}}">
                                    </select>
                                    <button class="btn btn-info form-control">انتخاب همه</button>
                                </form>
                            </div>
                            <hr/>
                            <div class="col-md-12">
                                <div id="owl-example" class="owl-carousel">
                                    @foreach($users as $user)
                                        <div class="col-md-12 user-container user-container_{{$user->id}}" style="text-align: center;border: 1px solid #e4e6e7;border-radius: 20px;">
                                            {{-- asli --}}
                                            <div class="m-widget_body-item user user_{{$user->id}}">
                                                <div class="m-widget_body-item-pic">
                                                    <img src="{{asset('images/user2-160x160.jpg')}}" title="" style="border-radius: 200px;">
                                                </div>
                                                <div class="m-widget_body-item-desc">
                                                    <span>{{$user->name .' '. $user->lastname}}</span><br>
                                                    <span>{{$user->username}}</span>
                                                </div>
                                            </div>
                                            {{-- hover --}}
                                            @if($user->added == $event->id)
                                                <div class="m-widget_body-item userHover_added userHover_added_{{$user->id}}">
                                                    <div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;">
                                                        <img src="{{asset('images/tik.png')}}">
                                                        <label class="label-info" style="position: absolute;left: 0;top: 34px;transform: rotate(-36deg);">
                                                            این کاربر اد شده است
                                                        </label>
                                                        <button type="button" class="btn btn-remove" data-id="{{$user->id}}" style="position: absolute;right: 0;bottom: 8px;border-radius: 50px;"><i class="fa fa-remove"></i></button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="m-widget_body-item userHover userHover_{{$user->id}}">
                                                    <div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;">
                                                        <span>ایمیل: {{$user->email}}</span>
                                                        <hr/>
                                                        <span>آدرس: </span>
                                                        @if(!empty($user->provinces && $user->cities && $user->address))
                                                            <span>{{$user->provinces->name .' '.$user->cities->name. ' '. $user->address}}</span>
                                                        @endif
                                                        <button class="btn btn-success form-control btn-registerUser" data-id="{{$user->id}}" style="margin-bottom: -78%;border-radius: 20px;">ثبت کاربر</button>
                                                    </div>
                                                </div>
                                            @endif
                                            {{-- gif --}}
                                            <div class="m-widget_body-item userGif userGif_{{$user->id}}" style="display: none;">
                                                <div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;background-color: #ffffffed;">
                                                    <img src="{{asset('gif/35.gif')}}" style="width: 60px;margin-right: 37%;margin-top: 41%;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    ...
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="resultModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>This is a small modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <a href="{{route('admin.event.addUser')}}"><button type="button" class="btn btn-info">تایید</button></a>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
@section('admin-footer')
    {{-- calling owlcarrousel --}}
    <script src="{{asset('vendors/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#owl-example").owlCarousel({
                // Most important owl features
                items : 5,
                touchDrag: true,
                nav:true,
                autoplay:true,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [980,3],
                itemsTablet: [768,2],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                singleItem : true,
                //Basic Speeds
                slideSpeed : 200,
                paginationSpeed : 800,
                rewindSpeed : 1000,
                //Autoplay
                autoPlay : true,
                stopOnHover : true,
                // Navigation
                navigation : true,
                navigationText : ["prev","next"],
                rewindNav : true,
                scrollPerPage : false,
                //Pagination
                pagination : true,
                paginationNumbers: true,
                rtl:true,
                nav:true,
                navText : ['<i class="fa fa-angle-right" aria-hidden="true"></i>','<i class="fa fa-angle-left" aria-hidden="true"></i>']

            });
        });
    </script>
    {{-- end of calling owlcarrousel --}}


    {{-- add User to event --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click' , '.btn-registerUser' , function(){
            var id = $(this).data('id');
            var data = $(".selectEvent").val();
            var url = "{{route('admin.event.addUser.store')}}";
            $(".userGif_"+id).css('display','block');
            $.ajax({
                data:{'user_id':id,'event_id':data},
                url:url,
                type:'POST',
                success:function(data){
                    $(".userHover_"+data.user_id).css('display','none');
                    $(".user-container_"+data.user_id).append('<div class="m-widget_body-item userHover_added userHover_added_'+data.user_id+'"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;"><img src="{{asset('')}}/images/tik.png"><label class="label-info" style="position: absolute;left: 0;top: 34px;transform: rotate(-36deg);">ین کاربر اد شده است</label></div><button type="button" class="btn btn-remove" data-id="'+data.user_id+'" style="position: absolute;right: 0;bottom: 8px;border-radius: 50px;"><i class="fa fa-remove"></i></button></div>');
                    $(".userGif_"+data.user_id).fadeOut("slow");
                },
                error:function(){
                    console.log('error in adding user to event');
                    $(".userGif").css('display','none');
                }
            });
        });
    </script>
    {{-- END OF add User to event --}}

    {{-- remove User to event --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click' , '.btn-remove' , function(){
            var id = $(this).data('id');
            var data = $('.selectEvent').val();
            var url = "{{route('admin.event.addUser.remove')}}";
            $(".userGif_"+id).css('display','block');
            $.ajax({
                data:{'user_id':id,'event_id':data},
                url:url,
                type:'POST',
                success:function(data){
                    $(".userHover_added_"+data.user_id).css('display','none');
                    $(".user-container_"+data.user_id).append('<div class="m-widget_body-item userHover userHover_'+data.user_id+'"><div class="m-widget_body-item-pic" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;border-radius: 20px;"><button class="btn btn-success form-control btn-registerUser" data-id="'+data.user_id+'" style="margin-bottom: -78%;border-radius: 20px;">ثبت کاربر</button></div></div>');
                    $(".userGif_"+data.user_id).fadeOut("slow");
                },
                error:function(){
                    console.log('error in removing user to event');
                    $(".userGif").css('display','none');
                }
            });
        });
    </script>
    {{-- END OF remove User to event --}}





    {{--show result--}}
        <script type="text/javascript">
            $(".btn-showResult").on('click',function(e){
                e.preventDefault();
                var event_id = $(".selectEvent").val();
                var url = $(this).attr('href');
                $.ajax({
                    data:{'event_id':event_id},
                    url:url,
                    type:'POST',
                    success:function(data){
                         $("#resultModal").find(".modal-body").html('');
                        $.each(data , function(user){
                            $("#resultModal").find(".modal-body").append('<div class="row" style="border: 1px solid;border-radius: 15px;"><div class="col-md-4"><img src="{{asset('')}}/images/user2-160x160.jpg" style="border-radius: 50px;width: 75px;"></div><div class="col-md-8"><label class="form-control label label-info">'+data[user].name+' '+data[user].lastname+ ' </label><br/><label class="form-control label label-info">'+data[user].nationcode+ ' </label><br/><label class="form-control label label-info">'+data[user].phonenumber+ ' </label></div></div>');
                        });

                        $("#resultModal").modal('show');
                        console.log(data);
                    },
                    error:function(){
                        console.log('error in getting the results');
                    }
                });
            });
       
    </script>
    {{--end of show result--}}

@endsection
