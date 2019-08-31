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
                    <section class="col-lg-7 connectedSortable">

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            @endsection
            <!-- /.content -->
