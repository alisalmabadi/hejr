@extends('layouts.app_master')
@section('styles')
    <link rel="stylesheet" href="{{asset('pass/password_strength.css')}}">
    <style>
        
    </style>

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

    <!-- END: Subheader -->
    <div class="m-content" style="background-color:white;">
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
                            <td> {{$eventUser->user->name .' '. $eventUser->user->lastname}}</td>
                            <td>{{$eventUser->user->nationcode or 'ثبت نشده'}}</td>
                            <td>{{$eventUser->user->phonenumber}}</td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
        <div class="row">
             <label class="col-md-2">اطلاعات رویداد</label>
             <div class="col-md-10">
                <table class="table table-bordered table-condenced">
                    <thead>
                        <th>نام</th>
                        <th>توضیحات</th>
                        <th>قیمت</th>
                    </thead>
                    <tbody>
                        <tr>
                           <td>{{$eventUser->event->name}}</td>
                            <td>{!! $eventUser->event->long_description !!}</td>
                            <td>{{$eventUser->event->price}}</td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
        {{--pay button--}}
        <div class="col-md-12 col-sm-12">
        <button class="btn btn-success form-control">پرداخت</button>
        </div>
        {{--end of pay button--}}
    </div>

@endsection
@section('scripts')

@endsection