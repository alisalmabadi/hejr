@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.event.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.event.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
            رویداد
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>همه رویدادها</li>
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
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">شماره</td>
                            <td class="text-center"> نام</td>
                            <td class="text-center">توضیحات</td>
                      {{--      <td class="text-center">توضیح طولانی</td>--}}
                            <td class="text-center">تاریخ شروع</td>
                            <td class="text-center">تاریخ پایان</td>
                            <td class="text-center">تاریخ پایان ثبت نام</td>
                            <td class="text-center">قیمت</td>
                            <td class="text-center">ظرفیت</td>
                            <td class="text-center">موضوع رویداد</td>
                            <td class="text-center">نوع رویداد</td>
                            <td class="text-center">وضعیت رویداد</td>
                            <td class="text-center">استان</td>
                            <td class="text-center">شهر</td>
                            <td class="text-center">آدرس</td>
{{--
                            <td class="text-center">Operator</td>
--}}
                            <td class="text-center">هسته اصلی</td>
{{--
                            <td class="text-center">اطلاعات</td>
--}}
                            <td class="text-center">تصویر</td>
                            <td class="text-center">عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($events))
                            @foreach($events as $event)
                                <tr>
                                    <td class="text-center iranyekan"> {{$event->id}} </td>
                                    <td class="text-center">{{$event->name}}</td>
                                    <td class="text-center">{!! $event->description !!}</td>
                                 {{--   <td class="text-center">{!! $event->longdescription !!}</td>--}}
                                    <td class="text-center">{{-- {{$event->start_dates}} --}}</td>
                                    <td class="text-center">{{-- {{$event->end_dates}} --}}</td>
                                    <td class="text-center">{{-- {{$event->end_date_sign}} --}}</td>
                                    <td class="text-center">{{$event->price}}</td>
                                    <td class="text-center">{{$event->capacity}}</td>
                                    <td class="text-center">{{$event->event_subject->name}}</td>
                                    <td class="text-center">{{$event->event_type->name}}</td>
                                    <td class="text-center">{{$event->event_status->name}}</td>
                                    <td class="text-center">{{$event->provinces->name}}</td>
                                    <td class="text-center">{{$event->cities->name}}</td>
                                    <td class="text-center">{{$event->address}}</td>
                               {{--     <td class="text-center">{{$event->address_point}}</td>--}}
                              {{--      <td class="text-center">{{$event->operator->name}}</td>--}}
                                    <td class="text-center">{{$event->center_core->name}}</td>
{{--
                                    <td class="text-center">{{$event->information}}</td>
--}}
                                    <td class="text-center">
                                        @if(count($event->images) > 0)
                                            <img src="{{asset($event->images[0]->image_path)}}" style="width: 200px;">
                                        @else
                                            <label class="label label-danger">عکسی انتخاب نشده</label>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('admin.event.edit' , $event->id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                        <a href="{{route('admin.event.delete',$event)}}" onClick="return confirm('مطمئن هستید؟')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

@endsection

