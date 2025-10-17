<link rel="icon" href="{{asset('vendor/img/favicon/cropped-fav-32x32.png')}}" sizes="32x32" />
<link rel="icon" href="{{asset('vendor/img/favicon/cropped-fav-192x192.png')}}" sizes="192x192" />
<link rel="apple-touch-icon" href="{{asset('vendor/img/favicon/cropped-fav-180x180.png')}}" />
<meta name="msapplication-TileImage" content="{{asset('vendor/img/favicon/cropped-fav-270x270.png')}}" />

<meta name="application-name" content="1 + 1"/>
{{-- Favicon Tags End --}}
{{-- Font Tags Start --}}
<link rel="preconnect" href="https://fonts.gstatic.com"/>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/vendor/font/CS-Interface/style.css') }}"/>
{{-- Font Tags End --}}
{{-- Vendor Styles Start --}}
<link rel="stylesheet" href="{{ asset('/vendor/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/vendor/css/OverlayScrollbars.min.css') }}"/>
@stack('css')
{{-- Vendor Styles End --}}
{{-- Template Base Styles Start --}}
@vite('resources/css/app.scss')
{{-- Template Base Styles End --}}
<script src="{{ asset('/vendor/js/base/loader.js') }}"></script>
<base href="{{request()->getRequestUri()}}" data-href="{{config('app.url')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
