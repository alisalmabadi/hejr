@extends('layouts.app_master')
@section('styles')
    <link rel="stylesheet" href="{{asset('pass/password_strength.css')}}">
    <link href="{{asset('js/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />


@endsection
@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="margin-right-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">رویداد های ثبت نام شده</h3>
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
                            <span class="m-nav__link-text">رویدادهای ثبت نام شده</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content" style="background-color:white;">
{{--
        <div class="row">
            <label class="col-md-2">اطلاعات کاربری</label>
            <div class="col-md-10">
                <table class="table table-bordered table-condenced">
                    <thead>
                    <th>نام</th>
                    <th>کد ملی</th>
                    <th>شماره تلفن</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$user->name .' '. $user->lastname}}</td>
                        <td>{{$user->nationcode or 'ثبت نشده'}}</td>
                        <td>{{$user->phonenumber or 'ثبت نشده'}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
--}}
        <div class="row">

                <div class="col-md-12">
                    <table class="table table-bordered table-condenced table-hover responsive no-wrap" id="m_table_1">
                        <thead>
                        <th>شماره</th>
                        <th>نام</th>
                        <th>توضیحات مختصر</th>
                        <th>شروع</th>
                        <th>پایان</th>
                        <th>قیمت</th>
                        <th>وضعیت ثبت نام</th>
                        <th>وضعیت پرداخت</th>
                        <th>عملیات</th>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->event->name}}</td>
                            <td>{!! str_limit($event->event->description,120,'...') !!}</td>
                                <td>{{$event->event->start_dates}}</td>
                                <td>{{$event->event->end_dates}}</td>

                                <td>{{$event->event->price}}   تومان</td>
                                <td><button type="button" class="{{$event->userstatus->class}}">{{$event->userstatus->name}}</button></td>


                                <td>
   @if($event->payment()->exists())
     @if($event->payment->status == 1)
 <button type="button" class="btn m-btn--pill m-btn--air         btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase">پرداخت شده</button>
      @else
                                            <button type="button" class="btn m-btn--pill m-btn--air         btn-warning m-btn m-btn--custom m-btn--bolder m-btn--uppercase">پرداخت ناموفق</button>                                        @endif

                                    @else

    <button type="button" class="btn m-btn--pill m-btn--air         btn-danger m-btn m-btn--custom m-btn--bolder m-btn--uppercase">پرداخت نشده</button>

                                    @endif

                                </td>
                            <td>
                                <a href="{{route('user.events.registered',$event->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="نمایش">
                                    <i class="la la-eye"></i>
                                </a>

                            </td>
{{--
                                <td nowrap></td>
--}}

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{--pay button--}}
                {{--   <div class="col-md-12 col-sm-12">
                   <button class="btn btn-success form-control">پرداخت</button>
                   </div>--}}
                {{--end of pay button--}}
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

{{--
    <script src="{{asset('js/datatables/extensions/responsive.js')}}" type="text/javascript"></script>
--}}
<script type="text/javascript">
    var table = $('#m_table_1');
    table.DataTable({
        responsive: true,
    });
</script>

@endsection