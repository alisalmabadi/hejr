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
                <h3 class="m-subheader__title m-subheader__title--separator">تمامی رویدادها</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">رویداد ها</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">تمامی رویدادها</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- END: Subheader -->

    <div class="m-content">
        <div class="row">

             <div id="owl-example" class="owl-carousel">
                @foreach($events as $event)
                <div class="col-xl-12 col-md-12">
                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-action">
                                    <button type="button" class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning">{{$event->event_status->name}}</button>

                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget19">
                                <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                                    <img class="image_{{$event->id}}" src="{{asset('img//blog/blog1.jpg')}}" alt="">
                                    <h3 class="m-widget19__title m--font-light">
                                        {{$event->name}}
                                    </h3>
                                    <div class="m-widget19__shadow"></div>
                                </div>
                                <div class="m-widget19__content">
                                    <div class="m-widget19__header">
                                        <div class="m-widget19__user-img">
                                            <img class="m-widget19__img" src="{{asset('img/icons/warning.svg')}}" alt="">
                                        </div>
                                        <div class="m-widget19__info">

    														<span class="m-widget19__username">
    															{{$event->center_core->name}}
    														</span><br>
                                            <span class="m-widget19__time">
    															قیمت {{number_format($event->price)}}
                                                تومان
    														</span>
                                        </div>
                                        <div class="m-widget19__stats">
    														<span class="m-widget19__number m--font-brand">{{$event->capacity}}</span>
                                            <span class="m-widget19__comment">
    															ظرفیت
    				</span>
                                        </div>
                                    </div>
                                    {{--body1 place--}}
                                    <div class="m-widget19__body body1_{{$event->id}} text-center" style="display:block;">
                                        <p>{!! str_limit($event->description,200,'...') !!}</p><hr/>
                                        <label>تاریخ دوره</label><br>
                                        {{--<p class="btn btn-secondary m-btn m-btn--icon m-btn--pill">از {{$event->start_dates}} تا {{$event->end_dates}}</p>
                                        <label>تاریخ پایان ثبت نام</label><br>
                                        <p class="btn btn-secondary m-btn m-btn--icon m-btn--pill">{{$event->end_date_sign}}</p>--}}
                                        <br/>
                                        <hr/>
                                        <p>موضوع دوره:
      <button class="btn m-btn m-btn--gradient-from-info m-btn--gradient-to-accent" type="btn">                                      {{$event->event_subject->name}}
      </button>
                                        </p>
                                        <p class="text-center">نوع دوره:
         <button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">                                   {{$event->event_type->name}}
         </button>
                                        </p>
                                      {{--  <p>وضعیت دوره: {{$event->event_status->name}}</p>--}}
                                        <hr/>
                                        <p>آدرس: {{$event->provinces->name}} - {{$event->cities->name}} ...</p>
                                    </div>
                                    {{--end of body1 place--}}

                                    {{--body2 place--}}
                                  {{--  <div class="m-widget19__body body2_{{$event->id}}" style="display:none;">
                                        <label>توضیحات</label>
                                        <p>{{$event->long_description}}</p><hr/>
                                        <label>آدرس</label>
                                        <p>{{$event->provinces->name}}, {{$event->cities->name}}, {{$event->address}}</p>
                                    </div>--}}
                                    {{--end of body2 place--}}

                                </div>
                                <div class="m-widget19__action">
                                    <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom btn-read-more" data-id="{{$event->id}}">جزئیات بیشتر</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Blog-->
                </div>

                @endforeach
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <input type="hidden" value="" class="event_id">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">توضیحات رویداد {{$event->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="col-md-12 col-lg-12 firstPlace">
                                tozihate 1
                            </div>
                            <div class="col-md-12 col-lg-12 secondPlace">
                                tozihate 2
                            </div>
                            <div class="col-md-12 col-lg-12 thirdPlace">
                                tozihate 3
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 imagePlace">
                            <img class="modalImage" style="width: 100%;" src="{{asset('images/tik.png')}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                    <button type="button" data-event_id="" class="btn btn-success btn-success-modal">ثبت نام</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    {{-- calling owlcarrousel --}}
    <script src="{{asset('vendors/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() { 
            $("#owl-example").owlCarousel({
                // Most important owl features
                items : 3,
                touchDrag: true,
                nav:true,
                autoplay:true,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [980,3],
                itemsTablet: [768,2],
                itemsTabletSmall: false,
                itemsMobile : [479,1],
                singleItem : true,
                rtl:true,
                nav:true,
                navText : ['<i class="fa fa-angle-right" aria-hidden="true"></i>','<i class="fa fa-angle-left" aria-hidden="true"></i>']
            });
        });
    </script>
    {{-- end of calling owlcarrousel --}}


    {{--namayeshe details--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-read-more").on('click' , function(){
            var id = $(this).data('id');
            var url = "{{route('user.event.details')}}";
            $.ajax({
                data:{'event_id':id},
                url:url,
                type:'POST',
                success:function(data){
                    $("#myModal").find(".firstPlace").html(data.long_description);
                    $("#myModal").find(".secondPlace").html(data.province + ' ' + data.city +  ' ' + data.address);
                    $("#myModal").find(".thirdPlace").html(data.address_point);
                    $("#myModal").find(".imagePlace").find(".modalImage").prop('src' , $(".image_"+data.id).prop('src'));
                    $("#myModal").find(".event_id").val(data.id);
                    /*** agar ghablan in rooydad ro register karde bood, nazare dobare oon ro register kone ***/
                    if(data.registered_me == 'YES'){//ghablan register karde too in event
                        $("#myModal").find(".btn-success-modal").css('display','none');
                        var new_url = "{{url('/user/events/registered')}}/"+data.registered_id;
                        $("#myModal").find(".modal-footer").append('<a href="'+new_url+'"><button class="btn btn-primary btn-show-detail">نمایش رویداد</button></a>');
                    }
                    $("#myModal").modal('show');
                },
                error:function(){
                    console.log('error in getting the event details');
                }
            });
        });
    </script>
    {{--end of namayeshe details--}}

    {{-- namayeshe sweet alert e YES va NO --}}
    <script>
        $(".btn-success-modal").click(function(){
            swal.fire({
                title: 'ثبت نام',
                text: "مایل به ثبت نام در این رویداد هستید ؟",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'red',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
                }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var event_id = $(this).closest(".modal-dialog").find(".event_id").val();
                    var url = "{{route('user.events.register')}}";
                    $.ajax({
                        data:{'event_id':event_id},
                        url:url,
                        type:"POST",
                        success:function(data){
                            Swal.fire(
                            'موفقیت آمیز',
                            'ثبت نام با موفقیت انجام شد',
                            'success'
                            )
                            var redirct = "{{url('/user/events/registered')}}/"+data.id;
                            window.location.replace(redirct);
                        },
                        error:function(){
                            console.log('error in registering in event');
                        }
                    });
                }
            });
        });
    </script>
    {{-- end of namayeshe sweet alert e YES va NO --}}

    {{-- pak kardane etelaate ezafi az modal --}}
    <script>
        $('#myModal').on('hidden.bs.modal', function () {
            $("#myModal").find(".btn-success-modal").css('display','block');
            $("#myModal").find(".modal-footer").find(".btn-show-detail").remove();
        });
    </script>
    {{-- end of pak kardane etelaat e ezafi az modal --}}
@endsection