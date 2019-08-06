@extends('layouts.app_master')
@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('pass/password_strength.css')}}">
<style>
    .form-control-feedback {
        color: red;
    }
</style>
    @endsection
@section('content')


    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="margin-right-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">پروفایل کاربری</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-user-times"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">کاربری</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> پروفایل کاربری</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- END: Subheader -->
                <div class="m-content">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <div class="m-portlet m-portlet--full-height  ">
                                <div class="m-portlet__body">
                                    <div class="m-card-profile">
                                        <div class="m-card-profile__title m--hide">
                                           پروفایل شخصی شما
                                        </div>
                                        <div class="m-card-profile__pic">
                                            <div class="m-card-profile__pic-wrapper">
                                                <img class="user_image" src="{{$cuser->thumbnail or asset('images/user.jpg')}}" alt="" />
                                            </div>
                                        </div>
                                        <div class="m-card-profile__details">
                                            <span class="m-card-profile__name">{{$cuser->name}} {{$cuser->lastname}}</span>
                                            <a href="" class="m-card-profile__email m-link iranyekan">{{$cuser->phonenumber}}</a>
                                        </div>
                                    </div>
                                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                        <li class="m-nav__section m--hide">
                                            <span class="m-nav__section-text">Section</span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="{{route('user.profile')}}" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                <span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">پروفایل من</span>
															<span class="m-nav__link-badge">{{--<span class="m-badge m-badge--success">2</span>--}}</span>
														</span>
													</span>
                                            </a>
                                        </li>
                                        {{--<li class="m-nav__item">
                                            <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">Activity</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                <span class="m-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                                <span class="m-nav__link-text">Sales</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-time-3"></i>
                                                <span class="m-nav__link-text">Events</span>
                                            </a>
                                        </li>--}}
                                        <li class="m-nav__item">
                                            <a href="https://t.me/s_alis77" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                <span class="m-nav__link-text">پشتیبانی</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="m-portlet__body-separator"></div>
                             {{--       <div class="m-widget1 m-widget1--paddingless">
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Member Profit</h3>
                                                    <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-brand">+$17,800</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Orders</h3>
                                                    <span class="m-widget1__desc">Weekly Customer Orders</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-danger">+1,800</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget1__item">
                                            <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                    <h3 class="m-widget1__title">Issue Reports</h3>
                                                    <span class="m-widget1__desc">System bugs and issues</span>
                                                </div>
                                                <div class="col m--align-right">
                                                    <span class="m-widget1__number m--font-success">-27,49%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-tools">
                                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                    <i class="flaticon-share m--hide"></i>
                                                    بروزرسانی اطلاعات
                                                </a>
                                            </li>
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">تغییر عکس
                                                </a>
                                            </li>
                                            {{--  <li class="nav-item m-tabs__item">
                                                  <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                                      Settings
                                                  </a>
                                              </li>--}}
                                        </ul>
                                    </div>
{{--
                                    <div class="m-portlet__head-tools">
                                        <ul class="m-portlet__nav">
                                            <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                                        <i class="la la-gear"></i>
                                                    </a>
                                                    <div class="m-dropdown__wrapper">
                                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                        <div class="m-dropdown__inner">
                                                            <div class="m-dropdown__body">
                                                                <div class="m-dropdown__content">
                                                                    <ul class="m-nav">
                                                                        <li class="m-nav__section m-nav__section--first">
                                                                            <span class="m-nav__section-text">Quick Actions</span>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                                <span class="m-nav__link-text">Create Post</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                                <span class="m-nav__link-text">Send Messages</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                                <span class="m-nav__link-text">Upload File</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__section">
                                                                            <span class="m-nav__section-text">Useful Links</span>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                                <span class="m-nav__link-text">FAQ</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                                <span class="m-nav__link-text">Support</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__separator m-nav__separator--fit m--hide">
                                                                        </li>
                                                                        <li class="m-nav__item m--hide">
                                                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
--}}
                                </div>
                                <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show m--hide" role="alert" id="errormessage" style="width: 80%;margin: 0 auto;margin-top: 2%;">
                                            <div class="m-alert__icon">
                                                <i class="flaticon-exclamation-1"></i>
                                                <span></span>
                                            </div>
                                            <div class="m-alert__text">
                                                متاسفانه در پر کردن اطلاعات اشکالاتی وجود دارد،بعد از بررسی دوباره تلاش کنید.
                                            </div>
                                            <div class="m-alert__close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                </button>
                                            </div>
                                        </div>

                                        <form class="m-form m-form--fit m-form--label-align-right" novalidate="novalidate" id="userupdate">
       {{csrf_field()}}
                                            <div class="m-portlet__body">

                                                <div class="form-group m-form__group row">
                                                    <div class="col-10 ml-auto">
                                                        <h3 class="m-form__section">اطلاعات اولیه</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">نام</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="name" type="text" value="{{$cuser->name}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">نام خانوادگی</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="lastname" type="text" value="{{$cuser->lastname}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">کدملی</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="nationcode" type="text" value="{{$cuser->nationcode}}">
                                                        <span class="m-form__help">برای مثال 0021805515</span>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">شماره مبایل</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="phonenumber" type="number" value="{{$cuser->phonenumber}}">
                                                    {{--    <span class="m-form__help">برای مثال 0021805515</span>--}}
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">نام کاربری</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="username" type="text" value="{{$cuser->username}}" id="username">
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">رمزعبور</label>
                                                    <div class="col-7">
                                                        <div style="height: 30px;"></div>
                                                        <div id="mypass">

                                                    </div>

                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">ایمیل</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="email" type="email" value="{{$cuser->email}}" id="email" aria-invalid="true" aria-describedby="email_val">
         <input id="email_val" type="hidden">
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">تاریخ تولد</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="birthday" type="text" value="{{$cuser->birthday}}">
                                                        <span class="m-form__help">برای مثال 1357/11/22</span>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">نام پدر</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="father_name" type="text" value="{{$cuser->father_name}}">
                                                    </div>
                                                </div>
                                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-10 ml-auto">
                                                        <h3 class="m-form__section">محل سکونت</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">آدرس</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="address" type="text" value="{{$cuser->address}}">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 col-form-label">منطقه</label>
                                                    <div class="col-7">
                                                    <select class="form-control m-input m-input--square" name="area_id"  id="exampleSelect1">
                                                       <option value="">انتخاب کنید.</option>
            @foreach($areas as $area)
                <option @if($area->id == $cuser->area_id) selected @endif value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
                                                    </select>
                                                    </div>
                                                </div>


                                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-10 ml-auto">
                                                        <h3 class="m-form__section">اطلاعات تحصیلی</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">رتبه کنکور</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" type="text" name="konkor_grade" value="{{$cuser->konkor_grade}}">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 
                                                    col-form-label">دانشگاه</label>
                                                    <div class="col-7">
                                                        <select class="form-control js-example-basic-multiple change_uni m-input m-input--square" name="university_id" id="exampleSelect1">
                                                            <option value="">انتخاب کنید.</option>
                                                            @foreach($universities as $university)
                                                                <option @if($university->id == $cuser->university_id) selected @endif value="{{$university->id}}">{{$university->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button" id="create_new_uni" class="pull-right btn btn-info form-control">افزودن دانشگاه جدید</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-info form-control btn-show-details" style="display:none;">تکمیل اطلاعات دانشگاه</button>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 col-form-label">رشته تحصیلی</label>
                                                    <div class="col-7">
                                                        <select class="form-control m-input m-input--square" name="field_id" id="field">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 col-form-label">وضعیت تحصیلی</label>
                                                    <div class="col-7">
                                                        <select class="form-control m-input m-input--square" name="grade_id" id="exampleSelect1">
                                                            <option value="">انتخاب کنید.</option>
                                                            @foreach($grades as $grade)
                                                                <option @if($grade->id == $cuser->grade_id) selected @endif value="{{$grade->id}}">{{$grade->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-10 ml-auto">
                                                        <h3 class="m-form__section">سایر مشخصات</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 col-form-label">وضعیت نظام وظیفه</label>
                                                    <div class="col-7">
                                                        <select class="form-control m-input m-input--square" name="soldier_service_id" id="exampleSelect1">
                                                            <option value="">انتخاب کنید.</option>
                                                            @foreach($soldier_services as $soldier_service)
                                                                <option @if($soldier_service->id == $cuser->soldier_service_id) selected @endif value="{{$soldier_service->id}}">{{$soldier_service->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 col-form-label">وضعیت تاهل</label>
                                                    <div class="col-7">
                                                        <select class="form-control m-input m-input--square" name="martial" id="exampleSelect1">
                                                            <option value="">انتخاب کنید.</option>
  <option @if($cuser->martial==1) selected @endif value="1">متاهل</option>
  <option @if($cuser->martial==0) selected @endif value="1">مجرد</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label for="exampleSelect1" class="col-2 col-form-label">شغل</label>
                                                    <div class="col-7">
                                                        <select class="form-control m-input m-input--square" name="job_id" id="exampleSelect1">
                                                            <option value="">انتخاب کنید.</option>
              @foreach($jobs as $job)
                                                                <option @if($job->id == $cuser->job_id) selected @endif value="{{$job->id}}">{{$job->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                               {{-- <div class="form-group m-form__group row">
                                                    <div class="col-10 ml-auto">
                                                        <h3 class="m-form__section">تصویر</h3>
                                                    </div>
                                                </div>
--}}
                                      {{--          <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">عکس پرسونلی</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="image" type="file">
                                                        <span class="m-form__help">

 <img class="image-responsive" src="{{$cuser->thumbnail}}">
                                                        </span>
                                                    </div>
                                                </div>
--}}

                                            <div class="m-portlet__foot m-portlet__foot--fit">
                                                <div class="m-form__actions">
                                                    <div class="row">
                                                        <div class="col-2">
                                                        </div>
                                                        <div class="col-7">
                                                            <button id="submit_edituser" type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom iranyekan"> ذخیره تغییرات</button>&nbsp;&nbsp;
                                                            {{--                                 <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                        <!-- Modal edit-uni -->
                                        <div class="modal fade" id="uniDetailsModal" role="dialog">
                                            <form action="{{route('user.university.updates')}}" method="POST" id="frm-edit_uni">
                                            <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <img src="{{asset('gif/waiter.gif')}}" id="waiter_gif" style="position: absolute;z-index: 10;width: 150px;height: 150px;right: 35%;top: 35%; display:none;">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">ویرایش دانشگاه</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" id="modal_id">
                                                    <label class="col-2">استان</label>
                                                    <div class="col-12">
                                                        <select name="province_id" class="form-control provinces" id="provinces">
                                                        <option value="">انتخاب کنید</option>
                                                            @foreach($provinces as $province)
                                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label style="color:red; display:none;" id="modal_province_error"></label>
                                                    </div>
                                                    <label class="col-2">شهر</label>
                                                    <div class="col-12">
                                                        <select name="city_id" class="form-control cities"></select>
                                                    </div>
                                                    <label class="col-4">نوع دانشگاه</label>
                                                    <div class="col-12">
                                                        <select name="university_type_id" class="form-control university_type_id">
                                                                <option value="">انتخاب کنید</option>
                                                                @if(!empty($uni_types))
                                                                    @foreach($uni_types as $uni_type)
                                                                        <option value="{{$uni_type->id}}">{{$uni_type->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                        </select>
                                                        <label style="color:red; display:none;" id="modal_type_error"></label>
                                                    </div>
                                                    <label class="col-2">توضیحات</label>
                                                    <div class="col-12">
                                                        <textarea name="bio" class="form-control bio"></textarea>
                                                        <label style="color:red; display:none;" id="modal_bio_error"></label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" class="btn btn-success" value="ذخیره تغییرات">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                                </div>
                                            </div>
                                            
                                            </div>

                                            </form>
                                        </div>
                                        <!-- end of modal -->
                                    </div>
                                    <div class="tab-pane " id="m_user_profile_tab_2">
                                        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show m--hide" role="alert" id="errormessage2" style="width: 80%;margin: 0 auto;margin-top: 2%;">
                                            <div class="m-alert__icon">
                                                <i class="flaticon-exclamation-1"></i>
                                                <span></span>
                                            </div>
                                            <div class="m-alert__text">
                                                متاسفانه در پر کردن اطلاعات اشکالاتی وجود دارد،بعد از بررسی دوباره تلاش کنید.
                                            </div>
                                            <div class="m-alert__close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                </button>
                                            </div>
                                        </div>
                                        <form class="m-form m-form--fit m-form--label-align-right" novalidate="novalidate" id="imageupdate" action="{{route('user.uploadpic')}}">
                                            <div class="m-portlet__body">
  <div id="validation-errors">

  </div>


                                               {{-- <div class="form-group m-form__group row">
                                                    <div class="col-10 ml-auto">
                                                        <h3 class="m-form__section"> عکس</h3>
                                                    </div>
                                                </div>
--}}
      {{csrf_field()}}
                                                <div class="form-group m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">عکس پرسونلی</label>
                                                    <div class="col-7">
                                                        <input class="form-control m-input" name="image" type="file">
                                                        <span class="m-form__help">

 <img class="image-responsive user_image" src="{{$cuser->thumbnail}}">
                                                        </span>
                                                    </div>
                                                </div>



                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2">
                                                    </div>
                                                    <div class="col-7">
                                                        <button id="submit_uploaduser" type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom iranyekan"> آپلود </button>&nbsp;&nbsp;
                                                        {{--                                 <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane " id="m_user_profile_tab_3"></div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal add-new-uni -->
                        <div class="modal fade" id="add_new_uni" role="dialog">
                            <form action="{{route('user.university.add')}}" method="POST" id="frm-add_uni">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <img src="{{asset('gif/waiter.gif')}}" id="waiter_gif" style="position: absolute;z-index: 10;width: 150px;height: 150px;right: 35%;top: 35%; display:none;">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">افزودن دانشگاه</h4>
                                </div>
                                <div class="modal-body">
                                    <label class="col-2">نام</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="name" id="name">
                                        <label style="color:red; display:none;" id="modal_name_error"></label>
                                    </div>
                                    <label class="col-2">استان</label>
                                    <div class="col-12">
                                        <select name="province_id" class="form-control provinces" id="provinces">
                                        <option value="">انتخاب کنید</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                        <label style="color:red; display:none;" id="modal_province_error"></label>
                                    </div>
                                    <label class="col-2">شهر</label>
                                    <div class="col-12">
                                        <select name="city_id" class="form-control cities"></select>
                                    </div>
                                    <label class="col-10">نوع دانشگاه</label>
                                    <div class="col-12">
                                        <select name="university_type_id" class="form-control university_type_id">
                                        <option value="">انتخاب کنید</option>
                                            @if(!empty($uni_types))
                                                @foreach($uni_types as $uni_type)
                                                    <option value="{{$uni_type->id}}">{{$uni_type->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label style="color:red; display:none;" id="modal_type_error"></label>
                                    </div>
                                    <label class="col-2">توضیحات</label>
                                    <div class="col-12">
                                        <textarea name="bio" class="form-control bio" id="bio"></textarea>
                                        <label style="color:red; display:none;" id="modal_bio_error"></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="ذخیره اطلاعات">
                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                </div>
                            </div>
                            
                            </div>
                            </form>
                        </div>

                        <!-- end of modal -->

                    </div>

    @endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script>$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});</script>

{{--    <!--begin::Page Vendors -->
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

    <!--end::Page Vendors -->--}}

    <!--begin::Page Scripts -->
<script src="{{asset('vendors/jquery-validation/dist/localization/messages_fa.js')}}" type="text/javascript"></script>


    <!--end::Page Scripts -->
<script type="text/javascript">

    $("#field").select2({
        ajax: {
            url: "{{route('loadfields')}}",
            dataType: 'json',
            method: 'POST',
            quietMillis: 50,
            delay: 250,
            data: function (params) {
                return {
                    q:params, // search term
                    page: params.page,

                    _token: $('meta[name="csrf-token"]').attr('content'),
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(obj) {
                        return {
                            id: obj.id,
                            text: obj.name
                        };
                    })
                };
            },
            cache: true
        },
        placeholder: 'جستجوی رشته',
        /*   escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
           minimumInputLength: 1,
           templateResult: formatRepo,*/
        /*
                    templateSelection: formatRepoSelection
        */
    });
</script>
    <script type="text/javascript" src="{{asset('pass/password_strength_lightweight.js')}}"></script>
    <script>
        $('#mypass').strength_meter({

            //  CSS selectors

            strengthWrapperClass: 'strength_wrapper',
        inputClass: 'strength_input',
        strengthMeterClass: 'strength_meter',
        toggleButtonClass: 'button_strength',
        });

    /*    //crappy workaround
        var valFix = function(el) {
            (function() {
                var check = el.val(),run = function() {
                        if(check !== (el.val())) {
                            el.attr('value',el.val());
                            const emailval=  el.val();
                        }
                    },
                    timer = setInterval(function() {
                        run();
                    },100);
            })();
        }
        //run the workaround
        valFix($('#email'));*/
   /* $('#email').keyup(function () {
        $(this).attr('value',$(this).val());
        $('#email_val').val($(this).val());
/!*
       alert($(this).val());
*!/
    });*/

                $('#submit_edituser').click(function (e) {
/*
                    e.preventDefault();
*/
                    $("#userupdate").validate({
                        // define validation rules
                        onkeyup: function(element, event) {
                            if ($(element).attr('name') == "email") {
                                return false; // disable onkeyup for your element named as "name"
                            } else { // else use the default on everything else
                                if ( event.which === 9 && this.elementValue( element ) === "" ) {
                                    return;
                                } else if ( element.name in this.submitted || element === this.lastElement ) {
                                    this.element( element );
                                }
                            }
                        },
                        rules: {
                            email: {
                                required: true,
                                email: true,
                                async: false,
                                remote: {
                                    type: "post",
                                    url: '{{route('user.checkemail')}}',
                                    timeout:10000,
                                    data: {
                                        email: $('#email').val(),
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    }
                                }

                            },
                            url: {
                                required: true
                            },
                            username:{
                                required:true,
                                remote: {
                                    type: "post",
                                    url: '{{route('user.checkusername')}}',
                                    timeout:10000,
                                    data: {
                                        username: $('#username').val(),
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    }
                                }
                            },
                            phonenumber: {
                                required: true,
                                digits: true
                            },
                            nationcode: {
                                digits: true,
                            },
                            phone: {
                                digits: true,

                            },
                            name: {
                                required: true,
                                minlength: 2,
                            },
                            lastname: {
                                required: true,
                                minlength: 2,
                            },
                        },
                        messages: {
                            email:{
                                remote: 'این ایمیل قبلا انتخاب شده است.'
                            }
                        },
                        //display error alert on form submit
                        invalidHandler: function (event, validator) {
                            mUtil.scrollTo("m_form_2", -200);
                            var alert = $('#errormessage');
                            alert.removeClass('m--hide').show();
                            /*
                            Swal.fire({
                                "title": "",
                                "text": "There are some errors in your submission. Please correct them.",
                                "type": "error",
                                "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                            });
                            */
                        },

                        submitHandler: function (form) {
                            //form[0].submit(); // submit the form
                                mApp.blockPage({
                                    overlayColor: '#000000',
                                    type: 'loader',
                                    state: 'primary',
                                    message: 'در حال ارسال'
                                });

                                setTimeout(function() {
                                    mApp.unblockPage();
                                }, 2000);


                            var data = $('#userupdate').serialize();
                            $.ajax({
                                url:'{{route('user.update')}}',
                                type:'json',
                                method: 'POST',
                                data:data,
                                success: function (data) {
                                    if(data[1] ==1) {
    Swal.fire( "بروزرسانی انجام شد!","اطلاعات شما با موفقیت به روز شدند.", "success");
                                    }
                                },
                                error: function () {
                                    alert(data);

                                }
                            });
                        }

                    });

                });


        $('#imageupdate').on('submit',function(e){
            e.preventDefault();
            $("#imageupdate").validate({
                // define validation rules
          /*      onkeyup: function (element, event) {
                    if ($(element).attr('name') == "email") {
                        return false; // disable onkeyup for your element named as "name"
                    } else { // else use the default on everything else
                        if (event.which === 9 && this.elementValue(element) === "") {
                            return;
                        } else if (element.name in this.submitted || element === this.lastElement) {
                            this.element(element);
                        }
                    }*/

                rules: {
                    image: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        remote: 'این ایمیل قبلا انتخاب شده است.'
                    },
                    image:{
                        required: 'لطفا عکسی انتخاب کنید.'
                    }
                },
                //display error alert on form submit
                invalidHandler: function (event, validator) {
                    mUtil.scrollTo("m_form_2", -200);
                    var alert = $('#errormessage2');
                    alert.removeClass('m--hide').show();

                },
            });
            if($(this).find("input[type=file]").val()){
                var image = $('input[name="image"]').get(0).files[0];
                var formData = new FormData();
                formData.append('image', image);
                var objArr = [];
               /* objArr.push({"title": $(this).find('input[name=title]').val(),"name": $(this).find('input[name=name]').val(), "lastname": $(this).find('input[name=lastname]').val(),"phonenumber": $(this).find('input[name=phonenumber]').val(),"pluckname": $(this).find('input[name=pluckname]').val(),"text": $(this).find('textarea[name=text]').val(),"type": $(this).find('input[name=type]').val()});*/
                formData.append('objArr', JSON.stringify( objArr ));
                formData.append('_token',$(this).find("input[name=_token]").val());
                //console.log(formData);
            }
            $('#validation-errors').html('');

            $.ajax({
                url:$(this).attr('action'),
                type: 'post',
                data: formData,
                dataType:'json',
                processData: false, //neccessory
                contentType: false,//neccessory
                success:function (response) {
                    if(response[0] == 1){
                        Swal.fire({
                            type: 'success',
                            text: 'تصویر با موفیت آپلود و تعویض شد.',
                            confirmButtonColor:'#22caff',
                        });
            var image_path = response[1];
            $('.user_image').attr('src',image_path);
                    }else{
                        Swal.fire({
                            type: 'error',
                            text: 'مشکلی در حین ارسال پیش آمده،دوباره تلاش کنید.',
                            confirmButtonColor:'#22caff'
                        });
                    }
                },
                error:function (response) {
                    $('#validation-errors').html('');
                    $.each(response.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');
                    });
                }
            });
        });



    </script>

    {{-- change uni --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".change_uni").on("change", function(){
            var uni_id = $(this).val();
            var url = "{{route('user.uni_details')}}";
            $.ajax({
                data:{'uni_id':uni_id},
                url:url,
                type:"POST",
                success:function(uni){
                    console.log(uni);

                    $("#uniDetailsModal").find(".modal-title").text(uni.name);
                    $("#uniDetailsModal").find("#modal_id").val(uni.id);
                    $("#uniDetailsModal").find(".bio").val(uni.bio);

                    $(".btn-show-details").fadeIn("slow");
                },
                error:function(){
                    console.log('error in getting uni details');
                }
            });
        });
    </script>
    <script>
        $(".btn-show-details").on("click", function(){
            $("#uniDetailsModal").modal("show");
        });
    </script>
    {{-- end of change uni --}}

    {{-- provinces change - cities show - modal --}}
    <script>
        $("#uniDetailsModal").on('change', "#provinces" , function(){
            var province_id = $(this).val();
            var url = "{{route('show_cities')}}";
            $.ajax({
                data:{'id':province_id},
                url:url,
                type:"POST",
                success:function(cities){
                    $("#uniDetailsModal").find(".cities").html('');
                    $.each(cities, function(city){
                        $("#uniDetailsModal").find(".cities").append('<option value="'+cities[city].id+'">'+cities[city].name+'</option>');
                    });
                },
                error:function(){
                    console.log('error in getting the cities in modal');
                }
            });
        });
    </script>
     <script>
        $("#add_new_uni").on('change', "#provinces" , function(){
            var province_id = $(this).val();
            var url = "{{route('show_cities')}}";
            $.ajax({
                data:{'id':province_id},
                url:url,
                type:"POST",
                success:function(cities){
                    $("#add_new_uni").find(".cities").html('');
                    $.each(cities, function(city){
                        $("#add_new_uni").find(".cities").append('<option value="'+cities[city].id+'">'+cities[city].name+'</option>');
                    });
                },
                error:function(){
                    console.log('error in getting the cities in modal');
                }
            });
        });
    </script>
    {{-- end of provinces change - cities show - moal --}}

    {{--edit uni in modal--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#frm-edit_uni").on("submit", function(e){
            e.preventDefault();

            $("#uniDetailsModal").find("#waiter_gif").fadeIn("slow");
            $("#uniDetailsModal").find("#modal_province_error").fadeOut("slow");
            $("#uniDetailsModal").find("#modal_bio_error").fadeOut("slow");
            $("#uniDetailsModal").find("#modal_type_error").fadeOut("slow");

            var data = $(this).serialize();
            var url = $(this).attr("action");
            var type = $(this).attr("method");
            $.ajax({
                data:data,
                url:url,
                type:type,
                success:function(data){
                    Swal.fire(
                        'موفقیت آمیز',
                        'تغییرات اعمال گردید !',
                        'success'
                        );
                    $("#uniDetailsModal").modal("hide");
                    $("#uniDetailsModal").find("#waiter_gif").fadeOut("slow");
                },
                error:function(errors){
                    console.log(errors.responseJSON.errors);
                    if(errors.responseJSON.errors.province_id){
                        $("#uniDetailsModal").find("#modal_province_error").text(errors.responseJSON.errors.province_id[0]);
                        $("#uniDetailsModal").find("#modal_province_error").fadeIn("slow");
                    }
                    if(errors.responseJSON.errors.bio){
                        $("#uniDetailsModal").find("#modal_province_error").text(errors.responseJSON.errors.bio[0]);
                        $("#uniDetailsModal").find("#modal_province_error").fadeIn("slow");
                    }
                    if(errors.responseJSON.errors.university_type_id){
                        $("#uniDetailsModal").find("#modal_type_error").text(errors.responseJSON.errors.university_type_id[0]);
                        $("#uniDetailsModal").find("#modal_type_error").fadeIn("slow");
                    }
                    $("#uniDetailsModal").find("#waiter_gif").fadeOut("slow");
                    console.log('error in frm-edit_uni');
                }
            });
        });
    </script>
    {{--end of edit uni in modal--}}

    {{-- add new uni --}}
    <script>
        $("#create_new_uni").click(function(){
            $("#add_new_uni").find("#name").val('');
            $("#add_new_uni").find("#bio").val('');
            $("#add_new_uni").modal("show");
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#frm-add_uni").on("submit", function(e){
            e.preventDefault();

            $("#add_new_uni").find("#waiter_gif").fadeIn("slow");
            $("#add_new_uni").find("#modal_province_error").fadeOut("slow");
            $("#add_new_uni").find("#modal_name_error").fadeOut("slow");
            $("#add_new_uni").find("#modal_bio_error").fadeOut("slow");
            $("#add_new_uni").find("#modal_type_error").fadeOut("slow");

            var data = $(this).serialize();
            var url = $(this).attr('action');
            var type = $(this).attr("method");
            $.ajax({
                data:data,
                url:url,
                type:type,
                success:function(data){
                    Swal.fire(
                        'موفقیت آمیز',
                        'دانشگاه جدید اضافه شد !',
                        'success'
                        );
                    $("#add_new_uni").modal("hide");
                    $(".change_uni").append('<option value="'+data.id+'" selected>'+data.name+'</option>');
                    $("#add_new_uni").find("#waiter_gif").fadeOut("slow");
                },
                error:function(errors){
                    console.log('error in store new uni');
                    if(errors.responseJSON.errors.province_id){
                        $("#add_new_uni").find("#modal_province_error").text(errors.responseJSON.errors.province_id[0]);
                        $("#add_new_uni").find("#modal_province_error").fadeIn("slow");
                    }
                    if(errors.responseJSON.errors.name){
                        $("#add_new_uni").find("#modal_name_error").text(errors.responseJSON.errors.name[0]);
                        $("#add_new_uni").find("#modal_name_error").fadeIn("slow");
                    }
                    if(errors.responseJSON.errors.bio){
                        $("#add_new_uni").find("#modal_bio_error").text(errors.responseJSON.errors.bio[0]);
                        $("#add_new_uni").find("#modal_bio_error").fadeIn("slow");
                    }
                    if(errors.responseJSON.errors.university_type_id){
                        $("#add_new_uni").find("#modal_type_error").text(errors.responseJSON.errors.university_type_id[0]);
                        $("#add_new_uni").find("#modal_type_error").fadeIn("slow");
                    }
                    $("#add_new_uni").find("#waiter_gif").fadeOut("slow");
                }
            });
        });
    </script>
    {{-- add new uni --}}


    @endsection