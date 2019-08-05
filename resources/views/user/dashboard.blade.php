@extends('layouts.app_master')
@section('styles')

    @endsection
@section('content')


                <!-- BEGIN: Subheader -->
                <div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="margin-right-auto">
                            <h3 class="m-subheader__title ">داشبورد</h3>
                        </div>
                       {{-- <div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
                        </div>--}}
                    </div>
                </div>

                <!-- END: Subheader -->
                <div class="m-content">

                    <div class="m-portlet  m-portlet--unair">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="row m-row--no-padding m-row--col-separator-xl">
                                <div class="col-md-12 col-lg-6 col-xl-3">

                                    <!--begin::Total Profit-->
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">
                                              تعداد رویداد ها
                                            </h4><br>
                                            <span class="m-widget24__desc">
												تعداد کل رویداد های ایجاد شده
												</span>
                                            <span class="m-widget24__stats m--font-brand">
																										{{$data['events_count']}}

												</span>
                                            <div class="m--space-10"></div>
                                          {{--  <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="m-widget24__change">
													رویداد های ثبت نام شده
												</span>
                                            <span class="m-widget24__number">
												10
												</span>--}}
                                        </div>
                                    </div>

                                    <!--end::Total Profit-->
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">

                                    <!--begin::New Feedbacks-->
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">
                                               رویداد های ثبت نام شده
                                            </h4><br>
{{--
                                            <span class="m-widget24__desc">

												</span>
--}}
                                            <span class="m-widget24__stats m--font-info">
																										{{$data['events_registered_count']}}

												</span>
                                            <div class="m--space-10"></div>
                                            {{--<div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="m-widget24__change">
                                                تعداد کل شبکه
												</span>
                                            <span class="m-widget24__number">
													10
												</span>--}}
                                        </div>
                                    </div>

                                    <!--end::New Feedbacks-->
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">

                                    <!--begin::New Orders-->
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">
                                                تعداد هسته ها
                                            </h4><br>
                                      {{--      <span class="m-widget24__desc">
													Fresh Order Amount
												</span>--}}
                                            <span class="m-widget24__stats m--font-danger">
													{{$data['cores_count']}}
												</span>
                                            <div class="m--space-10"></div>
                                            {{--<div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="m-widget24__change">
													Change
												</span>
                                            <span class="m-widget24__number">
													69%
												</span>--}}
                                        </div>
                                    </div>

                                    <!--end::New Orders-->
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">

                                    <!--begin::New Users-->
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">
                                                تعداد کل شبکه
                                            </h4><br>
                                            <span class="m-widget24__desc">
													کاربران ثبت شده تا الان
												</span>
                                            <span class="m-widget24__stats m--font-success">
																									{{$data['users_count']}}
												</span>
                                            <div class="m--space-10"></div>
                                            {{--<div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="m-widget24__change">
													Change
												</span>
                                            <span class="m-widget24__number">
													90%
												</span>--}}
                                        </div>
                                    </div>

                                    <!--end::New Users-->
                                </div>
                            </div>
                        </div>
                    </div>
<div class="row">
    <div class="col-xl-12 col-md-12">

        <!--begin:: Widgets/Best Sellers-->
        <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            اخبار سامانه
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    {{--<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab1_content" role="tab" aria-selected="false">
                                Last Month
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab" aria-selected="false">
                                last Year
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget5_tab3_content" role="tab" aria-selected="true">
                                All time
                            </a>
                        </li>
                    </ul>--}}
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin::Content-->
                <div class="tab-content_disabled">
                    <div class="tab-pane" id="m_widget5_tab1_content" aria-expanded="true">

                        <!--begin::m-widget5-->
                        <div class="m-widget5">
                            <div class="m-widget5__item">
                                <div class="m-widget5__content">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../../assets/app/media/img//products/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__section">
                                        <h4 class="m-widget5__title">
                                            عنوان تست
                                        </h4>
                                        <span class="m-widget5__desc">
																	متن تست متن تست
																</span>
                                        <div class="m-widget5__info">
																	{{--<span class="m-widget5__author">
																		نویسنده:
																	</span>--}}
                                            <span class="m-widget5__info-label">
																		نویسنده:
																	</span>
                                            <span class="m-widget5__info-author-name">
																		محمدعلی اسمی
																	</span>
                                            <span class="m-widget5__info-label">
																		تاریخ انتشار :
																	</span>
                                            <span class="m-widget5__info-date m--font-info">
																		23 آبان 1396
																	</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget5__content">
                                    <div class="m-widget5__stats1">
                                        {{--<span class="m-widget5__number">19,200</span><br>--}}
                                        <span class="m-widget5__sales"><span class="m-widget5__votes"><button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-danger"><div class="m-demo-icon__class">
												لایک		<i class="la la-thumbs-up"></i>    </div></button></span>
                                    </div>
                                    <div class="m-widget5__stats2">

                                        <span class="m-widget5__votes"><button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">نمایش</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end::m-widget5-->
                    </div>

                </div>

                <!--end::Content-->
            </div>
        </div>

        <!--end:: Widgets/Best Sellers-->
    </div>
</div>

                </div>
    @endsection
@section('scripts')

{{--    <!--begin::Page Vendors -->
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

    <!--end::Page Vendors -->--}}

    <!--begin::Page Scripts -->
    <script src="{{asset('js/dashboard.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->

    @endsection