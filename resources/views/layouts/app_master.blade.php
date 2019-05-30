<!DOCTYPE html>
<html direction="rtl" style="direction: rtl" >

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title','شبکه طلایه داران جهاد')</title>
    <meta name="description" content="hejr_ir">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->
   {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />--}}
    <!--begin:: Global Mandatory Vendors -->
    <link href="{{asset('vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
@yield('styles')
<!--end:: Global Mandatory Vendors -->

  <!--begin:: Global Optional Vendors -->
  <link href="{{asset('vendors/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendors/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/jstree/dist/themes/default/style.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/chartist/dist/chartist.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/vendors/flaticon/css/flaticon.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/vendors/metronic/css/styles.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('vendors/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />

  <!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles -->
    {{--<link href="../../../assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />--}}


    <link href="{{asset('css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{asset('images/logo.jpg')}}" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
{{--
<div id="app">
--}}
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
   @include('partials.header')
   <!-- begin::Body -->
       <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

           <div class="m-grid__item m-grid__item--fluid m-wrapper">

           @include('partials.sidebar')
       @yield('content')

       </div>
</div>


    @include('partials.footer')
       </div>
       <!-- end:: Page -->

{{--       <!-- begin::Quick Sidebar -->
       <div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
           <div class="m-quick-sidebar__content m--hide">
               <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
               <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                   <li class="nav-item m-tabs__item">
                       <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">Messages</a>
                   </li>
                   <li class="nav-item m-tabs__item">
                       <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">Settings</a>
                   </li>
                   <li class="nav-item m-tabs__item">
                       <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">Logs</a>
                   </li>
               </ul>
               <div class="tab-content">
                   <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                       <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                           <div class="m-messenger__messages m-scrollable">
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--in">
                                       <div class="m-messenger__message-pic">
                                           <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                       </div>
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-username">
                                                   Megan wrote
                                               </div>
                                               <div class="m-messenger__message-text">
                                                   Hi Bob. What time will be the meeting ?
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--out">
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-text">
                                                   Hi Megan. It's at 2.30PM
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--in">
                                       <div class="m-messenger__message-pic">
                                           <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                       </div>
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-username">
                                                   Megan wrote
                                               </div>
                                               <div class="m-messenger__message-text">
                                                   Will the development team be joining ?
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--out">
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-text">
                                                   Yes sure. I invited them as well
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__datetime">2:30PM</div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--in">
                                       <div class="m-messenger__message-pic">
                                           <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                       </div>
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-username">
                                                   Megan wrote
                                               </div>
                                               <div class="m-messenger__message-text">
                                                   Noted. For the Coca-Cola Mobile App project as well ?
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--out">
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-text">
                                                   Yes, sure.
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--out">
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-text">
                                                   Please also prepare the quotation for the Loop CRM project as well.
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__datetime">3:15PM</div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--in">
                                       <div class="m-messenger__message-no-pic m--bg-fill-danger">
                                           <span>M</span>
                                       </div>
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-username">
                                                   Megan wrote
                                               </div>
                                               <div class="m-messenger__message-text">
                                                   Noted. I will prepare it.
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--out">
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-text">
                                                   Thanks Megan. I will see you later.
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="m-messenger__wrapper">
                                   <div class="m-messenger__message m-messenger__message--in">
                                       <div class="m-messenger__message-pic">
                                           <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                       </div>
                                       <div class="m-messenger__message-body">
                                           <div class="m-messenger__message-arrow"></div>
                                           <div class="m-messenger__message-content">
                                               <div class="m-messenger__message-username">
                                                   Megan wrote
                                               </div>
                                               <div class="m-messenger__message-text">
                                                   Sure. See you in the meeting soon.
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="m-messenger__seperator"></div>
                           <div class="m-messenger__form">
                               <div class="m-messenger__form-controls">
                                   <input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
                               </div>
                               <div class="m-messenger__form-tools">
                                   <a href="" class="m-messenger__form-attachment">
                                       <i class="la la-paperclip"></i>
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="tab-pane" id="m_quick_sidebar_tabs_settings" role="tabpanel">
                       <div class="m-list-settings m-scrollable">
                           <div class="m-list-settings__group">
                               <div class="m-list-settings__heading">General Settings</div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Email Notifications</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Site Tracking</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">SMS Alerts</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Backup Storage</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Audit Logs</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                           </div>
                           <div class="m-list-settings__group">
                               <div class="m-list-settings__heading">System Settings</div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">System Logs</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Error Reporting</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Applications Logs</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Backup Servers</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                               <div class="m-list-settings__item">
                                   <span class="m-list-settings__item-label">Audit Logs</span>
                                   <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="tab-pane" id="m_quick_sidebar_tabs_logs" role="tabpanel">
                       <div class="m-list-timeline m-scrollable">
                           <div class="m-list-timeline__group">
                               <div class="m-list-timeline__heading">
                                   System Logs
                               </div>
                               <div class="m-list-timeline__items">
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">12 new users registered <span class="m-badge m-badge--warning m-badge--wide">important</span></a>
                                       <span class="m-list-timeline__time">Just now</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">System shutdown</a>
                                       <span class="m-list-timeline__time">11 mins</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                       <a href="" class="m-list-timeline__text">New invoice received</a>
                                       <span class="m-list-timeline__time">20 mins</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                       <a href="" class="m-list-timeline__text">Database overloaded 89% <span class="m-badge m-badge--success m-badge--wide">resolved</span></a>
                                       <span class="m-list-timeline__time">1 hr</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">System error</a>
                                       <span class="m-list-timeline__time">2 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">Production server down <span class="m-badge m-badge--danger m-badge--wide">pending</span></a>
                                       <span class="m-list-timeline__time">3 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">Production server up</a>
                                       <span class="m-list-timeline__time">5 hrs</span>
                                   </div>
                               </div>
                           </div>
                           <div class="m-list-timeline__group">
                               <div class="m-list-timeline__heading">
                                   Applications Logs
                               </div>
                               <div class="m-list-timeline__items">
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--info m-badge--wide">urgent</span></a>
                                       <span class="m-list-timeline__time">7 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">12 new users registered</a>
                                       <span class="m-list-timeline__time">Just now</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">System shutdown</a>
                                       <span class="m-list-timeline__time">11 mins</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                       <a href="" class="m-list-timeline__text">New invoices received</a>
                                       <span class="m-list-timeline__time">20 mins</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                       <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                       <span class="m-list-timeline__time">1 hr</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">System error <span class="m-badge m-badge--info m-badge--wide">pending</span></a>
                                       <span class="m-list-timeline__time">2 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">Production server down</a>
                                       <span class="m-list-timeline__time">3 hrs</span>
                                   </div>
                               </div>
                           </div>
                           <div class="m-list-timeline__group">
                               <div class="m-list-timeline__heading">
                                   Server Logs
                               </div>
                               <div class="m-list-timeline__items">
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">Production server up</a>
                                       <span class="m-list-timeline__time">5 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">New order received</a>
                                       <span class="m-list-timeline__time">7 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">12 new users registered</a>
                                       <span class="m-list-timeline__time">Just now</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">System shutdown</a>
                                       <span class="m-list-timeline__time">11 mins</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                       <a href="" class="m-list-timeline__text">New invoice received</a>
                                       <span class="m-list-timeline__time">20 mins</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                       <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                       <span class="m-list-timeline__time">1 hr</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">System error</a>
                                       <span class="m-list-timeline__time">2 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">Production server down</a>
                                       <span class="m-list-timeline__time">3 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                       <a href="" class="m-list-timeline__text">Production server up</a>
                                       <span class="m-list-timeline__time">5 hrs</span>
                                   </div>
                                   <div class="m-list-timeline__item">
                                       <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                       <a href="" class="m-list-timeline__text">New order received</a>
                                       <span class="m-list-timeline__time">1117 hrs</span>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- end::Quick Sidebar -->--}}

       <!-- begin::Scroll Top -->
       <div id="m_scroll_top" class="m-scroll-top">
           <i class="la la-arrow-up"></i>
       </div>

       <!-- end::Scroll Top -->

       <!-- begin::Quick Nav -->
       <ul class="m-nav-sticky" style="margin-top: 30px;">
         {{--  <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
               <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
           </li>
           <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
               <a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
           </li>--}}
           <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="پشتیبانی و گزارش مشکل" data-placement="left">
               <a href="https://t.me/s_alis77" target="_blank"><i class="la la-life-ring"></i></a>
           </li>
       </ul>

       <!-- begin::Quick Nav -->


       <!--begin:: Global Mandatory Vendors -->
<script src="{{asset('vendors/jquery/dist/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/wnumb/wNumb.js')}}" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="{{asset('vendors/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.min.js')}}"></script>

<script src="{{asset('vendors/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/autosize/dist/autosize.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/summernote/dist/summernote.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/forms/jquery-validation.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/base/bootstrap-notify.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jstree/dist/jstree.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/raphael/raphael.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/morris.js/morris.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/chartist/dist/chartist.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/charts/chart.init.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript')}}"></script>
<script src="{{asset('vendors/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/js/framework/components/plugins/base/sweetalert2.init.js')}}" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle -->
<script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}"></script>

<!--end::Global Theme Bundle -->

@yield('scripts')
{{--</div>--}}
</body>

<!-- end::Body -->
</html>