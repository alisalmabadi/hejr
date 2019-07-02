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
            <div class="mr-auto">
                <h3 class="m-subheader__title ">رویداد های شما</h3>
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
                            <td>{{$user->name .' '. $user->lastname}}</td>
                            <td>{{$user->nationcode}}</td>
                            <td>{{$user->phonenumber}}</td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
        <div class="row">
            @foreach($events as $event)
             <label class="col-md-2">اطلاعات رویداد {{$event->name}}</label>
             <div class="col-md-10">
                <table class="table table-bordered table-condenced">
                    <thead>
                        <th>نام</th>
                        <th>توضیحات</th>
                        <th>قیمت</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$event->name}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->price}}</td>
                        </tr>
                    </tbody>
                </table>
             </div>
             {{--pay button--}}
            <div class="col-md-12 col-sm-12">
            <button class="btn btn-success form-control">پرداخت</button>
            </div>
            {{--end of pay button--}}
             @endforeach
        </div>
    </div>

@endsection
@section('scripts')

@endsection