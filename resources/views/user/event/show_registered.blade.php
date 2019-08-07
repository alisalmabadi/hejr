@extends('layouts.app_master')
@section('styles')
    <link rel="stylesheet" href="{{asset('pass/password_strength.css')}}">
    <link rel="stylesheet" href="{{asset('css/leaflet.css')}}"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>

    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="margin-right-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">رویداد ثبت نام شده</h3>
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
                            <span class="m-nav__link-text">رویداد ثبت نام شده</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    @if (Session::has('failPay'))
        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
            <div class="m-alert__icon">
                <i class="flaticon-exclamation-1"></i>
                <span></span>
            </div>
            <div class="m-alert__text">
                <strong>متاسفیم! </strong> {{Session::get('failPay')}}
            </div>
            <div class="m-alert__close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>

    @endif
    <!-- END: Subheader -->
    <div class="m-content" style="background-color:white;">
        <div class="row">
             <div class="col-md-12">
                     {{--namayesh e marhaleryi e vaziat e sefaresh--}}
                     <div class="register-status">
          @if($eventUser->status == 1)
                @if($eventUser->payment()->exists())
                    @if($eventUser->payment->state==0)
                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) ثبت شده و پرداخت شما ناموفق بوده است،لطفا دوباره برای پرداخت اقدام کنید.
                                         </div>
                                     </div>

                                 @else
                    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                    <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                    </div>
                    <div class="m-alert__text">
<strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) ثبت شده است و پرداخت شما موفق آمیز بوده،ولی هنوز تایید نشده است،منتظر باشید. </div>
                    </div>
                                 @endif
                             @else
                                 <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                     <div class="m-alert__icon">
                                         <i class="la la-warning"></i>
                                     </div>
                                     <div class="m-alert__text">
                                         <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) ثبت شده است ولی پرداخت نشده و تایید نشده میباشد.</div>
                                 </div>

                             @endif

           @elseif($eventUser->status == 2)
                  @if($eventUser->payment()->exists())
                   @if($eventUser->payment->state==0)
                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) تایید شده و پرداخت شما ناموفق بوده است،لطفا دوباره برای پرداخت اقدام کنید.</div>
                                     </div>

                                 @else

                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) تایید شده است و پرداخت شما موفق آمیز بوده است و به زودی ثبت نهایی میشود.</div>
                                     </div>
                                 @endif
                             @else
                                 <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                     <div class="m-alert__icon">
                                         <i class="la la-warning"></i>
                                     </div>
                                     <div class="m-alert__text">
                                         <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) تایید شده است ولی پرداخت انجام نشده است.</div>
                                 </div>


                             @endif
                         @elseif($eventUser->status == 3)
                             @if($eventUser->payment()->exists())
                                 @if($eventUser->payment()->state==0)


                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) تکمیل شده و پرداخت شما ناموفق بوده است،لطفا دوباره برای پرداخت اقدام کنید.</div>
                                     </div>


                                 @else

                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong> ثبت نام شما (شماره LY-{{$eventUser->id}}) تکمیل شده و پرداخت شما موفق آمیز بوده است.</div>
                                     </div>

                                 @endif
                             @else

                                 <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                     <div class="m-alert__icon">
                                         <i class="la la-warning"></i>
                                     </div>
                                     <div class="m-alert__text">
                                         <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) تکمیل شده است ولی پرداخت نشده،لطفا سریعا پرداخت کنید.</div>
                                 </div>

                             @endif

                         @elseif($eventUser->status == 4)
                             @if($eventUser->payment()->exists())
                                 @if($eventUser->payment->state==0)

                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) لغو شده و پرداخت شما نیز ناموفق بوده است،لطفا دوباره برای پرداخت اقدام کنید.</div>
                                     </div>

                                 @else
                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) ناموفق بوده ولی پرداخت شما موفق آمیز است.</div>
                                     </div>


                                 @endif
                             @else
                                 <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                     <div class="m-alert__icon">
                                         <i class="la la-warning"></i>
                                     </div>
                                     <div class="m-alert__text">
                                         <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) ناموفق بوده و پرداخت نشده،لطفا سریعا پرداخت کنید.</div>
                                 </div>


                             @endif
                         @elseif($eventUser->status == 5)
                             @if($eventUser->payment()->exists())
                                 @if($eventUser->payment->state==0)

                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) استرداد شده و پرداخت شما ناموفق بوده است و دیگر امکان پرداخت وجود ندارد.</div>
                                     </div>
                                 @else

                                     <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                         <div class="m-alert__icon">
                                             <i class="la la-warning"></i>
                                         </div>
                                         <div class="m-alert__text">
                                             <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) استرداد شده و پرداخت شما موفق آمیز بوده و به زودی وجه ثبت نام باز گردانده میشود. </div>
                                     </div>


                                 @endif
                             @else

                                 <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                                     <div class="m-alert__icon">
                                         <i class="la la-warning"></i>
                                     </div>
                                     <div class="m-alert__text">
                                         <strong class="titlealert">وضعیت ثبت نام: </strong>ثبت نام شما (شماره LY-{{$eventUser->id}}) استرداد شده و پرداختی از سوی شما صورت نگرفته است. </div>
                                 </div>

                             @endif
                         @endif
                     </div>


                     {{--end progress bar step order <div> --}}


                <table class="table table-bordered table-condenced">
                    <thead>
                        <th class="d-none d-sm-table-cell">نام</th>
                        <th class="d-none d-sm-table-cell">کد ملی</th>
                        <th class="d-none d-sm-table-cell">شماره تلفن</th>
                        <th>وضعیت پرداخت</th>
                        <th>وضعیت ثبت نام</th>

                    </thead>
                    <tbody>
                        <tr>
    <td class="d-none d-sm-table-cell"> {{$eventUser->user->name .' '. $eventUser->user->lastname}}</td>
                    <td class="d-none d-sm-table-cell">{{$eventUser->user->nationcode or 'ثبت نشده'}}</td>
                            <td class="d-none d-sm-table-cell">{{$eventUser->user->phonenumber}}</td>
  <td>

      @if($eventUser->payment()->exists()) @if($eventUser->payment->state == 1) <button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">پرداخت شده</button> @else <button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning">پرداخت ناموفق</button> @endif @else <button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning">پرداخت نشده</button> @endif</td>

                            <td>
                                <button type="button" class="{{$eventUser->userstatus->class}}">{{$eventUser->userstatus->name}}</button>
                            </td>

                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-condenced">
                    <thead>
                    <tr>
                       <th colspan="5" class="centertextalign">نام: {{$eventUser->event->name}}  </th>
                    </tr>
                    <tr>
                    <th>تاریخ شروع</th>
                    <th>تاریخ پایان</th>
                    <th>تاریخ پایان ثبت نام</th>
                    <th>ظرفیت</th>
                    <th>قیمت</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$eventUser->event->start_dates}}</td>
                        <td>{{$eventUser->event->end_dates}}</td>

                        <td>{{$eventUser->event->end_date_sign}}</td>
                        <td> {{$eventUser->event->capacity}} / {{$eventUser->event->fulled_capacity}} </td>

                        <td>  {{number_format($eventUser->event->price)}}  تومان </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-condenced">
                    <thead>



                        <td>موضوع </td>
                        <td> نوع </td>
                        <td>آدرس برگزاری </td>
                        <td>هسته برگزار کننده </td>
                        <td>وضعیت </td>
                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <button type="button" class="btn m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">                            {{$eventUser->event->event_subject->name}}
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">{{$eventUser->event->event_type->name}}</button>

                        </td>
                        <td>{{$eventUser->event->address}} @if($eventUser->event->address_point != null)<div class="showonmap btn btn-secondary m-btn--wide" data-target="#myModal" data-toggle="modal"> نمایش روی نقشه <i class="flaticon-map-location"></i></div>  @endif</td>
                        <td>{{$eventUser->event->center_core->name}}</td>
                        <td>
            @if($eventUser->event->event_status->id == 1)
                            <button type="button" class="btn m-btn--pill m-btn--air         btn-outline-success">{{$eventUser->event->event_status->name}}</button>
            @else
                                <button type="button" class="btn m-btn--pill m-btn--air         btn-outline-danger">{{$eventUser->event->event_status->name}}</button>

            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-condenced">
           <thead>
           <th class="centertextalign">
               توضیحات رویداد
           </th>
           </thead>
                    <tbody>
            <tr>
                <td>
                {!!  $eventUser->event->long_description !!}
                 </td>
            </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <form action="{{route('user.payment.request')}}" method="post" id="gateway">
            <input class="event_user_id" type="hidden" value="{{$eventUser->id}}" name="event_user_id">
        {{csrf_field()}}
        </form>

        {{--pay button--}}
        @if($eventUser->status==5 && $eventUser->payment()->exists())
            <div class="col-md-12 col-sm-12 centertextalign">

                <a href="#" class="btn btn-warning m-btn m-btn--icon m-btn--wide notallowed">
				<span>
			<i class="fa flaticon-warning"></i>
                    <span>درخواست در وضعیت استرداد شده است،نمیتوانید پرداخت کنید!</span>
			</span>
                </a>
                {{--end of pay button--}}
            </div>


        @elseif($eventUser->payment()->exists())

            @if($eventUser->payment->state == 0 && $eventUser->status!=5)
                <div class="col-md-12 col-sm-12 centertextalign">

                    <a href="#" class="btn btn-success m-btn m-btn--icon m-btn--wide payment">
				<span>
			<i class="fa flaticon-coins"></i>
                    <span>تلاشش مجدد برای پرداخت</span>
			</span>
                    </a>
                    {{--end of pay button--}}
                </div>
            @endif
        @else
            <div class="col-md-12 col-sm-12 centertextalign">

                <a href="#" class="btn btn-success m-btn m-btn--icon m-btn--wide payment">
				<span>
			<i class="fa flaticon-coins"></i>
                    <span>پرداخت</span>
			</span>
                </a>
                {{--end of pay button--}}
            </div>
        @endif
    </div>



    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <input type="hidden" value="" class="event_id">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="float: right;margin-right: 0;border: 1px solid;border-radius: 100%;background: #16171f;color: white;">&times;</button>
                    <h4 class="modal-title" style="text-align: center;float: none;margin: 0 auto;">محل برگزاری رویداد {{$eventUser->event->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">قیمت
                        <div class="col-md-12 col-lg-12">
                            <div class="col-md-12 col-lg-12 firstPlace">
                                <div class="leaflet-map">
                                    <div class="row map_place" id="map_place" style="height: 226px;position: relative;outline: none;width: 65%;margin: 0 auto;"></div>

                                </div>                            </div>


                        </div>
                    </div>
                    <hr/>

                </div>
                <div class="modal-footer">
                    <div class="addressevent">
                   <button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">آدرس محل برگزاری : </button>
                    &nbsp;&nbsp;&nbsp;
                    {{$eventUser->event->address}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/leaflet.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        $('.payment').click(function(e){
            e.preventDefault();
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'primary',
                message: 'در حال انتقال به درگاه'
            });

            setTimeout(function() {
                mApp.unblockPage();
                $('#gateway').submit();
            }, 2000);
        });

        $('.notallowed').click(function (e) {
            e.preventDefault();
        });
        var address_point = <?=$eventUser->event->address_point ?>;
        if(address_point !=null ){
            map = L.map('map_place');
            var interval = setInterval(function () {
                map.invalidateSize();
            },500);
            map.setView(L.latLng(address_point), 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            setTimeout(function () {
                L.marker(address_point).addTo(map)
                    .bindPopup(' محل برگزاری ')
                    .openPopup();
            },2000);
        }

    </script>
@endsection