<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="seyyed ali salmabadi">
    <meta name="author_mail" content="s.alisalmabadi@yahoo.com">
    @yield('metas')
    <title>{{ \Setting::get('site_name') }}</title>
    <!-- Styles -->
   <link href="{{ asset('css/admin-app.css') }}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('js/pdatapiker/persian-datepicker.css')}}">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">

    @yield('style')

    <style>
        /*table*/

        .table-advance tr td {
            vertical-align: middle !important;
        }

        .no-border {
            border-bottom: none;
        }

        .dataTables_length , .dataTables_filter{
            padding:15px;
        }
        .dataTables_info{
            padding:0 15px;
        }

        .dataTables_filter {
            float: left;
        }

        .dataTables_length select {
            width: 65px;
            padding:5px 8px;
        }
        .dataTables_paginate.paging_bootstrap.pagination li {
            list-style: none;
        }

        .dataTables_length label, .dataTables_filter label {
            font-weight: 300;
        }

        .dataTables_filter label {
            width: 100%;
        }

        .dataTables_filter label input {
            width: 78%;
        }

        .border-top {
            border-top: 1px solid #ddd;
        }

        .dataTables_paginate.paging_bootstrap.pagination li {
            float: right;
            margin: 0 1px;
            border: 1px solid #ddd;
            border-radius: 3px;
            -webkit-border-radius: 3px;
        }

        .dataTables_paginate.paging_bootstrap.pagination li.disabled a{
            color: #c7c7c7;
        }
        .dataTables_paginate.paging_bootstrap.pagination li a{
            color: #797979;
            padding: 5px 10px;
            display: inline-block;
        }

        .dataTables_paginate.paging_bootstrap.pagination li:hover a, .dataTables_paginate.paging_bootstrap.pagination li.active a{
            color: #797979;
            background: #eee;
            border-radius: 3px;
            -webkit-border-radius: 3px;
        }

        .dataTables_paginate.paging_bootstrap.pagination {
            float: left;
            margin-left: 15px;
            margin-top: -5px;
            margin-bottom: 15px;

        }

        .dataTable tr:last-child {
            border-bottom: 1px solid #ddd;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {display:none;}

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        .panel-horizontal
        {
            min-height: 260px;
            margin: 10px;
            padding: 5px;
            -webkit-box-shadow: 0px 0px 4px 1px rgba(209,209,209,0.69);
            -moz-box-shadow: 0px 0px 4px 1px rgba(209,209,209,0.69);
            box-shadow: 0px 0px 4px 1px rgba(209,209,209,0.69);

        }
        .thumbnail2 > img, .thumbnail2 a > img
        {
            max-width: 100px;

            min-height: 100px;
        }
        .panel-horizontal .panel-heading {
            float: right;
            width: 19%;
            padding: 0;

            border-top-right-radius: 0;
            margin-bottom: 0;
            min-height: 248px;
            border: 1px solid #eee;

        }
        .typesel
        {

        }
        .panel-horizontal .panel-body {
            float: left;
            margin: 0 0 15px 0;
            padding-bottom: 0;
            width: 80%;
            padding: 0;
            border: 1px solid #eee;
        }
        .product-sp-item-top
        {
            height: 55px;
        }
        .product-sp-item-bottom
        {
            min-height: 175px;
            border: 1px solid #eee;
            padding: 3px;
        }
        span#startsha {
            font-size: 13px !important;
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .item {
            color: black;
            padding: 10px;
            margin: 25px 0;
            position: relative;
            box-shadow: 0 0 10px #4e4e4e;
            max-width: 250px !important;

        }


        button.btn.btn-danger.copy {
            padding-right: 3px;
            padding-left: 3px;
            box-shadow: 1px 4px 10px 4px #80808054;
        }

        svg {
            width: 16px;
            height: 16px;
            fill: #dbec32;
            position: absolute;
            left: 16px;
            top: 6px
        }
        a.morelink.less {
            background: #3c8dbc;
            border-radius: 5px;
            margin: 5px;
            color: white;
            border: 1px solid #0000007d;
            padding-right: 3px;
            padding-left: 3px;
        }
        a.morelink {
            background: #3c8dbc;
            border-radius: 5px;
            margin: 5px;
            color: white;
            border: 1px solid #0000007d;
            padding-right: 3px;
            padding-left: 3px;
        }
        i.fa.fa-copy {
            padding-left: 5px;
        }
        .iranyekan{
            font-family: iranyekan !important;
        }
    </style>
    @yield('admin-head')

</head>
<body class="hold-transition skin-blue sidebar-mini" style="display: none;">

@yield('main_content')
    <!-- Scripts -->
    <script src="{{ asset('js/admin-app.js') }}"></script>
   <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/ck/ckeditor.js')}}"></script>
<script src="/js/jquery.dataTables.js"></script>
<script src="/js/DT_bootstrap.js"></script>
<script src="/js/dynamic-table.js"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/pdatapiker/persian-date.min.js')}}"></script>
    <script src="{{asset('js/pdatapiker/persian-datepicker.min.js')}}"></script>

<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

 <script type="application/javascript">

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        function addComma( str ) {
            var objRegex = new RegExp( '(-?[0-9]+)([0-9]{3})' );

            while( objRegex.test( str ) ) {
                str = str.replace( objRegex, '$1,$2' );
            }

            return str;
        }

        function price_format()
        {

            $('.price-field').each(function (element)
            {
                var t_price=$(this).text();
                $(this).text(addComma(t_price));

            });
            $('.price-input').on('input',function(e){

                var val=$(this).val();
                val=val.replace(",","");
                val=val.replace(",","");
                val=val.replace(",","");
             
                $(this).val(addComma(val));
            });


            $('.price-input').each(function (element)
            {

                var t_price=$(this).val();

                $(this).val(addComma(t_price));

            });

        }

        $(document).ready(function () {
            $('body').css('display','block');
            price_format();
        });

        $('.keyword').select2({
            multiple:true,
            maximumSelectionLength:40,
            placeholder: "تگ ها را انتخاب یا اضافه کنید",

            allowClear: true,
            tags: true,
        });

            CKEDITOR.replace( 'text' );

    </script>

    @yield('admin-footer')

</body >
</html>
