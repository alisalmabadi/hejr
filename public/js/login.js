//== Class Definition
var SnippetLogin = function() {

    var login = $('#m_login');
    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        mUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }

    //== Private Functions

    var displaySignUpForm = function() {
        login.removeClass('m-login--forget-password');
        login.removeClass('m-login--signin');

        login.addClass('m-login--signup');
        mUtil.animateClass(login.find('.m-login__signup')[0], 'flipInX animated');
    }

    var displaySignInForm = function() {
        login.removeClass('m-login--forget-password');
        login.removeClass('m-login--signup');

        login.addClass('m-login--signin');
        mUtil.animateClass(login.find('.m-login__signin')[0], 'flipInX animated');
        //login.find('.m-login__signin').animateClass('flipInX animated');
    }

    var displayForgetPasswordForm = function() {
        login.removeClass('m-login--signin');
        login.removeClass('m-login--signup');

        login.addClass('m-login--forget-password');
        //login.find('.m-login__forget-password').animateClass('flipInX animated');
        mUtil.animateClass(login.find('.m-login__forget-password')[0], 'flipInX animated');

    }

    var handleFormSwitch = function() {
        $('#m_login_forget_password').click(function(e) {
            e.preventDefault();
            displayForgetPasswordForm();
        });

        $('#m_login_forget_password_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#m_login_signup').click(function(e) {
            e.preventDefault();
            displaySignUpForm();
        });

        $('#m_login_signup_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });
    }

    var handleSignInFormSubmit = function() {
        $('#m_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    username: {
                        required: true
                        /*email: true*/
                    },
                    password: {
                        required: true
                    }
                },
                messages:{
                    username: {
                        required: "لطفا نام کاربری وارد کنید"
                    },
                    password : {
                        required: "رمز عبور را وارد نمایید"
                    }

                }
            });


            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({

                url: $(this).attr('action'),
                success: function(response, status, xhr, $form) {
                	// similate 2s delay
                    showErrorMsg(form, 'success','ورود با موفقیت انجام شد!');
                	setTimeout(function() {
	                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);

                        window.location.replace('user/');
                    }, 3000);



                },
                error:function (response) {
/*
                    alert(response.responseJSON.errors.email[0]);
*/
                    jQuery.each(response.responseJSON.errors, function(key, value) {
                        showErrorMsg(form, 'danger', response.responseJSON.errors[key]);
                    });

                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                }
            });
        });
    }

    var handleSignUpFormSubmit = function() {
        $('#m_login_signup_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            // add the rule here
            jQuery.validator.addMethod("notEqual", function(value, element, param) {
                return this.optional(element) || value != param;
            }, "مقدار دیگری انتخاب کنید");

            form.validate({
                rules: {
                    name: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    password_confirmation: {
                        required: true
                    },
                    core_id : {
                      required: true,
                        notEqual: '0'
                    },
                    agree: {
                        required: true
                    }
                },
                messages:{
                    name: {
                        required:""
                    },
                    lastname: {
                        required: "لطفا نام خانوادگی را وارد کنید"
                    },
                    username: {
                        required: "لطفا نام کاربری وارد کنید"
                    },
                    email: {
                        required: "لطفا ایمیل را وارد کنید",
                        email: "لطفا ایمیل معتبری وارد کنید"
                    },
                    password : {
                        required: "رمز عبور را وارد نمایید"
                    },
                    password_confirmation : {
                        required: "رمز عبور مجدد را وارد نمایید"
                    },
                    agree : {
                        required: "لطفا قوانین را تایید کنید."
                    },
                    core_id : {
                        required: "هسته خود را انتخاب کنید",
                        notEqual: "هسته خود را انتخاب کنید"
                    }

                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({
                url: $(this).attr('action'),
                success: function(response, status, xhr, $form) {
                	// similate 2s delay
                    showErrorMsg(form, 'success', 'ثبت نام شما با موفقیت انجام شد.');
                	setTimeout(function() {
	                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	                  /*  form.clearForm();
	                    form.validate().resetForm();*/

	                    // display signup form
/*
	                    displaySignInForm();
*/
	                  /*  var signInForm = login.find('.m-login__signin form');
	                    signInForm.clearForm();
	                    signInForm.validate().resetForm();*/
                        window.location.replace('user');
	                }, 2000);

                },
                error: function (response) {

                    jQuery.each(response.responseJSON.errors, function(key, value) {
                        showErrorMsg(form, 'danger', response.responseJSON.errors[key]);
                    });

                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                }
            });
        });
    }

    var handleForgetPasswordFormSubmit = function() {
        $('#m_login_forget_password_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '',
                success: function(response, status, xhr, $form) { 
                	// similate 2s delay
                	setTimeout(function() {
                		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove 
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states

	                    // display signup form
	                    displaySignInForm();
	                    var signInForm = login.find('.m-login__signin form');
	                    signInForm.clearForm();
	                    signInForm.validate().resetForm();

	                    showErrorMsg(signInForm, 'success', 'پسوورد ریکاوری با موفقیت ارسال شد.');
                	}, 2000);
                }
            });
        });
    }

    //== Public Functions
    return {
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleSignUpFormSubmit();
            handleForgetPasswordFormSubmit();
        }
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SnippetLogin.init();
});