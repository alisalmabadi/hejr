@extends('layouts.app')
	<!-- end::Head -->
@section('styles')
	<style>
		.m-login.m-login--2 .m-login__wrapper .m-login__container .m-login__form .m-login__form-action{
			margin-top: -1% !important;
		}

		.m-login.m-login--2 .m-login__wrapper .m-login__container .m-login__head .m-login__desc {
			margin-top: 0.5rem !important;

		}
		.m-login.m-login--2 .m-login__wrapper .m-login__container .m-login__logo {
			margin: 0 auto 1rem auto !important;
		}


		.m-login.m-login--2 .m-login__wrapper {
			padding: 3% 2rem 1rem 2rem !important;
		}

		.m-login.m-login--2 .m-login__wrapper .m-login__container .m-login__form {
			margin: 1rem auto !important;
		}



	</style>

	@stop
@section('content')
	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(../img/bg/bg-2.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img style="border-radius: 50%;" src="../images/logo.jpg">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">صفحه ورود به پنل</h3>
							</div>
							<form method="POST" class="m-login__form m-form" action="{{route('login_user')}}">
								{{csrf_field()}}
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="نام کاربری(شماره مبایل)" name="username" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="رمز عبور" name="password">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox--light">
											<input type="checkbox" name="remember"> مرا به خاطر بسپار
											<span></span>
										</label>
									</div>
									<div class="col m--align-right m-login__form-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">رمز عبور خود را فراموش کردید؟</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">وارد شدن</button>
								</div>
							</form>
						</div>
						<div class="m-login__signup">
							<div class="m-login__head">
								<h3 class="m-login__title">ثبت نام</h3>
								<div class="m-login__desc">برای ساخت حساب اطلاعات زیر را وارد نمایید.</div>
							</div>
							<form class="m-login__form m-form" action="{{route('register_user')}}" method="POST">
								{{csrf_field()}}
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="نام" name="name" style="float: right; width: 50%; margin-bottom: 1%;">
								</div>
								<div class="form-group m-form__group">
								<input class="form-control m-input" type="text" placeholder="نام خانوادگی" name="lastname" style="float: left; width: 50%;   margin-bottom: 1%;">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="نام کاربری(شماره مبایل)" name="username" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="password" placeholder="رمزعبور" name="password">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="وارد کردن مجدد رمزعبور" name="password_confirmation">
								</div>
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--light">
											<input type="checkbox" name="agree">پذیرفتن  <a href="#" class="m-link m-link--focus">قوانین</a>.
											<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">ثبت نام</button>&nbsp;&nbsp;
									<button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">انصراف</button>
								</div>
							</form>
						</div>
						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">رمزعبور خود را فراموش کردید؟</h3>
								<div class="m-login__desc">ایمیل خود را برای ارسال ایمیل فراموشی وارد کنید.</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="ایمیل" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">درخواست</button>&nbsp;&nbsp;
									<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">انصراف</button>
								</div>
							</form>
						</div>
						<div class="m-login__account">
							<span class="m-login__account-msg">
								هنوز حساب کاربری ندارید؟
							</span>&nbsp;&nbsp;
							<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">ثبت نام</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	@endsection

@section('scripts')
	<script src="{{asset('vendors/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
	<script src="{{asset('vendors/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('vendors/js/framework/components/plugins/forms/jquery-validation.init.js')}}" type="text/javascript"></script>
	<!--begin::Page Scripts -->
	<script src="{{asset('js/login.js')}}" type="text/javascript"></script>

	<!--end::Page Scripts -->
	@endsection