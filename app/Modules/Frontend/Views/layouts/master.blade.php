<!DOCTYPE html>
<html lang="{{get_current_language()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @php
            $favicon = get_favicon();
        @endphp
        @if($favicon)
            <link rel="shortcut icon" type="image/png" href="{{ $favicon }}"/>
        @endif

        <title>
            @php
                $page_title = seo_page_title();
            @endphp
            @if($page_title)
                {{$page_title}}
            @else
                {{get_translate(get_option('site_name', 'iBooking'))}} {{get_seo_title_separator()}} @yield('title')
            @endif
        </title>
        {!! seo_meta() !!}
        @php init_header(); @endphp
    </head>
    <body class="body @yield('class_body') {{rtl_class()}}">
        @include('Frontend::components.admin-bar')
        @include('Frontend::components.top-bar-1')
        @include('Frontend::components.header')
        <div class="site-content">
            @yield('content')
        </div>
        @include('Frontend::components.footer')
        @php init_footer(); @endphp
    </body>
</html>
