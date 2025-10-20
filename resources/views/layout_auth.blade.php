<!DOCTYPE html>
<html lang="ru" data-url-prefix="/">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>{{$title ?? '«ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА И ТЕРРОРИЗМА»'}} | Просветительский марафон</title>
    <meta name="description" content="{{$description ?? 'Просветительский марафон «ДЕТИ И МОЛОДЕЖЬ ПРОТИВ ЭКСТРЕМИЗМА И ТЕРРОРИЗМА»'}}"/>
    @include('_layout.head')
</head>
<body class="h-100" style="min-width: 1px">
<div id="root" class="h-100">
    <div class="container-fluid p-0 h-100 position-relative">
        <div class="row g-0 h-100">
            {{-- Left Side Start --}}
            <div class="col-12 col-lg-auto h-100 p-0">
                <div
                    class="sw-lg-70 min-h-100  d-flex justify-content-center align-items-center shadow-deep py-5">
                    <div class="sw-lg-50 px-5">
                        <a href="{{ route('home') }}">
                            <div class="auth_logo">
                                <img src="{{asset('vendor/img/logo/gppc-textN.svg')}}" alt="равные условия - равные возможности">
                            </div>
                        </a>

                        @yield('content_left')
                    </div>
                </div>
            </div>
            {{-- Left Side End --}}

            {{-- Right Side Start --}}
            <div class="offset-0 col-12 d-none d-lg-flex col-lg h-100 justify-content-center bg-foreground bg-flower">
                @yield('content_right')
            </div>
            {{-- Right Side End --}}
        </div>
    </div>
</div>
@include('_layout.scripts')
{{-- Подключение Select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ru.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
</body>
</html>
