<!DOCTYPE html>
<html lang="{{get_current_language()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $favicon = get_favicon();
    @endphp
    @if($favicon)
        <link rel="shortcut icon" type="image/png" href="{{ $favicon }}"/>
    @endif

    <title>{{get_translate(get_option('site_name', 'iBooking'))}} - @yield('title')</title>

    {{--@php
        enqueue_scripts('gmz-builder');
    @endphp--}}

    @php init_header(); @endphp
</head>
<body class="form {{rtl_class()}} body-builder">

@yield('content')

@php init_footer(); @endphp

</body>
</html>