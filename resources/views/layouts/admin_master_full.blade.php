@extends('layouts.admin_master')

@section('main_content')
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>H</b>R</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Hejr</b>IR</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<i class="fa fa-envelope-o"></i>--}}
                    {{--<span class="label label-success">4</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                    {{--<li class="header">ـــــ</li>--}}
                    {{--<li>--}}
                    {{--<!-- inner menu: contains the actual data -->--}}
                    {{--<ul class="menu">--}}
                    {{--<li><!-- start message -->--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--_______________________--}}
                    {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                    {{--</h4>--}}
                    {{--<p>_________</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<!-- end message -->--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user3-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--Siarco--}}
                    {{--<small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
                    {{--</h4>--}}
                    {{--<p>_______</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user4-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--______--}}
                    {{--<small><i class="fa fa-clock-o"></i> Today</small>--}}
                    {{--</h4>--}}
                    {{--<p>_______</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user3-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--_________--}}
                    {{--<small><i class="fa fa-clock-o"></i> Yesterday</small>--}}
                    {{--</h4>--}}
                    {{--<p>____________________</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<div class="pull-left">--}}
                    {{--<img src="images/user4-128x128.jpg" class="img-circle" alt="User Image">--}}
                    {{--</div>--}}
                    {{--<h4>--}}
                    {{--_____________--}}
                    {{--<small><i class="fa fa-clock-o"></i> 2 days</small>--}}
                    {{--</h4>--}}
                    {{--<p>_________</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="footer"><a href="#">________</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    <!-- Notifications: style can be found in dropdown.less -->
                    {{--<li class="dropdown notifications-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<i class="fa fa-bell-o"></i>--}}
                    {{--<span class="label label-warning">10</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                    {{--<li class="header">_________</li>--}}
                    {{--<li>--}}
                    {{--<!-- inner menu: contains the actual data -->--}}
                    {{--<ul class="menu">--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-users text-aqua"></i> _________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-warning text-yellow"></i> __________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-users text-red"></i> ____________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-shopping-cart text-green"></i> __________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">--}}
                    {{--<i class="fa fa-user text-red"></i> ___________--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="footer"><a href="#">View all</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/images/profile.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"> {{Auth::guard('admin')->user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/images/profile.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{Auth::guard('admin')->user()->name}}
                                        <small>مدیر</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">

                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">ویرایش</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{Route('admin.logout')}}" class="btn btn-default btn-flat">خروج</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/images/profile.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::guard('admin')->user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header text-center"> منوی اصلی</li>
                    <!--dashbord menu-->
                    <li class="@if($current_route_name=='admin.index' ) active @endif"><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> <span>داشبورد</span></a></li>
                    <!--website menu-->
                {{-- <li class="@if(strpos($current_route_name, 'menu.')===6 ||strpos($current_route_name, 'slider.')===6||strpos($current_route_name, 'post.')===6 || strpos($current_route_name, 'page.')===6 || strpos($current_route_name, 'admin.admin.')===0) active @endif treeview">

                     <a href="#">
                         <i class="fa fa-dashboard"></i> <span>وبسایت</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>

                     <ul class="treeview-menu">
                        --}}{{-- <li class="@if(strpos($current_route_name, 'page.')===6) active @endif"><a href="{{route('admin.page.index')}}"><i class="fa fa-image"></i>صفحات</a></li>
                         <li class="@if(strpos($current_route_name, 'menu.')===6) active @endif"><a href="{{route('admin.menu.index')}}"><i class="fa fa-bars"></i>منو</a></li>
                         <li class="@if(strpos($current_route_name, 'slider.')===6) active @endif"><a href="{{route('admin.slider.index')}}"><i class="fa fa-sliders"></i>اسلایدر</a></li>--}}{{--
                         --}}{{--<li class="@if(strpos($current_route_name, 'post.')===6) active @endif"><a href="{{route('admin.post.index')}}"><i class="fa fa-sticky-note"></i>نوشته ها</a></li>--}}{{--
                         --}}{{--<li class="@if(strpos($current_route_name, 'admin.admin.')===0) active @endif"><a href="{{route('admin.admin.index')}}"><i class="fa fa-users"></i>کاربران ادمین</a></li>--}}{{--

                     </ul>
                 </li>--}}

                {{--                  <!--category menu-->

                                  <li class="@if(strpos($current_route_name, 'product.')===6 ||strpos($current_route_name, 'category.')===6||strpos($current_route_name, 'generic.')===6 ||strpos($current_route_name, 'attribute-group.')===6 ||strpos($current_route_name, 'attribute.')===6  ||strpos($current_route_name, 'variety-group.')===6 ||strpos($current_route_name, 'variety.')===6 ||strpos($current_route_name, 'download.')===6 ||strpos($current_route_name, 'download-category.')===6 || strpos($current_route_name, 'admin.seller.')===0 || strpos($current_route_name, 'admin.pluck.')===0 || strpos($current_route_name, 'admin.pluckFont.')===0 || strpos($current_route_name, 'admin.packing.')===0 || strpos($current_route_name, 'admin.material.')===0 || strpos($current_route_name, 'admin.bast.')===0 || strpos($current_route_name, 'admin.lock.')===0) active @endif treeview">

                                      <a href="#">
                                          <i class="fa fa-shopping-bag"></i> <span>فروشگاه</span>
                                          <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>


                                      </a>
                                      <ul class="treeview-menu">
                                          <li class="@if(strpos($current_route_name, 'admin.seller.')===0) active @endif"><a href="{{route('admin.seller.index')}}"><i class="fa fa-users"></i>فروشندگان</a></li>
                                          <li class="@if(strpos($current_route_name, 'admin.company.')===0) active @endif"><a href="{{route('admin.company.index')}}"><i class="fa fa-building-o"></i>سازندگان</a></li>
                                          <li class="@if(strpos($current_route_name, 'category.')===6) active @endif"><a href="{{route('admin.category.index')}}"><i class="fa fa-th"></i>دسته بندی</a></li>
                                          <li class="@if(strpos($current_route_name, 'generic.')===6) active @endif"><a href="{{route('admin.generic.index')}}"><i class="fa fa-th"></i>نام های جنریک</a></li>
                                          <li class="@if(strpos($current_route_name, 'product.')===6) active @endif"><a href="{{route('admin.product.index')}}"><i class="fa fa-product-hunt"></i>کالاها</a></li>
                                          <li class="@if(strpos($current_route_name, 'material.')===6) active @endif"><a href="{{route('admin.material.index')}}"><i class="fa fa-product-hunt"></i>جنس پلاک ها</a></li>
                                          <li class="@if(strpos($current_route_name, 'pluck.')===6) active @endif"><a href="{{route('admin.pluck.index')}}"><i class="fa fa-product-hunt"></i>پلاک ها</a></li>
                                          <li class="@if(strpos($current_route_name, 'pluckFont.')===6) active @endif"><a href="{{route('admin.pluckFont.index')}}"><i class="fa fa-product-hunt"></i>فونت های پلاک</a></li>
                                          <li class="@if(strpos($current_route_name, 'bast.')===6) active @endif"><a href="{{route('admin.bast.index')}}"><i class="fa fa-product-hunt"></i>بست ها</a></li>

                                          <li class="@if(strpos($current_route_name, 'lock.')===6) active @endif"><a href="{{route('admin.lock.index')}}"><i class="fa fa-product-hunt"></i>قفل ها</a></li>

                                          <li class="@if(strpos($current_route_name, 'packing.')===6) active @endif"><a href="{{route('admin.packing.index')}}"><i class="fa fa-product-hunt"></i>بسته بندی ها</a></li>
                                          <li class="@if(strpos($current_route_name, 'attribute-group.')===6) active @endif"><a href="{{route('admin.attribute-group.index')}}"><i class="fa fa-object-group"></i>گروه های خصوصیت</a></li>
                                          <li class="@if(strpos($current_route_name, 'attribute.')===6) active @endif"><a href="{{route('admin.attribute.index')}}"><i class="fa fa-object-ungroup "></i>خصوصیت ها</a></li>

                                          --}}{{--<li class="@if(strpos($current_route_name, 'variety-group.')===6) active @endif"><a href="{{route('admin.variety-group.index')}}"><i class="fa fa-object-group"></i>گروه های تنوع</a></li>--}}{{--
                                          <li class="@if(strpos($current_route_name, 'variety.')===6) active @endif"><a href="{{route('admin.variety.index')}}"><i class="fa fa-object-ungroup "></i>تنوع ها</a></li>
                                          --}}{{--<li class="@if(strpos($current_route_name, 'download.')===6) active @endif"><a href="{{route('admin.download.index')}}"><i class="fa fa-download"></i>دانلود ها</a></li>--}}{{--
                                          --}}{{--<li class="@if(strpos($current_route_name, 'download-category.')===6) active @endif"><a href="{{route('admin.download-category.index')}}"><i class="fa fa-cloud-download"></i>دسته دانلود ها</a></li>--}}{{--

                                      </ul>
                                  </li>
              --}}
                <!--sell menu-->
                    {{--  <li class="@if(strpos($current_route_name, 'delivery.')===6 ||strpos($current_route_name, 'user.')===6 ||
                      strpos($current_route_name, 'order.')===6 ||strpos($current_route_name, 'order-state.')===6 ||
                       strpos($current_route_name, 'payment-method.')===6) active @endif treeview">
                          <a href="#">
                              <i class="fa fa-shopping-cart"></i> <span>فروش</span>
                              <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>

                              </span>
                          </a>
                          <ul class="treeview-menu">

                              <li class="@if(strpos($current_route_name, 'user.')===6) active @endif"><a href="{{route('admin.user.index')}}"><i class="fa fa-users"></i>مشتریان</a></li>
                              <li class="@if(strpos($current_route_name, 'order.')===6) active @endif"><a href="{{route('admin.order.index')}}"><i class="fa fa-first-order"></i>سفارشات</a></li>
                              <li class="@if(strpos($current_route_name, 'order-state.')===6) active @endif"><a href="{{route('admin.order-state.index')}}"><i class="fa fa-flag"></i>وضعیت سفارشات</a></li>
                              <li class="@if(strpos($current_route_name, 'delivery.')===6) active @endif"><a href="{{route('admin.delivery.index')}}"><i class="fa fa-truck"></i>روش های ارسال</a></li>
                              <li class="@if(strpos($current_route_name, 'payment-method.')===6) active @endif"><a href="{{route('admin.payment-method.index')}}"><i class="fa fa-credit-card-alt"></i>روش های پرداخت</a></li>


                          </ul>
                      </li>--}}

                    <li class="@if(strpos($current_route_name, 'core.')===6 ) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>مدیریت هسته ها</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li class="@if(strpos($current_route_name, 'report.order')===6) active @endif"><a href="{{route('admin.report.order')}}"><i class="fa fa-circle-o"></i>سفارشات</a></li>--}}
                            <li class="@if(strpos($current_route_name, 'core.index')===6) active @endif"><a href="{{route('admin.core.index')}}"><i class="fa fa-circle-o"></i>کلیه هسته ها</a></li>
                            <li class="@if(strpos($current_route_name, 'core.create')===6) active @endif"><a href="{{route('admin.core.create')}}"><i class="fa fa-circle-o"></i>افزودن هسته جدید</a></li>

                        </ul>
                    </li>


                    <li class="@if(strpos($current_route_name, 'user.')===6 || strpos($current_route_name, 'grade.')===6 || strpos($current_route_name, 'soldier-service.')===6 || strpos($current_route_name, 'field.')===6 || strpos($current_route_name, 'job.')===6 || strpos($current_route_name, 'area.')===6 || strpos($current_route_name, 'university-type.')===6 || strpos($current_route_name, 'university.')===6) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>مدیریت کاربران</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li class="@if(strpos($current_route_name, 'report.order')===6) active @endif"><a href="{{route('admin.report.order')}}"><i class="fa fa-circle-o"></i>سفارشات</a></li>--}}
                            <li class="@if(strpos($current_route_name, 'user.all')===6) active @endif"><a href="{{route('admin.user.all')}}"><i class="fa fa-users"></i>کلیه کاربران</a></li>

                            <li class="@if(strpos($current_route_name, 'user.create')===6) active @endif"><a href="{{route('admin.user.create')}}"><i class="fa fa-user-plus"></i>افزودن تکی کاربر</a></li>

                            <li class="@if(strpos($current_route_name, 'user.multiple')===6) active @endif"><a href="{{route('admin.user.multiple')}}"><i class="fa fa-user-plus"></i>افزودن گروهی کاربران با اکسل</a></li>

                            <li class="@if(strpos($current_route_name, 'grade.')===6) active @endif"><a href="{{route('admin.grade.index')}}"><i class="fa fa-graduation-cap"></i>وضعیت تحصیلی ها</a></li>

                            <li class="@if(strpos($current_route_name, 'soldier-service.')===6) active @endif"><a href="{{route('admin.soldier-service.index')}}"><i class="fa fa-info-circle"></i>وضعیت نظام وظیفه</a></li>

                            <li class="@if(strpos($current_route_name, 'job.')===6) active @endif"><a href="{{route('admin.job.index')}}"><i class="fa fa-circle-o"></i>شغل ها</a></li>

                            <li class="@if(strpos($current_route_name, 'field.')===6) active @endif"><a href="{{route('admin.field.index')}}"><i class="fa fa-book"></i>رشته ها</a></li>

                            <li class="@if(strpos($current_route_name, 'university.')===6) active @endif"><a href="{{route('admin.university.index')}}"><i class="fa fa-university"></i>دانشگاه ها</a></li>
                            <li class="@if(strpos($current_route_name, 'university-type.')===6) active @endif"><a href="{{route('admin.university-type.index')}}"><i class="fa fa-bookmark"></i>نوع دانشگاه ها</a></li>


                            <li class="@if(strpos($current_route_name, 'area.')===6) active @endif"><a href="{{route('admin.area.index')}}"><i class="fa fa-map-marker"></i>مناطق</a></li>

                            {{--
                            <li class="@if(strpos($current_route_name, 'report.product')===6) active @endif"><a href="{{route('admin.report.product')}}"><i class="fa fa-circle-o"></i>کالاها</a></li>--}}

                        </ul>
                    </li>

                    {{--     <li class="@if(strpos($current_route_name, 'article_category.')===6  || strpos($current_route_name, 'article.')===6)active @endif treeview">
                             <a href="#">
                                 <i class="fa fa-book"></i>
                                 <span>بلاگ</span>
                                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
                             </a>
                             <ul class="treeview-menu">
                                 <li class="@if(strpos($current_route_name, 'article_category')===6) active @endif"><a href="{{route('admin.article_category.index')}}"><i class="fa fa-tags"></i>دسته بلاگ</a></li>
                                 <li class="@if(strpos($current_route_name, 'article')===6 && strpos($current_route_name, 'category')!==14) active @endif"><a href="{{route('admin.article.index')}}"><i class="fa fa-sticky-note"></i> مقالات</a></li>


                             </ul>
                         </li>


                         <li class="@if(strpos($current_route_name, 'ex-request.')===6 || strpos($current_route_name, 'message')===6  || strpos($current_route_name, 'answer.')===6 || strpos($current_route_name, 'comment.')===6)active @endif treeview">
                             <a href="#">
                                 <i class="fa fa-book"></i>
                                 <span>ExChange</span>
                                 <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                             </a>

                             <ul class="treeview-menu">
                                 <li class="@if(strpos($current_route_name, 'ex-request')===6) active @endif"><a href="{{route('admin.ex-request.index')}}"><i class="fa fa-tags"></i>درخواست ها</a></li>
                                 <li class="@if(strpos($current_route_name, 'messages')===6) active @endif"><a href="{{route('admin.message.index')}}"><i class="fa fa-tags"></i>پیام ها</a></li>
                                 <li class="@if(strpos($current_route_name, 'answer')===6 ) active @endif"><a href="{{route('admin.answer.index')}}"><i class="fa fa-sticky-note"></i> پاسخ ها</a></li>
                                 <li class="@if(strpos($current_route_name, 'comment')===6) active @endif"><a href="{{route('admin.comment.index')}}"><i class="fa fa-sticky-note"></i>نظرات</a></li>
                             </ul>

                         </li>--}}
                    <li class="@if(strpos($current_route_name, 'messagetype.')===6 ) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            <span>مدیریت پیام ها</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li class="@if(strpos($current_route_name, 'report.order')===6) active @endif"><a href="{{route('admin.report.order')}}"><i class="fa fa-circle-o"></i>سفارشات</a></li>--}}
                            {{-- <li class="@if(strpos($current_route_name, 'core.index')===6) active @endif"><a href="{{route('admin.core.index')}}"><i class="fa fa-circle-o"></i>کلیه هسته ها</a></li>--}}
                            <li class="@if(strpos($current_route_name, 'messagetype.')===6) active @endif"><a href="{{route('admin.messagetype.index')}}"><i class="fa fa-envelope-open"></i>مدیریت نوع پیام ها</a></li>
                            <li class="@if(strpos($current_route_name, 'message.create')===6) active @endif"><a href="{{route('admin.message.create')}}"><i class="fa fa-paper-plane"></i>ارسال پیام</a></li>
                            <li class="@if(strpos($current_route_name, 'message.index')===6) active @endif"><a href="{{route('admin.message.index')}}"><i class="fa fa-envelope-square"></i>کلیه پیام ها</a></li>
                        </ul>
                    </li>

                    {{--events--}}
                    <li class="@if(strpos($current_route_name, 'eventSubject')===6 || strpos($current_route_name, 'eventType')===6 || strpos($current_route_name,'eventStatus')===6 || strpos($current_route_name,'index')===12|| strpos($current_route_name, 'image')===6) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-handshake-o"></i>
                            <span>مدیریت رویدادها</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'event.index')===6) active @endif"><a href="{{route('admin.event.index')}}"><i class="fa fa-handshake-o"></i>مدیریت رویدادها</a></li>
                            <li class="@if(strpos($current_route_name, 'eventSubject.index')===6) active @endif"><a href="{{route('admin.eventSubject.index')}}"><i class="fa fa-server"></i>مدیریت موضوعات</a></li>
                            <li class="@if(strpos($current_route_name, 'eventType.index')===6) active @endif"><a href="{{route('admin.eventType.index')}}"><i class="fa fa-sitemap"></i>مدیریت نوع ها</a></li>
                            <li class="@if(strpos($current_route_name, 'eventStatus.index')===6) active @endif"><a href="{{route('admin.eventStatus.index')}}"><i class="fa fa-toggle-on"></i>مدیریت وضعیت ها</a></li>
                          {{--  <li class="@if(strpos($current_route_name, 'image')===6) active @endif"><a href="{{route('admin.image.index')}}"><i class="fa fa-picture-o"></i>مدیریت گالری</a></li>--}}
                        </ul>
                    </li>

                    {{--sabte name--}}
                    <li class="@if(strpos($current_route_name, 'event.')===6 ) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span>ثبت نام</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'event.addUser')===6) active @endif"><a href="{{route('admin.event.addUser')}}"><i class="fa fa-plus"></i>ثبت نام کاربر در رویداد</a></li>
                        </ul>
                    </li>

                    {{--event users--}}
                    <li class="@if(strpos($current_route_name, 'eventUser')===6 ) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-signal"></i>
                            <span>گزارشات</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'eventUser.events')===6) active @endif"><a href="{{route('admin.eventUser.events')}}"><i class="fa fa-circle-o"></i>رویدادها</a></li>
                            
                            {{--<li class="@if(strpos($current_route_name, 'eventUser.index')===6) active @endif"><a href="{{route('admin.eventUser.index')}}"><i class="fa fa-circle-o"></i>کاربران ثبت شده در هر رویداد</a></li>--}}
                        </ul>
                    </li>


                    {{--discount--}}
                    <li class="@if(strpos($current_route_name, 'discount.')===6 ) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span>تخفیف</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'discount.create')===6) active @endif"><a href="{{route('admin.discount.create')}}"><i class="fa fa-plus"></i>تخفیف جدید</a></li>
                            <li class="@if(strpos($current_route_name, 'discount.index')===6) active @endif"><a href="{{route('admin.discount.index')}}"><i class="fa fa-circle-o"></i>همه تخفیف ها</a></li>
                        </ul>
                    </li>


                    {{--blog--}}
                    <li class="@if(strpos($current_route_name, 'article_category.')===6 || strpos($current_route_name, 'article.')===6  ) active @endif treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span>بلاگ</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@if(strpos($current_route_name, 'article_category')===6) active @endif"><a href="{{route('admin.article_category.index')}}"><i class="fa fa-plus"></i>دسته بندی</a></li>
                            <li class="@if(strpos($current_route_name, 'article')===6) active @endif"><a href="{{route('admin.article.index')}}"><i class="fa fa-circle-o"></i>مقالات</a></li>
                        </ul>
                    </li>




                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                @include('admin.partials.flash_message')
            </section>

            <!-- Content Header (Page header) -->
        @yield('content-header')

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2018-2019 <a href="#">Hejr</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab" ><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="overflow-y: scroll;max-height: 510px;">
                <!-- Home tab content -->
                <div class="tab-pane fade in active" id="control-sidebar-home-tab">


                    {{--
                                           <form action="{{route('admin.config')}}" method="POST">
                                               {{csrf_field()}}

                                               <div class="form-group">
                                               <label  for="site-name">
                                                   نام سایت
                                               </label>
                                                   <input type="text" name="config_site_name" id="config_site_name" value="{{ \Setting::get('site_name')}}" class="form-control">

                                               </div>
                                               <div class="form-group">
                                                   <label  for="site-name">
                                                       اسلایدر صفحه اصلی
                                                   </label>
                                                   <select  name="config_slider" id="config_slider"  class="form-control">
                                                       <option value="0">انتخاب</option>
                                                        @foreach(\App\Slider::all() as $slider)
                                                           <option value="{{$slider->id}}" @if(\Setting::get('config_slider')==$slider->id) selected @endif>{{ $slider->name }}</option>

                                                       @endforeach

                                                   </select>

                                               </div>
                                               <div class="form-group">
                                                   <label  for="site-name">
                                                       اسلایدر بلاگ
                                                   </label>
                                                   <select  name="config_slider_blog" id="config_slider"  class="form-control">
                                                       <option value="0">انتخاب</option>
                                                       @foreach(\App\Slider::all() as $slider)
                                                           <option value="{{$slider->id}}" @if(\Setting::get('config_slider_blog')==$slider->id) selected @endif>{{ $slider->name }}</option>

                                                       @endforeach

                                                   </select>

                                               </div>

                                               --}}
                    {{--<div class="form-group">--}}{{--

                                                   --}}
                    {{--<label  for="site-name">--}}{{--

                                                      --}}
                    {{--نمایش باکس ها--}}{{--

                                                   --}}
                    {{--</label>--}}{{--

                                                   --}}
                    {{--<select  name="config_boxes" id="config_boxes"  class="form-control">--}}{{--

                                                       --}}
                    {{--<option value="0">عدم نمایش</option>--}}{{--

                                                        --}}
                    {{--@foreach(\App\Menu::all() as $menu)--}}{{--

                                                            --}}
                    {{--@if($menu->parent_id==0)--}}{{--

                                                               --}}
                    {{--<option value="{{$menu->id}}" @if(\Setting::get('config_boxes')==$menu->id) selected @endif>{{ $menu->name }}</option>--}}{{--

                                                            --}}
                    {{--@endif--}}{{--

                                                       --}}
                    {{--@endforeach--}}{{--


                                                   --}}
                    {{--</select>--}}{{--


                                               --}}
                    {{--</div>--}}{{--


                                               <div class="form-group">
                                                   <label  for="site-name">
                                                      شماره تماس 1
                                                   </label>
                                                   <input type="text" name="config_tel1" id="config_tel1" value="{{\Setting::get('site_tel1')}}" class="form-control">

                                               </div>

                                               <div class="form-group">
                                                   <label  for="site-name">
                                                       شماره تماس 2
                                                   </label>
                                                   <input type="text" name="config_tel2" id="config_tel2" value="{{\Setting::get('site_tel2')}}" class="form-control">

                                               </div>

                                               <div class="form-group">
                                                   <label  for="site-name">
                                                      آدرس
                                                   </label>
                                                   <textarea  name="config_address" id="config_address"  class="form-control">{{\Setting::get('site_address')}}</textarea>

                                               </div>
                                               <label for="shop_state">وضعیت فروشگاه</label>
                                               <div class="form-group">
                                               <!-- Rounded switch -->

                                               <label class="switch">
                                                   <input id="shop_state" name="shop_state" type="checkbox" @if(\Setting::get('shop_state')==1) checked @endif>
                                                   <span class="slider round"></span>
                                               </label>
                                               </div>
                                               <button type="submit" class="btn btn-success">ذخیره</button>


                                           </form>
                    --}}



                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    شبکه های اجتماعی
                    {{-- <form  action="{{route('admin.socials')}}" method="post">
                       {{csrf_field()}}
                         @php
                         $srow=0;
                         @endphp
                         <div id="social_content">
                         @foreach(App\Social::all() as $social)
                             <div class="social">

                             <input type="text" name="socials[{{$srow}}][name]"  value="{{$social->name}}" placeholder="نام" class="form-control">
                             <input type="text" name="socials[{{$srow}}][url]" placeholder="لینک"  value="{{$social->url}}" class="form-control">
                             <div class="ImageManager">
                                 <img src="{{route('media',$social->image_id)}}" class="imageManagerImage" width="60" style="padding: 5px;" height="60"><br>
                                 <button class="fileManager btn btn-xs btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس</button>
                                 <button class="btn btn-xs btn-primary" onclick="$(this).closest('.social').remove();" type="Button" data-multi="false">حذف</button>
                                 <input class="inputFile" name="socials[{{$srow}}][image_id]" value="{{$social->image_id}}" type="hidden">
                             </div>
                             <hr>
                             </div>
                             @php
                                 $srow++;
                             @endphp
                         @endforeach
                         </div>

                         <button type="submit" class="btn btn-success">ذخیره</button>
                         <button  type="button" onclick="add_social_row();" class="btn btn-success">افزودن</button>
                     </form>--}}
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->


        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    {{--
        <script>
            var s_row={!! $srow !!};
            function  add_social_row()
            {
                s_row++;
                var html='';
                html+='<div class="social">';
                html+= '<input type="text" name="socials['+s_row+'][name]"  value="" placeholder="نام" class="form-control">';
                html+='<input type="text" name="socials['+s_row+'][url]"  value="" placeholder="لینک" class="form-control">';
                html+='<div class="ImageManager">';
                html+='<img src="" class="imageManagerImage" width="60" style="padding: 5px;" height="60"><br>';
                html+='<button class="fileManager btn btn-xs btn-primary" type="Button" data-url="{{route('home')}}/image-manager" data-multi="false">انتخاب عکس</button>';
                html+='<button class="btn btn-xs btn-primary" onclick="$(this).closest(\'.social\').remove();" type="Button" data-multi="false">حذف</button>';
                html+='<input class="inputFile" name="socials['+s_row+'][image_id]" value="" type="hidden">';
                html+='</div>';
                html+='<hr>';
                html+='</div>';

                $('#social_content').append(html);

            }

        </script>
    --}}
    <!-- ./wrapper -->
@stop

