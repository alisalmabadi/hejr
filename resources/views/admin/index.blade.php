@extends('layouts.admin_master_full')

            <!-- Content Header (Page header) -->
            @section('content-header')
            <section class="content-header">
                <h1>
                    داشبورد
                    <small>پنل ادمین</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                    <li class="active">داشبورد</li>
                </ol>
            </section>
            @endsection
            <!-- Main content -->
            @section('content')
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">

                                <h3>{{$data['events_registered_count']}}</h3>

                                <p>کلیه ثبت نام ها</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
{{--
                            <a href="{{route('admin.order.index')}}" class="small-box-footer"> بیشتر<i class="fa fa-arrow-circle-left"></i></a>
--}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">

                                <h3>{{$data['events_count']}}</h3>


                                <p>تعداد رویداد ها</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                           {{-- <a href="{{route('admin.product.index')}}" class="small-box-footer">بیشتر<i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">

                                <h3>{{$data['users_count']}}</h3>


                                <p>کلیه کاربران</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{--<a href="{{route('admin.user.index')}}" class="small-box-footer">بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">

                                <h3>{{$data['cores_count']}}</h3>

                                <p>تعداد هسته ها</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            {{--<a href="{{route('admin.download.index')}}" class="small-box-footer">بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools pull-right">
                                        <span class="label label-danger">{{$data['online_users']}} کاربر آنلاین </span>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <p style="text-align: center">
                                        @if(count($users) == 0) هیچ کاربری آنلاین نیست.@endif
                                    </p>
                                    <ul class="users-list clearfix">

            @foreach($users as $user)
                                        <li>
                                            <img src="{{$user->thumbnail}}" alt="User Image">
                                            <a class="users-list-name" href="#">{{$user->lastname}} {{$user->name}}</a>
                                            <span class="users-list-date">آنلاین</span>
                                        </li>
                @endforeach
                                    </ul>
                                </div>
                                <div class="box-footer text-center">
                                    <a href="{{route('admin.user.all')}}" class="uppercase">نمایش تمام کاربران</a>
                                </div>
                            </div>
                    </section>

                </div>
                <!-- /.row (main row) -->

            </section>
            @endsection
            <!-- /.content -->
