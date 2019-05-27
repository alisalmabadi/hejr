@extends('layouts.app_master')
@section('styles')
    <link rel="stylesheet" href="{{asset('pass/password_strength.css')}}">
    <style>
        .form-control-feedback {
            color: red;
        }
        td{
            text-align:center;
        }
    </style>
@endsection
@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">رویدادها</h3>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            @foreach($events as $event)
            <div class="col-xl-4">
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
                                <img src="{{asset('img//blog/blog1.jpg')}}" alt="">
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
                                    <p>{!! $event->description !!}</p><hr/>
                                    <label>تاریخ دوره</label><br>
                                    <p class="btn btn-secondary m-btn m-btn--icon m-btn--pill">از {{$event->start_dates}} تا {{$event->end_dates}}</p>
                                    <label>تاریخ پایان ثبت نام</label><br>
                                    <p class="btn btn-secondary m-btn m-btn--icon m-btn--pill">{{$event->end_date_sign}}</p>
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
                                <div class="m-widget19__body body2_{{$event->id}}" style="display:none;">
                                    <label>توضیحات</label>
                                    <p>{{$event->long_description}}</p><hr/>
                                    <label>آدرس</label>
                                    <p>{{$event->provinces->name}}, {{$event->cities->name}}, {{$event->address}}</p>
                                </div>
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

@endsection
@section('scripts')
    {{--namayeshe details--}}
    <script>
        $(".btn-read-more").on('click' , function(){
            var id = $(this).data('id');
            if($(".body1_"+id).is(":visible")) {
                $(".body1_" + id).fadeOut("slow");
                $(".body2_" + id).fadeIn("slow");
            }
            else{
                $(".body2_" + id).fadeOut("slow");
                $(".body1_" + id).fadeIn("slow");
            }
        });
    </script>
    {{--end of namayeshe details--}}
@endsection