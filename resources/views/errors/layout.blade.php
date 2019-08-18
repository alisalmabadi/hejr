




<!DOCTYPE html>

<html lang="en-us" class="no-js">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="The description should optimally be between 150-160 characters.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ============== Resources style ============== -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin-app.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/error.css')}}" />
</head>

<body class="flat">

<!-- Canvas for particles animation -->
<div id="particles-js"></div>

<!-- Your logo on the top left -->
<a href="{{URL::previous()}}" class="logo-link" title="بازگشت">

    <img src="{{asset('images/logo.jpg')}}" class="logo" alt="بازگشت" />

</a>

<div class="content">

    <div class="content-box">

        <div class="big-content">

            <!-- Main squares for the content logo in the background -->
            <div class="list-square">
                <span class="square"></span>
                <span class="square"></span>
                <span class="square"></span>
            </div>

            <!-- Main lines for the content logo in the background -->
            <div class="list-line">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>

            <!-- The animated searching tool -->
            <i class="fa fa-search" aria-hidden="true"></i>

            <!-- div clearing the float -->
            <div class="clear"></div>

        </div>

        <!-- Your text -->
        <h1> @yield('message')</h1>
        @yield('des')

    </div>

</div>

{{--
<footer class="light">

    <ul>
        <li><a href="#">خانه</a></li>

        <li><a href="#">جستجو</a></li>

        <li><a href="#">راهنما</a></li>

        <li><a href="#">قوانین و مقررات</a></li>

        <li><a href="#">نقشه سایت</a></li>

        <li><a href="#"><i class="fa fa-facebook"></i></a></li>

        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    </ul>

</footer>
--}}

<!-- ///////////////////\\\\\\\\\\\\\\\\\\\ -->
<!-- ********** jQuery Resources ********** -->
<!-- \\\\\\\\\\\\\\\\\\\/////////////////// -->

<!-- * Libraries jQuery and Bootstrap - Be careful to not remove them * -->

<script src="{{asset('admin-app.js')}}"></script>
{{--
<script src="{{asset('js/jquery.js')}}"></script>
<script src="js/bootstrap.min.js"></script>--}}

<!-- Particles plugin -->
<script src="{{asset('js/particles.js')}}"></script>

</body>

</html>